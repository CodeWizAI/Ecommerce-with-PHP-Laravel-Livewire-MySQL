<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\Category;

use Illuminate\Support\Str;

use App\Models\Product;


use Livewire\WithFileUploads;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Services\SlugService;

class AdminAddProductComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $SKU;
    public $stock_status;
    public $featured;
    public $quantity;
    public $image;
    public $images;

    public $category_selected = [];

    public function mount()
    {
        $this->stock_status = 'instock';
        $this->featured = '0';

    }



    public function createUniqueSlug() 
    {
        $this->slug = SlugService::createSlug(Product::class, 'slug', $this->name);
    }


    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'sale_price' => 'numeric',
            'SKU' => 'required',
            'stock_status' => 'required',
            'quantity' => 'required|numeric',
            'image' => 'required|mimes:jpeg,png',
            'category_selected' => 'required'
           
        ]);

    }

    public function storeProduct(){
   
        $this->validate([
            'name' => 'required',
            // 'slug' =>  'required|unique:products',
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'sale_price' => 'numeric',
            'SKU' => 'required',
            'stock_status' => 'required',
            'quantity' => 'required|numeric',
            'image' => 'required|mimes:jpeg,png',
            'category_selected' => 'required'
          
        ]);


        $product = new Product();
        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->SKU = $this->SKU;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->quantity = $this->quantity;

        $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('products',$imageName);
        $product->image = $imageName;


        if($this->images)
        {
            $imagesname = '';
            foreach($this->images as $key=>$image)
            {
                $imgName = Carbon::now()->timestamp. $key. '.' . $image->extension();
                $image->storeAs('products',$imgName);
                $imagesname = $imagesname . ',' . $imgName;
            }
            $product->images = $imagesname;

        }

        $product->save();
       

        if($this->category_selected){
            $category = Category::find($this->category_selected);
            $product->categories()->attach($category);
        }


        session()->flash('message','New Product Added Successfully');   

    }

    public function render()
    {
        $categories = Category::all();
     
        return view('livewire.admin.admin-add-product-component',['categories'=>$categories])->layout('layouts.dashboard');
    }
}
