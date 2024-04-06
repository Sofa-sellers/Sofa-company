<?php

namespace App\Http\Controllers\Client;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\AttributeValue;

use App\Models\compare;

use DateTime;
use App\Helpers\Cart;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Helper;
use App\Models\User;
use GuzzleHttp\Psr7\Message;
use Illuminate\Support\Facades\Session;
use Hash;
use Illuminate\Auth\Events\Failed;

class ClientController extends Controller
{
    
    public function addToCart(Request $request, Cart $cart){

        $product = Product::where('id', $request->id)->first();
        $quantity = $request->quantity;
        $color = $request->color;

        $cart->add($product, $color, $quantity);

        return redirect()->route('client.showCart');
    }


    public function showCart(Cart $cart){
       

        return view('client.cart',compact('cart'));
        
    }



    public function cartDelete(Cart $cart, $itemKey) {
        $cart->delete($itemKey);
        return redirect()->route('client.showCart');
      }

    public function cartUpdate(Request $request)
    {

        if($request->ajax()){
            $itemKey = $request->$itemKey;
            $quantity = $request->$quantity;
            $cart->update($itemKey, $quantity);
        }



        // $productId = $request->input('productId');
        // $color = $request->input('color');
        // $quantity = $request->input('quantity');

        // dd($quantity);
        // // Validate quantity
        // if (!is_numeric($quantity) || $quantity <= 0) {
        //     return back()->withErrors(['quantity' => 'Invalid quantity']);
        // }

        // // Update cart with new quantity
        // $cart->update($productId, $color, $quantity);

        // return redirect()->route('client.showCart')->with('success', 'Cart item quantity updated!');
    }

    public function showCheckout(Cart $cart){
        if (Auth::check()) {
            $user = Auth::user();
            
        $carts = $cart->list();
            return view('client.checkout', [
                'user' => $user,
                'carts'=>$carts,
                'cart' => $cart
            ]);
        }
    }

    public function checkout(Request $request, Cart $cart, $user){

        $cartCollection = $cart->list();

        foreach($cartCollection as $item){
            $productId = $item['productId'];
            $product = Product::findOrFail($productId);
            
            $newQuantity = DB::table('products')
                ->where('id', $productId)
                ->decrement('quantity', $item['quantity']);

            // Cập nhật thời gian cập nhật tự động
            // Không cần gọi update cho updated_at

            if ($newQuantity === 0) {
                DB::table('products')
                    ->where('id', $productId)
                    ->update(['status' => 2]);
            } elseif ($newQuantity < 0) {
                // Nếu số lượng mới nhỏ hơn 0, nghĩa là số lượng trong kho không đủ
                // Trả về một thông báo lỗi
                return redirect()->back()->with('error', 'Quantity is over stock, please decrease this quantity');
            }
        }

            $data = [
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'address' => $request->address,
            'phone' => $request->phone,
            
            'email'=>$request->email,
            'city'=>$request->city,
            'user_id'=>$user,
            'note'=>$request->note,
            'total_order' => $cart->total(),
            'created_at' => new DateTime(),
            // 'shippingFee'=>100,
            // 'discount_code'=>
            // 'payment'
        ];

        
        
        $order_id = DB::table('orders')->insertGetId($data);

        $data_user = [
            
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'address' => $request->address,
            'phone' => $request->phone,
            'updated_at' => new DateTime(),
        ];
    
        DB::table('users')->updateOrInsert(
            ['id' => $user],
            $data_user
        );

    
        foreach($cartCollection as $item){
            $order_details[]=[
                'product_id'=> $item['productId'],
                'product_name'=>$item['name'],
                'color'=>$item['option']['color'],
                'price'=>$item['price'],
                'quantity'=>$item['quantity'],
                'total_product'=>($item['price']*$item['quantity']),
                'order_id'=>$order_id,
                'created_at'=>new \DateTime(),
            ];
            
        }
        DB::table('order_detail')->insert($order_details);
        $cart->destroyAll();
        return redirect()->route('index');

    }

//     public function racomStore(Request $request){
//             //
//     }

//     public function racomUpdate(Request $request, $id){
// //
//     }


    public function accountIndex($id){
        $user = Auth::User()->where('id',$id)->first();
        $user = User::findOrFail($id);

        $orders = Order::where('user_id', $user->id)
                    ->orderBy('created_at', 'DESC')
                    ->paginate(5); 

        return view('client.account', [
            'orders' => $orders,
        ]);

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

    public function orderManagement(Request $request, $id){
        $user = Auth::User()->where('id',$id)->first();
    }

    public function showDetail($id){
        
        $detail = OrderDetail::where('order_id', $id)->get();
        
        $order = Order::findorFail($id)->first();

        
        return view('client.order',[
            'detail'=>$detail,
            'order'=>$order,
        ]);
    }

    public function updateDetail(Request $request, $id){
        $order = Order::findOrFail($id);
    
        if($order->status == 1){
            $order->status = $request->status;
            $order->reason = $request->reason;
            $order->save();
        } else {
            return redirect()->back()->with('failed', 'Your order cannot be canceled, please contact us via xxxx');
        }
    }
    
    

    public function addressUpdate(Request $request,$id){
        $request->validate([
            'address' => 'required',
            'phone'=>'numeric|required'
        ]);
        $user = Auth::User()->where('id',$id)->first();
        $user->address=$request->address;
        $user->phone=$request->phone;
        $user->updated_at=new \DateTime();
        $user->save();
        return redirect()->route('client.account',['id'=>Auth::user()->id])->with('success', 'Update address successfully');
    }

    public function accountDetailsUpdate(Request $request,$id){
        $request->validate([
            'firstname' => 'required',
            'lastname'=>'required',
            'username'=>'required',
            'currentpassword'=>'required',
            'password'=>'required|confirmed'
        ]);
        $userDetail=Auth::User()->where('id',$id)->first();
        if(Hash::check($request->currentpassword, $userDetail->password)){
            $userDetail->firstname=$request->firstname;
            $userDetail->lastname=$request->lastname;
            $userDetail->username=$request->username;
            $userDetail->password = bcrypt($request->password);
            $userDetail->save();
            return redirect()->route('client.account',['id'=>Auth::user()->id])->with('success', 'Update your detail successfully');
        }
        else return redirect()->route('client.account',['id'=>Auth::user()->id])->with('error', 'your current password Incorrect');
    }

    public function showCompare($id){
        $data=Compare::with('item')->where('user_id',Auth::user()->id)->get();
        return view('client.compare',compact('data'));
    }

    public function addToCompare(Request $request){
        Compare::create($request->except('_token'));
        return "item added to Compare";
    }

    public function DeleteCompareProduct(Request $request){
        $data= Compare::where('user_id',Auth::user()->id)->where('product_id',$request->product_id)->delete();
        return redirect()->route()->with('success','item removed successfully');
    }
}

