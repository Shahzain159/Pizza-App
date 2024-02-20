<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CartItem;
use App\Models\cold_drinks;
use App\Models\CartItemAddon;
use App\Models\crust_options;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AddtoCart extends Component
{



    public function render()
    {
        return view('livewire.addto-cart');
    }
    public $cartItems;
    public $cold;
    public $crusts;
    public $cartAddons;

    //--------------------



    public function mount(){
        $this->cartItems = CartItem::where('user_id', Auth::id())->get();
        $this->cold = cold_drinks::all();
        $this->crusts = crust_options::all();
        $this->cartAddons = CartItemAddon::with('coldDrink')->where('user_id', Auth::id())->get();
    }
    public function addToCartAddon($coldDrinkId){
        CartItemAddon::create([
            'user_id' => Auth::id(),
            'cold_drink_id' => $coldDrinkId,
        ]);
        $this->mount();
        $this->emit('addonsUpdated');
    }
    public function calculateTotalAmount(){
        $totalAmount = 0;
        foreach ($this->cartItems as $item) {
            $totalAmount += $item->pizza->price;
        }
        foreach ($this->cartAddons as $item) {
            $totalAmount += $item->coldDrink->price;
        }
        return $totalAmount;
    }

    public function removeFromCart($cartItemId){
        $cartItemAddon = CartItem::find($cartItemId);
        if ($cartItemAddon) {
            $cartItemAddon->delete();
            $this->emit('itemremoved');
            $this->mount();
        }
    }
    public function removeAddonsFromCart($cartItemId){
        $cartItemAddon = CartItemAddon::find($cartItemId);
        if ($cartItemAddon) {
            $cartItemAddon->delete();
            $this->emit('addonremoved');
            $this->mount();
        }
    }
    public function updateCartItem($itemId, $selectedCrustId){
        $addon = CartItem::where('id', $itemId)->first();
        $addon->crust_option_id= $selectedCrustId;
        $addon->save();
        $this->mount();

    }

}
