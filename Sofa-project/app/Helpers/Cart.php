<?php
//app/Helpers/Envato/User.php 
namespace App\Helpers;
use Illuminate\Support\Facades\Session; 
use Illuminate\Support\Facades\DB;
class Cart {
    private $items = [];
    private $total_quantity = 0;
    private $total_price = 0;
    
    public function __construct(){
        $this->items = session('cart') ? session('cart') : [];
    }

    public function list(){
        return $this->items;
    }

    public function add($product, $color, $quantity){
        // foreach($colors as $color) {
            $itemKey = $product->id . '_' . $color;
            if(array_key_exists($itemKey, $this->items)) {
                // Nếu sản phẩm đã tồn tại trong giỏ hàng, tăng số lượng
                
                $this->items[$itemKey]['quantity'] = $this->items[$itemKey]['quantity'] + $quantity;
                
            } else {
                // Nếu sản phẩm chưa có trong giỏ hàng, thêm mới
                $this->items[$itemKey] = [
                    'productId'=> $product->id,
                    'name'=>$product->name,
                    'price'=> $product->sale_price > 0 ? $product->sale_price : $product->price,
                    'image'=> $product->image,
                    'quantity'=> $quantity,
                    'option'=> [
                        'color'=> $color,
                    ],
                    'itemKey' => $itemKey,
                ];
            }
        // }
        // dd($this->items[$itemKey]['quantity']);
        // $this->items[$product->id] = $item;

        session(['cart'=>$this->items]);
    }

    public function update($itemKey, $quantity) {
        
        if (array_key_exists($itemKey, $this->items)) {
          // Validate $quantity (ensure it's positive)
          if ($quantity > 0) {
            $this->items[$itemKey]['quantity'] = $quantity;
          }
        }
      
        session(['cart' => $this->items]);
      }
      

    //subtotal pice
    public function subToTal(){
        $totalPrice = 0;
        foreach($this->items as $item){
            $totalPrice += $item['price']*$item['quantity'];
        }

        return $totalPrice;
    }

    public function total(){
        $tax = 0.1;
        $totalPrice = $this->subToTal();
        $totalAfterTax = $totalPrice * (1 + $tax);
    
        return $totalAfterTax;
    }

    public function totalQuantity() {
        $totalQuantity = 0;
        foreach ($this->items as $item) {
          $totalQuantity += $item['quantity'];
        }
        return $totalQuantity;
      }

    public function delete($itemKey) {
        
        // Check if the item exists in the cart
        if (array_key_exists($itemKey, $this->items)) {
          // Remove the item from the cart
          unset($this->items[$itemKey]);
      
          // Update the session with the modified cart items
          session(['cart' => $this->items]);
        }
      }

      public function destroyAll() {
        $this->items = [];
        session(['cart' => $this->items]);
      }
      
}