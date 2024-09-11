<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\Product;
use livewire\WithPagination;

class AdminProductComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function deleteProduct($id)
    {


        $product = Product::find($id);
        $product->categories()->sync([]);
        $product->delete();
        session()->flash('message', 'Product Has been deleted successfully');
    }

    public function render()
    {
        $products = Product::all();
        return view('livewire.admin.admin-product-component', ['products' => $products])->layout('layouts.dashboard');
    }
}
