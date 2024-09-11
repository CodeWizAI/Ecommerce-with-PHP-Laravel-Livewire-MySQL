<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;

class AdminFeaturedProductsComponent extends Component
{
    public function removeFeaturedProduct($id){
        $product = Product::find($id);
        $product->featured = 0;
        $product->save();
        session()->flash('message','Product Has been removed from featured successfully');
    }

    public function render()
    {
        $featured_products = Product::where('featured',1)->get();
        return view('livewire.admin.admin-featured-products-component',['featured_products'=>$featured_products])->layout('layouts.dashboard');
    }
}
