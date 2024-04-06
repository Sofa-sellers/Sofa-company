<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\OrderDetail;

class Order extends Model
{
    use HasFactory;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'orders';
     /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded =[];

    public function orderdetail()
    {
        return $this->hasMany(OrderDetail::class);
    }
    public static function countActiveOrder(){
        $data=Order::count();
        if($data){
            return $data;
        }
        return 0;
    }
    public static function countNewReceivedOrder(){
        $data = Order::where('status', '1')->count();
        return $data;
    }
    public static function countProcessingOrder(){
        $data = Order::where('status', '2')->count();
        return $data;
    }
    public static function countDeliveredOrder(){
        $data = Order::where('status', '4')->count();
        return $data;
    }
    public static function countCancelledOrder(){
        $data = Order::where('status', '3')->count();
        return $data;
    }
}
