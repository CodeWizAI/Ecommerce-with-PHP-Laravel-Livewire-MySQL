<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;
use Cart;
use App\Models\Category;
class SearchComponent extends Component
{
    //for searching
    public $search;

    public function mount()
    {
        $this->sorting="default";
        $this->pagesize=12;
        $this->fill(request()->only('search'));

    }

    public function store($product_id,$product_name,$product_price)
    {
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added to the cart');
        return redirect()->route('product.cart');
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
    

    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public function render()
    {

        $products = Product::where('name','like','%'.$this->search.'%')->paginate(8); 

        
        return view('livewire.search-component',['products'=> $products,'search'=>$this->search])->layout('layouts.base');
    }
}
