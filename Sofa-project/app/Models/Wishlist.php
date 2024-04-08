<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Auth;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Wishlist extends Model{
    use HasFactory;
    protected $table="wishlists";
    protected $guarded=[];

    public function user_name(){
        return $this->belongsTo(User::class);
    }
    public function item():BelongsTo{
        return $this->belongsTo(Product::class,'id');
    }

    public static function countWishlist(){
        $data = Wishlist::where('user_id',Auth::user()->id)->count();
        if($data){
            return $data;
        }
        return 0;
    }
}
?>