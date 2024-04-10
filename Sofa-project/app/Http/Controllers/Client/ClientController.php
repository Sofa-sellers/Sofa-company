<?php

namespace App\Http\Controllers\Client;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\AttributeValue;

use App\Models\Compare;
use App\Models\Wishlist;

use App\Http\Requests\Client\Order\StoreRequest as OrderStoreRequest;
use App\Http\Requests\Client\Order\UpdateRequest as OrderUpdateRequest;
use App\Http\Requests\Client\Cart\StoreRequest as CartStoreRequest;
use App\Http\Requests\Client\Cart\UpdateRequest as CartUpdateRequest;

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

use function PHPUnit\Framework\isEmpty;

class ClientController extends Controller
{
    
    public function addToCart(CartStoreRequest $request, Cart $cart){

        $product = Product::where('id', $request->id)->first();
        $quantity = $request->quantity;
        $color = $request->color;
     
        if($product->quantity < $quantity){
            return redirect()->back()->with('failed', 'The quantity exceeds the available stock, please enter a different quantity')->with('lifetime', 3);
        }

        
        if($cart){
            $old_quantity = 0;
            
            foreach($cart->list() as $item){
                if($item['productId'] == $product->id){
                    $old_quantity = $quantity + $item['quantity'] + $old_quantity;
                    // dd($old_quantity);
                }
            }
            
            if($old_quantity > $product->quantity){
                    return redirect()->back()->with('failed', 'The quantity exceeds the available stock, please enter a different quantity')->with('lifetime', 3);
            }
        }
        
  

        $cart->add($product, $color, $quantity);
        
        return redirect()->route('client.showCart')->with('Success', 'You have successfully added a product to your cart')->with('lifetime', 3);
        
    }


    public function showCart(Cart $cart){
       
        return view('client.cart',compact('cart'));
        
    }



    public function cartDelete(Cart $cart, $itemKey) {
        $cart->delete($itemKey);
        return redirect()->route('client.showCart');
      }

    public function cartUpdate(CartUpdateRequest $request, Cart $cart, $itemKey)
    {

        
        $itemKey = $request->itemKey;
        $item = $cart->find($itemKey);
        
        $pro_quantity = Product::where('id',$item['productId'])->pluck('quantity')->first();
        // dd($pro_quantity);

        $quantity = $request->quantity;
        $total = $cart->subToTal();
        
        //  dd($quantity);
        // Validate quantity
        if (!is_numeric($quantity) || $quantity <= 0) {
            return redirect()->back()->with('failed', 'Quantity is invalid, please enter the quantity');
        }

        if ($quantity > 5) {
            return redirect()->back()->with('failed', 'Please contact with us via seolosofa@gmail.com to get better service');
        }

        if ($total > 10000) {
            return redirect()->back()->with('failed', 'Please contact with us via seolosofa@gmail.com to get better service');
        }

        $cartCollection = $cart->list();

        
        $newQuantity = null;
        
        foreach($cartCollection as $c) {
            
            if ($c['productId'] == $item['productId']) {
                if($c['itemKey'] == $item['itemKey']){
                    $newQuantity = $quantity  + $newQuantity;
                }else{
                    $newQuantity = $c['quantity'] + $newQuantity;
                }
            }
            if ($newQuantity > $pro_quantity) {
                return redirect()->back()->with('failed', 'Quantity is overstock, please enter the lower quantity');
            }
        }
    
        // Update cart with new quantity
        $cart->update($itemKey, $quantity);

        return redirect()->back()->with('success', 'You have successfully updated a product to your cart');
    }

    public function showCheckout(Cart $cart){
        if (Auth::check()) {
            $user = Auth::user();
            $carts = $cart->list();
    
            
            foreach ($carts as $item) {
                $productId = $item['productId'];
                $quantity = $item['quantity'];
    
                $product = DB::table('products')->where('id', $productId)->first();
                if ($quantity > $product->quantity) {
                    return redirect()->back()->with('failed', 'Quantity is over stock, please decrease this quantity');
                }
            }
    
            return view('client.checkout', [
                'user' => $user,
                'carts' => $carts,
                'cart' => $cart
            ]);
        }
    }

