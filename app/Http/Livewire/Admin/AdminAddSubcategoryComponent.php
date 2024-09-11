<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\SubCategory;
use Carbon\Carbon;
use Livewire\WithFileUploads;
class AdminAddSubcategoryComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $image;


    public $category_id;

    public function mount($category_id){
        $this->category_id  = $category_id;
       
    }

    public function generateSlug(){
        $this->slug = Str::slug($this->name);
    }

    public function updated($fields){
         $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required|unique:categories',
            'image' => 'required|mimes:jpeg,png'
         ]);
    }

    public function storeSubcategory(){

        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories',
            'image' => 'required|mimes:jpeg,png'
        ]);

        $subcategory = new Subcategory();
        $subcategory->name = $this->name;
        $subcategory->slug = $this->slug;

        $imageName = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('sub-categories',$imageName);
        $subcategory->image = $imageName;

        $subcategory->category_id = $this->category_id;

        $subcategory->save();
        session()->flash('message','Sub-category has been created successfully');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-subcategory-component')->layout('layouts.dashboard');
    }
}
