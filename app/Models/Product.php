<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'admin_id',
        'name',
        'price',
        'image',
        'img_path',
        'has_addon_cat',
        'status',
    ];

    /**
     * Get the addonCat1 for the product.
     */
    public function addonCat1(): HasMany
    {
        return $this->hasMany(AddonCat1::class);
    }
}
