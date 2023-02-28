<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class AddonCat2 extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "addon_cat_2";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'admin_id',
        'product_id',
        'addon_cat_1_id',
        'name',
        'price',
        'status',
    ];

    /**
     * Get the addon cat 1 that have addon category 2.
     */
    public function addonCat1Bel()
    {
        return $this->belongsTo(AddonCat1::class);
    }
}
