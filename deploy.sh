#!/usr/bin/env bash
# Usage: ./deploy.sh <branch>      e.g. ./deploy.sh main
# Run from the project folder on the VPS (as your normal user, NOT with sudo).
set -euo pipefail

BRANCH="${1:?Usage: ./deploy.sh <branch>}"
cd "$(dirname "$0")"

# "sudo docker" because the user is not in the docker group. Remove sudo if that changes.
DC=(sudo docker compose -f compose.prod.yaml)

[ -f .env ] || { echo "ERROR: .env not found. Copy .env.production.example first."; exit 1; }

PROJECT="$(grep -E '^COMPOSE_PROJECT_NAME=' .env | cut -d= -f2 | tr -d '[:space:]' | sed 's/#.*//')"
APP_ENV_VALUE="$(grep -E '^APP_ENV=' .env | cut -d= -f2 | tr -d '[:space:]' | sed 's/#.*//')"
[ -n "$PROJECT" ] || { echo "ERROR: COMPOSE_PROJECT_NAME is empty in .env"; exit 1; }

echo "==> Deploying '$BRANCH' to '$PROJECT' (APP_ENV=$APP_ENV_VALUE)"
PREVIOUS="$(git rev-parse --short HEAD)"

echo "==> Updating code"
git fetch --prune origin
git checkout "$BRANCH"
git pull --ff-only origin "$BRANCH"
CURRENT="$(git rev-parse --short HEAD)"
echo "    $PREVIOUS -> $CURRENT"

# Back up the database before migrating (only if mysql is already running)
if "${DC[@]}" ps --status running --services 2>/dev/null | grep -qx mysql; then
  BACKUP_DIR="$HOME/backups/$PROJECT"
  mkdir -p "$BACKUP_DIR"
  BACKUP_FILE="$BACKUP_DIR/pre-deploy_$(date +%F_%H%M)_${CURRENT}.sql.gz"
  echo "==> Backing up database to $BACKUP_FILE"
  "${DC[@]}" exec -T mysql sh -c \
    'mysqldump -uroot -p"$MYSQL_ROOT_PASSWORD" --single-transaction --routines --no-tablespaces "$MYSQL_DATABASE"' \
    | gzip > "$BACKUP_FILE"
  [ -s "$BACKUP_FILE" ] || { echo "ERROR: backup is empty, aborting"; rm -f "$BACKUP_FILE"; exit 1; }
else
  echo "==> MySQL not running yet (first deploy), skipping backup"
fi

echo "==> Building images"
"${DC[@]}" build --pull

echo "==> Starting containers"
"${DC[@]}" up -d --wait --remove-orphans

echo "==> Running migrations and optimizing"
"${DC[@]}" exec -T app php artisan migrate --force
"${DC[@]}" exec -T app php artisan optimize
"${DC[@]}" exec -T app php artisan queue:restart || true

echo "==> Done. Status:"
"${DC[@]}" ps
echo "Rollback hint: git checkout $PREVIOUS && ./deploy.sh <branch>  (DB migrations are NOT rolled back automatically)"
