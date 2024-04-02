<?php

namespace App\Http\Controllers\Client;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\AttributeValue;
use DateTime;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Helper;


class ClientController extends Controller
{
    
    public function addToCart($slug, $quantity, $id){
        $product = Product::where('slug', $slug)->first();
        $color = AttributeValue::where('id', $id)->first();
        
        // dd($color);
        if (empty($product)) {
            return redirect()->route('index');
        }else{
            $price = $product->sale_price ?? $product->price;
            Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => $quantity,
                'price' => $price,
                'options' => [
                    'color' =>$color->id,
                    'image'=>$product->image,
                ]
            ]);
    
            
            return redirect()->route('client.showCart');
        }

        // $skus = Sku::where('product_id',$id);

        
    }

    public function showCart(){
        $cartCollection = Cart::content();
        
        $value_color=null;
        foreach($cartCollection as $cartItem){
            if($cartItem->options->has('color')) { // Kiểm tra xem thuộc tính 'color' có tồn tại hay không
                $color = $cartItem->options->color; // Lấy giá trị của thuộc tính 'color'
                
                $value_color = AttributeValue::where('id',$color)->pluck('value'); // Truy cập thuộc tính 'value'
        }
    }
    // Cart::addCost('COST_SHIPPING', 100);
    // dd($COST_SHIPPING);
        $subtotal= Cart::subtotal();

        Cart::addCost('Shipping', 100);
       
        $total=Cart::total();
        
        // dd($cartCollection);
        $shippingcost=Cart::getCost('Shipping');
        

        return view('client.cart',[
            'cartCollection' => $cartCollection,
            'value_color'=>$value_color,
            'subtotal'=>$subtotal,
            'total'=>$total,
            'shippingcost'=>$shippingcost
        ]);
        
    }


    public function cartDelete($rowId){
       
        Cart::remove($rowId);
        return redirect()->route('client.showCart');
    }

    public function cartUpdate(Request $request){

        $id = $request->id;
        $quantity=$request->quantity;
        $cartCollection = Cart::content();
        $product = $cartCollection->where('id', $id)->first();
        $rowId=null;
        if ($product) {
            $rowId = $product->rowId; 
            
        } 
        // dd($quantity);
        Cart::update($rowId, $quantity);

        // Cart::update($id, array(
        //     'qty'=>array(
        //         'relative'=>false,
        //         'value'=>$quantity
        //     ),
        // )); 

        return response()->json([
            'status'=>200,
        ]);
    }

    public function showCheckout(){
        return view('client.checkout');
        
    }

    public function checkout(Request $request){
        $data = [
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'address' => $request->address,
            'phone' => $request->phone,
            'cart_total' => Cart::total(),
            'created_at' => new DateTime(),
        ];
    
        $cart_id = DB::table('carts')->insertGetId($data);
    
        $cartCollection = Cart::content();

        $cart_details = [];
        foreach($cartCollection as $item){
            $cart_details[]=[
                'product_id'=> $item->id,
                'price'=>$item->price,
                'quantity'=>$item->qty,
                'cart_id'=>$cart_id,
                'created_at'=>new \DateTime(),
            ];
        }
        DB::table('cart_detail')->insert($cart_details);
        Cart::destroy();
        return redirect()->route('index');
    }

//     public function racomStore(Request $request){
//             //
//     }

//     public function racomUpdate(Request $request, $id){
// //
//     }

    public function accountIndex(){
        return view('client.account');
    }

    public function addToWishlist($id, $quantity){
        //
    }

    public function showWishlist(){
        return view('client.wishlist');
        
    }

    public function wishlistDelete($id){
        //
    }

    public function wishlistUpdate(Request $request, $id){
//
    }

    public function order(Request $request){
        //
    }

    public function addressUpdate(Request $request, $id){
//
    }

    public function accountDetailsUpdate(Request $request, $id){
//
    }
}
