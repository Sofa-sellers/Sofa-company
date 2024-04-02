<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Attribute;
use App\Models\Sku;
use App\Models\Product;

class AttributeValue extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'attribute_values';
     /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded =[];

    protected $fillable = [
        'value', 
    ];

    public function attribute(): BelongsTo
    {
        return $this->belongsTo(Attribute::class);
    }

    public function sku()
    {
        return $this->hasMany(Sku::class);
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
