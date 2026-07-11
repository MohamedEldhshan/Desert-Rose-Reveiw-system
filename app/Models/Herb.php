<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Herb extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_en',
        'name_ar',
        'slug',
        'description_en',
        'description_ar',
        'benefits_en',
        'benefits_ar',
        'usage_en',
        'usage_ar',
        'image',
        'category',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    public function scopeSorted($query)
    {
        return $query->orderBy('sort_order')->orderBy('name_en');
    }

    public function getNameAttribute()
    {
        return app()->getLocale() === 'ar' ? $this->name_ar : $this->name_en;
    }

    public function getDescriptionAttribute()
    {
        return app()->getLocale() === 'ar' ? $this->description_ar : $this->description_en;
    }

    public function getBenefitsAttribute()
    {
        return app()->getLocale() === 'ar' ? $this->benefits_ar : $this->benefits_en;
    }

    public function getUsageAttribute()
    {
        return app()->getLocale() === 'ar' ? $this->usage_ar : $this->usage_en;
    }
}
