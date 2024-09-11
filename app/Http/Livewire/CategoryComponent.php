<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;
use Cart;
use App\Models\Category;
class CategoryComponent extends Component
{
    //for sorting and page view for product
    public $sorting;
    public $pagesize;
    public $category_slug;//for category

    public function mount( $category_slug)
    {
        $this->sorting="default";
        $this->pagesize=12;
        $this->category_slug = $category_slug;
    }




    public function store($product_id,$product_name,$product_price)
    {
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component','refreshComponent');
        return; 
    }
    

    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public function render()
    {
        
        // //for paging and sorting
        // if($this->sorting == 'date')
        // {
        //     $products = Product::where('category_id',$category_id)->orderBy('created_at','DESC')->paginate($this->pagesize);
        // }
        // else if($this->sorting == 'price')
        // {
        //     $products = Product::where('category_id',$category_id)->orderBy('regular_price','ASC')->paginate($this->pagesize);
        // }
        // else if($this->sorting == 'price-desc')
        // {
        //     $products = Product::where('category_id',$category_id)->orderBy('regular_price','DESC')->paginate($this->pagesize);
        // }
        // else{
            $category = Category::with('products')->where('slug',$this->category_slug)->first();
          
            $category_name = $category->name;
            $category_slug = $category->slug;
        // }

        //for category
        // $categories = Category::all();
        
        
        return view('livewire.category-component',['category'=>$category,'category_name'=>$category_name,'category_slug'=>$category_slug])->layout('layouts.base');
    }
}
