<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'email',
        'phone',
        'nationality',
        'rating',
        'comment',
        'is_approved',
        'is_featured',
        'idempotency_key',
    ];

    protected $casts = [
        'rating' => 'integer',
        'is_approved' => 'boolean',
        'is_featured' => 'boolean',
    ];

    // Scope for approved reviews
    public function scopeApproved($query)
    {
        return $query->where('is_approved', true);
    }

    // Scope for featured reviews
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    // Scope for pending reviews
    public function scopePending($query)
    {
        return $query->where('is_approved', false);
    }

    // Check if review exists by idempotency key
    public static function findByIdempotencyKey(string $key): ?self
    {
        return static::where('idempotency_key', $key)->first();
    }
}
