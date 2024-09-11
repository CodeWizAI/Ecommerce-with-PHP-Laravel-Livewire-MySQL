<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Livewire\WithFileUploads;

use Illuminate\Validation\Rule;


class AdminEditCtegoryComponent extends Component
{

    use WithFileUploads;
    public $category_slug;
    public $category_id;
    public $name;
    public $category_name;
    public $slug;
    public $newimage;
    public $image;

    public $category_refid;
    public $category_refname;

    public function mount($category_slug){
        $this->category_slug  = $category_slug;
        $category = Category::where('slug',$category_slug)->first();
        $this->category_id = $category->id;
        $this->name = $category->name;
        $this->image = $category->image;

        $this->category_refid = $category->category_id;
        $category_ref = Category::where('category_id',$this->category_refid)->first();
        $this->category_refname = $category_ref->name;
    }

    public function createUniqueSlug() 
    {
        $this->slug = SlugService::createSlug(Category::class, 'slug', $this->name);
    }

    //for validation
    public function updated($fields){
        $this->validateOnly($fields,[
           'name' =>['required', Rule::unique('categories')->ignore($this->category_id)],
           
        //    'newimage' => 'mimes:jpeg,png'
        ]);
   }


    public function updateCategory(){

        $this->validate([
            'name' => ['required', Rule::unique('categories')->ignore($this->category_id)],
            // 'newimage' => 'required|mimes:jpeg,png'
        ]);

        $category = Category::find($this->category_id);
        $category->name = $this->name;
        $category->slug = $this->slug;
        if($this->newimage){
            $imageName = Carbon::now()->timestamp.'.'.$this->newimage->extension();
            $this->newimage->storeAs('categories',$imageName);
            $category->image = $imageName;
        }
        $category->save();

        session()->flash('message','Category has been updated Successfully');
    }



    public function render()
    {
        $categories = Category::whereNull('category_id')->get();
        return view('livewire.admin.admin-edit-ctegory-component',['categories'=>$categories])->layout('layouts.dashboard');
    }
}
