<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Sku;
use App\Models\AttributeValue;
use App\Models\Compare;
use App\Models\Wishlist;
use App\Models\RatingComment;


class Product extends Model
{
    use HasFactory, SoftDeletes;
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

    public function compare()
    {
        return $this->hasMany(Compare::class);
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }
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
        return $this->hasMany(ProductImages::class);
    }

    public function attributevalue()
    {
        return $this->belongsTo(AttributeValue::class);
    }

    public function ratingcomment()
    {
        return $this->hasMany(RatingComment::class);
    }


    public static function countActiveProduct(){
        $data=Product::where('status',1)->count();
        if($data){
            return $data;
        }
        return 0;
    }
    public static function countProductQuantity(){
        $data=Product::where('status',1)->where('quantity','<=',5)->count();
        if($data){
            return $data;
        }
        return 0;
    }
}
