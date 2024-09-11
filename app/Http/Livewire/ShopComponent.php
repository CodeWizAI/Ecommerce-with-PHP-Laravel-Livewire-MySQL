<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;
use Cart;
use App\Models\Category;

class ShopComponent extends Component
{
    //for sorting and page view for product
    public $sorting;
    public $pagesize;

    public $category_selected;

    public $category_checked  = [];
   

    //for prie filter
    public $minimum_price;
    public $maximum_price;


    public function mount()
    {
        $this->sorting = "default";
        $this->pagesize = 12;
        $this->minimum_price = 1;
        $this->maximum_price = 1000;
    }




    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component','refreshComponent');
        return; 
    }


    //for wishlist
    public function addToWishlist($product_id, $product_name, $product_price)
    {
        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        $this->emitTo('wish-count-component', 'refreshComponent');
        return;
    }


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

    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public function render()
    {
        if ($this->category_checked) {
            $category_id = $this->category_checked;          
            if ($this->sorting == 'date') {
                $products = Product::whereHas('categories',function($query) use ($category_id){
                    $query->whereIn('category_product.category_id',$category_id);
                })->whereBetween('regular_price', [$this->minimum_price, $this->maximum_price])
                ->orderBy('created_at', 'DESC')->paginate($this->pagesize);
            } 
            
            else if ($this->sorting == 'price') {
                $products = Product::whereHas('categories',function($query) use ($category_id){
                    $query->whereIn('category_product.category_id',$category_id);
                })->whereBetween('regular_price', [$this->minimum_price, $this->maximum_price])->orderBy('regular_price', 'ASC')->paginate($this->pagesize);
            } else if ($this->sorting == 'price-desc') {
                $products = Product::whereHas('categories',function($query) use ($category_id){
                    $query->whereIn('category_product.category_id',$category_id);
                })->whereBetween('regular_price', [$this->minimum_price, $this->maximum_price])->orderBy('regular_price', 'DESC')->paginate($this->pagesize);
            } else { 
                $products = Product::whereHas('categories',function($query) use ($category_id){
                    $query->whereIn('category_product.category_id',$category_id);
                })->whereBetween('regular_price', [$this->minimum_price, $this->maximum_price])
                ->paginate($this->pagesize);
            }

        }
        else if($this->category_selected)
        {
            $category_id = $this->category_selected;   
             //for paging and sorting
             if ($this->sorting == 'date') {
                $products = Product::whereHas('categories',function($query) use ($category_id){
                    $query->where('category_product.category_id',$category_id);
                })->whereBetween('regular_price', [$this->minimum_price, $this->maximum_price])->orderBy('created_at', 'DESC');
            } else if ($this->sorting == 'price') {
                $products = Product::whereHas('categories',function($query) use ($category_id){
                    $query->where('category_product.category_id',$category_id);
                })->whereBetween('regular_price', [$this->minimum_price, $this->maximum_price])->orderBy('regular_price', 'ASC');
            } else if ($this->sorting == 'price-desc') {
                $products = Product::whereHas('categories',function($query) use ($category_id){
                    $query->where('category_product.category_id',$category_id);
                })->whereBetween('regular_price', [$this->minimum_price, $this->maximum_price])->orderBy('regular_price', 'DESC');
            } else {
                $products = Product::whereHas('categories',function($query) use ($category_id){
                    $query->where('category_product.category_id',$category_id);
                })->whereBetween('regular_price', [$this->minimum_price, $this->maximum_price])->paginate($this->pagesize);
            }
        }
         else {
            //for paging and sorting
            if ($this->sorting == 'date') {
                $products = Product::whereBetween('regular_price', [$this->minimum_price, $this->maximum_price])->orderBy('created_at', 'DESC')->paginate($this->pagesize);
            } else if ($this->sorting == 'price') {
                $products = Product::whereBetween('regular_price', [$this->minimum_price, $this->maximum_price])->orderBy('regular_price', 'ASC')->paginate($this->pagesize);
            } else if ($this->sorting == 'price-desc') {
                $products = Product::whereBetween('regular_price', [$this->minimum_price, $this->maximum_price])->orderBy('regular_price', 'DESC')->paginate($this->pagesize);
            } else {
                $products = Product::whereBetween('regular_price', [$this->minimum_price, $this->maximum_price])->paginate($this->pagesize);
            }
        }





        //for category
        $categories = Category::whereNull('category_id')->with('subCategories')->with('products')->get();
        $featured_products = Product::where('featured', 1)->orderBy('updated_at', 'DESC')->take(6)->get();
        $popular_products = Product::inRandomOrder()->take(4)->get();


        // to store car and wishlist in databse
        if (Auth::check()) {
            Cart::instance('cart')->store(Auth::user()->email);
            Cart::instance('wishlist')->store(Auth::user()->email);
        }




        return view('livewire.shop-component', ['products' => $products, 'categories' => $categories, 'featured_products' => $featured_products, 'popular_products' => $popular_products])->layout('layouts.base');
    }
}
