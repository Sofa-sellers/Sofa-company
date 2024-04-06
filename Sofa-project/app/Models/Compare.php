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
        return $this->belongsTo(User::class,'id');
    }
    public function item(){
        return $this->belongsTo(Product::class,'id');
    }
}
?>