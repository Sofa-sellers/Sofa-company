<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Sku;
use App\Models\AttributeValue;

class Product extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';
     /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded =[];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function sku()
    {
        return $this->hasMany(Sku::class);
    }

    public function productimages()
    {
        return $this->hasMany(ProductImages::class)->withTrashed();
    }

    public function attributevalue()
    {
        return $this->belongsTo(AttributeValue::class);
    }
}
