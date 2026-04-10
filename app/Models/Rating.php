<?php

namespace App\Models;

use App\Services\InternService;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rating extends Model
{
    // Set primary key
    protected $primaryKey = 'rating_id';

    // Guard field
    protected $guarded = ['rating_id', 'rating_uuid'];

    // Hidden field
    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function getRouteKeyName()
    {
        return 'rating_uuid';
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($rating) {
            $rating->rating_uuid = (string) Str::uuid();
        });

        static::saved(function ($rating) {
            $user = $rating->user;
            if ($user && !$user->is_admin) {
                InternService::clearCache($user->user_uuid);
            }
        });

        static::deleted(function ($rating) {
            $user = $rating->user;
            if ($user && !$user->is_admin) {
                InternService::clearCache($user->user_uuid);
            }
        });
    }

    // Relationship
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
