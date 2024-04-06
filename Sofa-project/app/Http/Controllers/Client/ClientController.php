<?php

namespace App\Http\Controllers\Client;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\AttributeValue;
use App\Models\Zip;
use App\Models\compare;
use DateTime;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Helper;
use App\Models\User;
use Hash;


class ClientController extends Controller
{
    
    public function addToCart($slug, $quantity, $id){
        $product = Product::where('slug', $slug)->first();
        $color = AttributeValue::where('id', $id)->first();

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

    }


    public function showCart(){
       
        $shipcost = $this->shippingCheck(request());
        
        $cartCollection = Cart::content();
        
        $value_color=null;
        foreach($cartCollection as $cartItem){
            if($cartItem->options->has('color')) { // Kiểm tra xem thuộc tính 'color' có tồn tại hay không
                $color = $cartItem->options->color; // Lấy giá trị của thuộc tính 'color'
                
                $value_color = AttributeValue::where('id',$color)->pluck('value'); // Truy cập thuộc tính 'value'
        }
        }
    
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

    public function shippingCheck(Request $request){
        $zipcode = $request->zip;
        $shippingcost = Zip::where('zip',$zipcode)->first();
        //  
        $shippingcost ? $shippingcost : 0;
        return $shippingcost;

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
        if (Auth::check()) {
            $user = Auth::user();
            
            $city=Zip::where('status',1)->get();
    
            return view('client.checkout', [
                'user' => $user,
                // 'city'=> $city
            ]);
        }
    }

    public function checkout(Request $request, $user){
        $data = [
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'address' => $request->address,
            'phone' => $request->phone,
            'postcode'=>$request->postcode,
            'email'=>$request->email,
            'user_id'=>$user,
            'note'=>$request->note,
            'total_order' => Cart::total(),
            'created_at' => new DateTime(),
            'shippingFee'=>100,
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

    
        $cartCollection = Cart::content();

        $order_details = [];
        foreach($cartCollection as $item){
            $order_details[]=[
                'product_id'=> $item->id,
                'price'=>$item->price,
                'quantity'=>$item->qty,
                'total_product'=>(($item->price)*($item->qty)),
                'order_id'=>$order_id,
                'created_at'=>new \DateTime(),
            ];
        }
        DB::table('order_detail')->insert($order_details);
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

    public function showCompare(){
        $data=Compare::with('item')->where('user_id',Auth::user()->id)->get();
        return view('client.compare',compact('data'));
    }

    public function addToCompare(Request $request){
        Compare::create($request->except('_token'));
        return "item added to Compare";
    }

    public function DeleteCompareProduct(Request $request){
        Compare::delete($request->except('_token'));
        return "item deleted from Compare";
    }
}
