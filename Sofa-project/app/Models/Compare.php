<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Compare extends Model{
    use HasFactory;
    protected $table="compare";
    protected $guarded=[];

    public function user_name(){
        return $this->belongsTo(User::class);
    }
    public function item1(){
        return $this->belongsTo(Product::class,'product_id');
    }
}
?>