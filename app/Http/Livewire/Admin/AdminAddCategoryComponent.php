<?php

namespace App\Http\Livewire\Admin;
use Livewire\Component;
use App\Models\Category;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Livewire\WithFileUploads;
class AdminAddCategoryComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $image;
    public $category_id;

    public function createUniqueSlug() 
    {
        $this->slug = SlugService::createSlug(Category::class, 'slug', $this->name);
    }

    public function updated($fields){
         $this->validateOnly($fields,[
            'name' => 'required|unique:categories',
            'image' => 'required|mimes:jpeg,png'
         ]);
    }

    public function storeCategory(){

        $this->validate([
            'name' => 'required|unique:categories',
            'image' => 'required|mimes:jpeg,png'
        ]);

        $category = new Category();
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->category_id = $this->category_id;

        $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('categories',$imageName);
        $category->image = $imageName;

        $category->save();
        session()->flash('message','Category has been created successfully');
    }
    public function render()
    {
        $categories = Category::whereNull('category_id')->get();
        return view('livewire.admin.admin-add-category-component',['categories'=>$categories])->layout('layouts.dashboard');
    }
}
