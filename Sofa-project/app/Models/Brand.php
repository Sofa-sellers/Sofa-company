<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Product;

class Brand extends Model
{
    use HasFactory, SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'brands';
     /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded =[];

    public function product()
    {
        return $this->hasMany(Product::class);
    }
    public static function countBrand(){
        $data=Brand::where('status',1)->count();
        if($data){
            return $data;
        }
        return 0;
    }
}
