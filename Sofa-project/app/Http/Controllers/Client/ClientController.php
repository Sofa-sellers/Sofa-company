<?php

namespace App\Http\Controllers\Client;
use Auth;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Helper;


class ClientController extends Controller
{
    
    public function addToCart($id, $quantity){
        $product = Product::find($id);
        if (empty($product)) {
            return redirect()->route('index');
        }else

        // $skus = Sku::where('product_id',$id);

        $price = $product->sale_price ?? $product->price;
        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $quantity,
            'price' => $price,
            // 'options' => [
            //     'dimensions' => 'large',
            //     'color' => 'red',
            //     'material' => 'red'
            // ]
        ]);

        return redirect()->route('client.showCart');
    }

    public function showCart(){
        $cartCollection = Cart::content();

        // dd($cartCollection);
        return view('client.cart',[
            'cartCollection' => $cartCollection
        ]);
        
    }

    public function cartDelete($id){
        //
    }

    public function cartUpdate(Request $request, $id, $quantity){

        $id = $request->id;
        $quantity = $request->quantity;

        Cart::update($id, array(
            'qty'=>array(
                'relative'=>false,
                'value'=>$quantity
            ),
        )); // Will update the quantity

        return response()->json([
            'status'=>200,
        ]);
    }

    public function showCheckout(){
        return view('client.checkout');
        
    }

//     public function checkout(Request $request){
//         //
//     }

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
