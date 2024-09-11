<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use App\Models\Product;
use App\Models\Sale;
use Cart;
use Illuminate\Support\Facades\Auth;

class HomeComponent extends Component
{

    public function store($product_id,$product_name,$product_price)
    {
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component','refreshComponent');
        return; 
    }


    //for wishlist
    public function addToWishlist($product_id,$product_name,$product_price)
    {
        Cart::instance('wishlist')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        $this->emitTo('wish-count-component','refreshComponent');
        return;
    }
    //to remove form wishlist
    public function removeWish($product_id)
    {
        foreach(Cart::instance('wishlist')->content() as $wishitem)
        {
            if($wishitem->id == $product_id)
            {
                Cart::instance('wishlist')->remove($wishitem->rowId);
                $this->emitTo('wish-count-component','refreshComponent');
                return;
            }
        }
    }
    
    public function render()
    {
        
       
        $latest_products = Product::orderBy('created_at','DESC')->get()->take(12);
        $categories = Category::orderBy('created_at','DESC')->get()->take(4);
        $onsale_products = Product::where('sale_price','>',0)->orderBy('created_at','DESC')->get()->take(6);
        $sale = Sale::find(1);

        if(Auth::check())
        {
            Cart::instance('cart')->restore(Auth::user()->email);
            Cart::instance('wishlist')->restore(Auth::user()->email);

        }

        return view('livewire.home-component',['latest_products'=>$latest_products,'categories'=>$categories,'onsale_products'=>$onsale_products,'sale'=>$sale])->layout('layouts.base');
    }
}
