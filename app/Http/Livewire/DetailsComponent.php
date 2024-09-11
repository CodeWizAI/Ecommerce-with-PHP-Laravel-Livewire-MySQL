<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Cart;
use App\Models\Category;
use App\Models\Sale;

class DetailsComponent extends Component
{
    public $quantity;
    public $slug;
    public $category_id;
    public $category_ids = [];

    public function mount($slug){
        $this->slug = $slug;
        $this->quantity = 1;
    }

    public function increaseQuantity()
    {
        $this->quantity++;
    }
    public function decreaseQuantity()
    {
        if($this->quantity > 1)
        {
            $this->quantity--;

        }
        
    }


    public function store($product_id,$product_name,$product_price)
    {
        Cart::instance('cart')->add($product_id,$product_name,$this->quantity,$product_price)->associate('App\Models\Product');
        session()->flash('success_message','Item added to the cart');
        return redirect()->route('product.cart');
    }



    public function render()
    {
        
        $product = Product::with('categories')->where('slug',$this->slug)->first();

                             
      foreach($product->categories as $category)  {
        dd($category->id);
        
      }        
        
        // // dd($product->categories());
        // $category_ids = $product->categories;

        // $related_products =  Product::whereHas('categories',function($query) use ($category_ids) {
        //     $query->whereIn('categories.id',$category_ids);
        // })->get();


        // $related_products =  Product::with('categories')->where('slug',$this->slug)->get()->pluck('categories.id');
        // dd($related_products);
        


        $sale = Sale::find(1);
        return view('livewire.details-component',['product'=>$product,'sale'=>$sale,'related_products'=>$related_products])->layout('layouts.base');
    }
}
