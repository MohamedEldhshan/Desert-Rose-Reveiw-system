<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'nationality',
        'rating',
        'comment',
        'is_approved',
        'is_featured',
    ];

    protected $casts = [
        'rating' => 'integer',
        'is_approved' => 'boolean',
        'is_featured' => 'boolean',
    ];

    // Scope للمراجعات المعتمدة
    public function scopeApproved($query)
    {
        return $query->where('is_approved', true);
    }

    // Scope للمراجعات المميزة
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
}
