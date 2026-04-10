<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Category;
use App\Models\Department;
use Illuminate\Support\Facades\Cache;
use Illuminate\Pagination\LengthAwarePaginator;

class MasterService
{
    public function list_master_department(array $validated)
    {
        $search = $validated['search'] ?? null;

        // Key Redis
        $version = Cache::get('master_department_version', 1);

        $cacheKey = 'master_department_v' . $version . '_search_' . ($search ? md5($search) : 'all');
        $expirationInMinutes = 60;

        $selectFields = [
            'department_uuid',
            'department_code',
            'department_name',
        ];

        return Cache::remember($cacheKey, $expirationInMinutes * 60, function () use ($search, $selectFields) {
            return Department::query()
                ->search($search)
                ->get($selectFields);
        });
    }

    public function list_master_category(array $validated)
    {
        $search = $validated['search'] ?? null;
        $type = $validated['type'];

        // Key Redis
        $version = Cache::get('master_category_version', 1);

        $cacheKey = 'master_category_v' . $version . '_type_' . $type . '_search_' . ($search ? md5($search) : 'all');
        $expirationInMinutes = 60;

        $selectFields = [
            'category_uuid',
            'category_name',
        ];

        return Cache::remember($cacheKey, $expirationInMinutes * 60, function () use ($search, $type, $selectFields) {
            return Category::query()
                ->where('category_type', $type)
                ->search($search)
                ->get($selectFields);
        });
    }

    public static function clearCacheDepartment()
    {
        // Increment version to invalidate all department list caches
        Cache::has('master_department_version')
            ? Cache::increment('master_department_version')
            : Cache::put('master_department_version', 2, 60 * 60 * 24 * 7);
    }

    public static function clearCacheCategory()
    {
        // Increment version to invalidate all category list caches
        Cache::has('master_category_version')
            ? Cache::increment('master_category_version')
            : Cache::put('master_category_version', 2, 60 * 60 * 24 * 7);

        // Also clear suggestion stats because it counts categories
        Cache::forget('suggestion_stats');
        Cache::forget('project_stats');
    }
}
