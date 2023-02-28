<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class AddonCat1 extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "addon_cat_1";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'admin_id',
        'product_id',
        'name',
        'has_addon_cat',
        'status',
    ];

    /**
     * Get the product that have addon category 1.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the addonCat1 for the product.
     */
    public function addonCat2(): HasMany
    {
        return $this->hasMany(AddonCat2::class);
    }
}
