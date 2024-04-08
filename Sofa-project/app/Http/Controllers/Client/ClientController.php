<?php

namespace App\Http\Controllers\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\RatingComment;
use App\Models\AttributeValue;

use App\Models\Compare;
use App\Models\Wishlist;

use DateTime;
use App\Helpers\Cart;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\RatingComment\StoreRequest as RatingCommentStoreRequest;
use App\Http\Requests\Admin\RatingComment\StoreRequest as RatingCommentUpdateRequest;
use Illuminate\Support\Str;
use Helper;
use App\Models\User;
use GuzzleHttp\Psr7\Message;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Failed;

use function PHPUnit\Framework\isEmpty;

class ClientController extends Controller
{

    public function addToCart(Request $request, Cart $cart){

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

    public function cartUpdate(Request $request, Cart $cart, $itemKey)
    {


        $itemKey = $request->itemKey;
        $item = $cart->find($itemKey);

        $pro_quantity = Product::where('id',$item['productId'])->pluck('quantity')->first();
        // dd($pro_quantity);

        $quantity = $request->quantity;
        //  dd($quantity);
        // Validate quantity
        if (!is_numeric($quantity) || $quantity <= 0) {
            return redirect()->back()->with('failed', 'Quantity is invalid, please enter the quantity');
        }

        if ($quantity > $pro_quantity) {
            return redirect()->back()->with('failed', 'Quantity is overstock, please enter the lower quantity');
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

    public function checkout(Request $request, Cart $cart, $user){

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

    private function userHasPurchasedProduct($userId, $productId)
    {
        return Order::where('user_id', $userId)
                    ->where('product_id', $productId)
                    ->exists();
    }

    public function racomView()
    {
        // Lấy danh sách tất cả sản phẩm từ cơ sở dữ liệu
        $products = Product::all();

        // Trả về view và truyền danh sách sản phẩm sang view rating_comment.blade.php
        return view('client.rating_comment', compact('products'));
    }

    public function racomStore(RatingCommentStoreRequest $request)
    {
        if (!$this->userHasPurchasedProduct(auth()->user()->id, $request->product_id)) {
            return back()->with('error', 'Bạn chỉ có thể đánh giá hoặc bình luận nếu bạn đã mua sản phẩm này.');
        }

        $racom = new RatingComment;
        $racom->product_id = $request->product_id;
        $racom->user_id = auth()->user()->id;
        $racom->rating = $request->rating;
        $racom->comment = $request->comment;
        $racom->status = 0; // chưa được chấp nhận
        $racom->save();

        return back()->with('success', 'Đánh giá và nhận xét của bạn đã được gửi và đang chờ xét duyệt.');
    }

    public function racomUpdate(RatingCommentUpdateRequest $request, $id)
    {
        $ratingComment = RatingComment::findOrFail($id);

        // Kiểm tra xem người dùng có quyền chỉnh sửa đánh giá và bình luận không
        if ($ratingComment->user_id != auth()->id()) {
            return response()->json(['message' => 'Bạn không có quyền chỉnh sửa đánh giá hoặc bình luận này.'], 403);
        }

        // Xác thực dữ liệu đầu vào
        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:255',
        ]);

        // Cập nhật đánh giá và bình luận
        $ratingComment->update($validatedData);

        return response()->json(['message' => 'Đánh giá và bình luận đã được cập nhật thành công.'], 200);
    }

    public function accountIndex($id){
        $user = User::where('id', Auth::id())->first();
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

    public function updateDetail(Request $request, $id){
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
            return redirect()->back()->with('failed', 'Your order cannot be canceled, please contact us via xxxx')->with('lifetime', 3);
        }
    }



    public function addressUpdate(Request $request,$id){
        $request->validate([
            'address' => 'required',
            'phone'=>'numeric|required'
        ]);
        $user = User::where('id', Auth::id())->first();
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
        $userDetail = User::where('id', Auth::id())->first();
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
        $data=Compare::with('item')->where('user_id',$id)->get();
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
