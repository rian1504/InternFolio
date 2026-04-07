<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('db:check', function () {
    $connection = config('database.default');
    $this->info("DB_CONNECTION : {$connection}");
    $this->info('DB_HOST       : ' . config('database.connections.' . $connection . '.host', 'n/a'));
    $this->info('DB_PORT       : ' . config('database.connections.' . $connection . '.port', 'n/a'));
    $this->info('DB_DATABASE   : ' . config('database.connections.' . $connection . '.database', 'n/a'));
    $this->info('DB_USERNAME   : ' . config('database.connections.' . $connection . '.username', 'n/a'));

    try {
        DB::connection()->getPdo();
        $dbVersion = DB::selectOne('SELECT VERSION() as version')->version;
        $this->info("Connection    : OK (MySQL {$dbVersion})");

        $tables = DB::select('SHOW TABLES');
        $this->info('Tables found  : ' . count($tables));
    } catch (\Exception $e) {
        $this->error('Connection FAILED: ' . $e->getMessage());
        return 1;
    }
})->purpose('Verify database connection and display diagnostics');
