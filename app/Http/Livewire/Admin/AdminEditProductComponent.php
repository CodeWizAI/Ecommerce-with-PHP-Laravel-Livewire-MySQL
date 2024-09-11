<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\Product;

use App\Models\Category;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;


class AdminEditProductComponent extends Component
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
    public $category_selected = [];
    public $newimage;
    public $images;
    public $newimages;
    public $product_id;
    public function rules()
    {
        return [
            'name' => ['required', Rule::unique('products')->ignore($this->product_id)],
            'short_description' => 'required',
            'description' => 'required',
            'regular_price' => 'required|numeric',
            'sale_price' => 'numeric',
            'SKU' => 'required',
            'stock_status' => 'required',
            'quantity' => 'required|numeric',
            // 'category_selected.*' => 'array'
        ];
    }

    public function mount($product_slug)
    {
        $product = Product::where('slug', $product_slug)->first();
        $this->name = $product->name;
        $this->short_description = $product->short_description;
        $this->description = $product->description;
        $this->regular_price = $product->regular_price;
        $this->sale_price = $product->sale_price;
        $this->SKU = $product->SKU;
        $this->stock_status = $product->stock_status;
        $this->featured = $product->featured;
        $this->quantity = $product->quantity;
        $this->image = $product->image;
        $this->images = $product->images;
        $this->category_selected = $product->categories()->pluck('category_product.category_id')->toArray();
        $this->product_id = $product->id;
    }

    public function createUniqueSlug()
    {
        $this->slug = SlugService::createSlug(Product::class, 'slug', $this->name);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields);
        //  $this->validateOnly($fields, [
        //     'name' => ['required', Rule::unique('products')->ignore($this->product_id)],
        //     'short_description' => 'required',
        //     'description' => 'required',
        //     'regular_price' => 'required|numeric',
        //     'sale_price' => 'numeric',
        //     'SKU' => 'required',
        //     'stock_status' => 'required',
        //     'quantity' => 'required|numeric',
        //     'category_selected' => 'required'
        // ]);
    }

    public function updateProduct()
    {

        // $this->validate([
        //     'name' => ['required', Rule::unique('products')->ignore($this->product_id)],
        //     'short_description' => 'required',
        //     'description' => 'required',
        //     'regular_price' => 'required|numeric',
        //     'sale_price' => 'numeric',
        //     'SKU' => 'required',
        //     'stock_status' => 'required',
        //     'quantity' => 'required|numeric',
        //     'category_selected' => 'required'
        // ]);
        $this->validate();

        $product = Product::find($this->product_id);
        $product->name = $this->name;
        // $product->slug = $this->slug;
        $product->short_description = $this->short_description;
        $product->description = $this->description;
        $product->regular_price = $this->regular_price;
        $product->sale_price = $this->sale_price;
        $product->SKU = $this->SKU;
        $product->stock_status = $this->stock_status;
        $product->featured = $this->featured;
        $product->quantity = $this->quantity;

        if ($this->newimage) {
            $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $this->newimage->storeAs('products', $imageName);
            $product->image = $imageName;
        }

        if ($this->newimages) {
            $imagesname = '';
            foreach ($this->newimages as $key => $image) {
                $imgName = Carbon::now()->timestamp . $key . '.' . $image->extension();
                $image->storeAs('products', $imgName);
                $imagesname = $imagesname . ',' . $imgName;
            }
            $product->images = $imagesname;
        }
        $product->save();
        // dd($this->category_selected);
        $product->categories()->sync($this->category_selected);

        session()->flash('message', 'Product Has been updated Successfully');
    }



    public function render()
    {
        $product = Product::find($this->product_id);
        $categories = Category::all();
        return view('livewire.admin.admin-edit-product-component', ['categories' => $categories, 'product' => $product])->layout('layouts.dashboard');
    }
}