    public function checkout(OrderStoreRequest $request, Cart $cart, $user){
        
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

        $address_old = User::findOrFail($user)->pluck('address')->first();
        if(!$address_old){
            $data_user = [
            
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'address' => $request->address,
                'phone' => $request->phone,
                'city' => $request->city,
                'updated_at' => new DateTime(),
            ];
        
            DB::table('users')->updateOrInsert(
                ['id' => $user],
                $data_user
            );
        }
        

    
    $cartCollection = $cart->list();
    $order_details = [];

    foreach ($cartCollection as $item) {
        $productId = $item['productId'];
        $quantity = $item['quantity'];

        $product = DB::table('products')->where('id', $productId)->first();

        if($quantity > $product->quantity){
            $order = Order::where('id',$order_id)->get();
            $order->delete();
            return redirect()->back()->with('failed', 'Quantity is over stock, please decrease this quantity');

        }elseif ($quantity == $product->quantity) {
            $order_details[] = [
                'product_id' => $item['productId'],
                'product_name' => $item['name'],
                'color' => $item['option']['color'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'total_product' => ($item['price'] * $item['quantity']),
                'order_id' => $order_id,
                'created_at' => new DateTime(), 
            ];

            DB::table('products')->updateOrInsert(
                ['id' => $productId],
                [
                'quantity'=>0,
                'status' => 2,
                'updated_at'=>new DateTime()
                ] 
            );
        }else{
            $order_details[] = [
                'product_id' => $item['productId'],
                'product_name' => $item['name'],
                'color' => $item['option']['color'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'total_product' => ($item['price'] * $item['quantity']),
                'order_id' => $order_id,
                'created_at' => new DateTime(), 
            ];

            DB::table('products')->updateOrInsert(
                ['id' => $productId],
                [
                'quantity' => DB::raw('quantity - ' . $item['quantity']),
                'updated_at'=>new DateTime()
                ] 
            );
        }
    }

    
// Insert $order_details array to the database as order details

        DB::table('order_detail')->insert($order_details);
        $cart->destroyAll();
        return redirect()->route('client.account',['id'=>Auth::user()->id])->with('success', 'Thank you for your order, you can manage your order in personal account');

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

        $orders = Order::with('orderdetail')->where('user_id', $user->id)
                    ->orderBy('created_at', 'DESC')
                    ->get();
        
        $products = [];
        foreach ($orders as $order) {
            foreach ($order->orderdetail as $orderDetail) {
                $products[] = $orderDetail->product_id;
            }
        }

        // dd($products);
        $uniqueProducts = [];

        foreach ($products as $item) {
            if (!in_array($item, $uniqueProducts)) {
                $uniqueProducts[] = $item;
            }
        }
     

        return view('client.account', [
            'orders' => $orders,
            'uniqueProducts'=>$uniqueProducts,
        ]);

    
}

    public function showWishlist($id){
        $data=Wishlist::with('item')->where('user_id',$id)->get();
        return view('client.wishlist',compact('data'));
    }

    public function addToWishlist(Request $request){
        Wishlist::create($request->except('_token'));
        return "item added to your Wishlist";
    }

    public function wishlistDelete(Request $request){
        $data=Wishlist::where('id',$request->id)->delete();
        return 'item removed successfully from wishlist';
    }

    // public function orderManagement(Request $request, $id){
    //     $user = Auth::User()->where('id',$id)->first();
    // }

    public function showDetail($id){
        
        $order = Order::where('id',$id)->first();
        

        $detail = OrderDetail::where('order_id', $id)->get();
        //dd($order);

        return view('client.order',[
            'detail'=>$detail,
            'order'=>$order,
        ]);
    }

    public function updateDetail(OrderUpdateRequest $request, $id){
        $order = Order::where('id',$id)->first();
        
        if($order->status == 1){
            $order->status = 3;

            $order->reason = $request->reason;
            $order->deleted_at = now(); 
    
            $order->save();

                $details = OrderDetail::where('order_id', $id)->get();
                foreach($details as $detail){
                    $product = Product::where('id',$detail->product_id)->first();
                    $product->quantity = $product->quantity + $detail->quantity;
                    $product->updated_at = now();
                    if($product->status == 2){
                        $product->status = 1;
                    }
                    $product->save();
                }
            
    
            return redirect()->route('client.account', ['id' => $order->user_id])->with('success', 'Your order has been cancelled, we look forward to supporting you in your next order');

        } else {
            return redirect()->back()->with('failed', 'Your order cannot be canceled, please contact us via sofaseller@gmail.com')->with('lifetime', 3);
        }
    }
    
    

    public function addressUpdate(Request $request,$id){
        $request->validate([
            'address' => 'required',
            'phone'=>'numeric|required',
            'city'=>'required'
        ]);
        $user = Auth::User()->where('id',$id)->first();
        $user->address=$request->address;
        $user->phone=$request->phone;
        $user->city=$request->city;
        $user->updated_at=new \DateTime();
        $user->save();
        return redirect()->route('client.account',['id'=>Auth::user()->id])->with('success', 'Update address successfully');
    }

    public function accountDetailsUpdate(Request $request,$id){
        $request->validate([
            'firstname' => 'required',
            'lastname'=>'required',
            'username'=>'required',
        ]);
        $userDetail=Auth::User()->where('id',$id)->first();
        $userDetail->firstname=$request->firstname;
        $userDetail->lastname=$request->lastname;
        $userDetail->username=$request->username;
        $userDetail->save();
        return redirect()->route('client.account',['id'=>Auth::user()->id])->with('success', 'Update your detail successfully');
    }
    public function accountDetailPass(Request $request,$id){
        $request->validate([
            'password'=>'required|confirmed'
        ]);
        $userDetail=Auth::User()->where('id',$id)->first();
        $userDetail->password = bcrypt($request->password);
        $userDetail->save();
        return redirect()->route('client.account',['id'=>Auth::user()->id])->with('success', 'Update your password successfully');
    }

    public function showCompare($id){
        $data=Compare::with('item1')->where('user_id',$id)->get();
        return view('client.compare',compact('data'));
    }

    public function addToCompare(Request $request){
        Compare::create($request->except('_token'));
        return "item added to Compare";
    }

    public function DeleteCompareProduct(Request $request){
        $data=Compare::where('user_id',Auth::user()->id)->where('id',$request->id)->delete();
        return 'item removed successfully';
    }
}

