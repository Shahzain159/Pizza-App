<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\orders;
use App\Models\CartItem;
use App\Models\cold_drinks;
use Illuminate\Http\Request;
use App\Models\CartItemAddon;
use App\Models\order_details;
use App\Models\OrderDetailColdDrink;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //

    public function add_item_cart(Request $request){
        $request->validate([
            'pizza_id' => 'required|exists:pizzas,id'
        ]);

        $cartItem = new CartItem();
        $cartItem->user_id = Auth::id();
        $cartItem->pizza_id = $request->input('pizza_id');
        $cartItem->save();

        return response()->json(['message' => 'Product added to cart successfully']);
    }
    public function cart2(){
        return view('User.cart2');
    }
    public function checkout_action(){

        $order = new orders();
        $order->user_id = Auth::id();
        $order->total_price = $this->calculateTotalAmount();
        $order->delivery_address = "aa";
        $order->phone_number = "asdas";
        $order->save();

        $cartItems = CartItem::where('user_id', 1)->get();
        $order_details_id = 0;
        foreach($cartItems as $c){
            $od = new order_details();
            $od->order_id = $order->id;
            $od->pizza_id = $c->pizza_id;
            $od->crust_option_id = $c->crust_option_id;
            $od->quantity = 1;

            $od->save();
            $order_details_id = $od->id;
        }

        $cartAddons = CartItemAddon::with('coldDrink')->where('user_id', Auth::id())->get();
        foreach ($cartAddons as $item) {
            $od_cold = new OrderDetailColdDrink();
            $od_cold->order_detail_id = $order_details_id;
            $od_cold->cold_drink_id = $item->coldDrink->id;
            $od_cold->quantity = 1;

            $od_cold->save();
        }

        return view('User.checkout');
    }
    public function calculateTotalAmount(){
        $totalAmount = 0;
        $cartItems = CartItem::where('user_id', Auth::id())->get();
        $cartAddons = CartItemAddon::with('coldDrink')->where('user_id', Auth::id())->get();

        foreach ($cartItems as $item) {
            $totalAmount += $item->pizza->price;
        }
        foreach ($cartAddons as $item) {
            $totalAmount += $item->coldDrink->price;
        }
        return $totalAmount;
    }
}
