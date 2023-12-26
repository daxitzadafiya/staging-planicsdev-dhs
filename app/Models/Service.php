<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'description',
        'icon',
        'image',
        'link_text',
        'link_url',
        'is_active',
    ];

    public function service_categories(): HasMany
    {
        return $this->hasMany(ServiceCategory::class, 'service_id', 'id')->where('is_active', 1);
    }

    public function core_values(): HasMany
    {
        return $this->hasMany(CoreValue::class, 'service_id', 'id')->where('is_active', 1);
    }

    public function technologies(): HasMany
    {
        return $this->hasMany(Technology::class, 'service_id', 'id')->where('is_active', 1);
    }

    public function portfolios(): HasMany
    {
        return $this->hasMany(Portfolio::class, 'service_id', 'id')->where('is_active', 1);
    }
}
