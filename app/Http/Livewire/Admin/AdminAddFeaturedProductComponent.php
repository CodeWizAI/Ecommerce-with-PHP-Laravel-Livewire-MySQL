<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;

class AdminAddFeaturedProductComponent extends Component
{
    public function addFeaturedProduct($id){
        $product = Product::find($id);
        $product->featured = 1;
        $product->save();
        session()->flash('message','Product Has been added to featured successfully');
    }

    public function render()
    {
        $non_featuredproducts = Product::where('featured',0)->get();
        return view('livewire.admin.admin-add-featured-product-component',['non_featuredproducts'=>$non_featuredproducts])->layout('layouts.dashboard');
    }
}
