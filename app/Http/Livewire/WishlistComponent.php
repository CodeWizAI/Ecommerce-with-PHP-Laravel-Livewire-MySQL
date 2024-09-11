<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\Auth;

class WishlistComponent extends Component
{
    //to remove form wishlist
    public function removeWish($product_id)
    {
        foreach (Cart::instance('wishlist')->content() as $wishitem) {
            if ($wishitem->id == $product_id) {
                Cart::instance('wishlist')->remove($wishitem->rowId);
                $this->emitTo('wish-count-component', 'refreshComponent');
                return;
            }
        }
    }

    public function moveWishToCart($rowId)
    {
        $product = Cart::instance('wishlist')->get($rowId);
        Cart::instance('wishlist')->remove($rowId);
        Cart::instance('cart')->add($product->id,$product->name,1,$product->price)->associate('App\models\Product');
        $this->emitTo('wish-count-component','refreshComponent');
        $this->emitTo('cart-count-component','refreshComponent');
    }

     

    public function render()
    {
        //for database
     if(Auth::check())
     {
         Cart::instance('cart')->store(Auth::user()->email);
     }
        return view('livewire.wishlist-component')->layout('layouts.base');
    }
}
