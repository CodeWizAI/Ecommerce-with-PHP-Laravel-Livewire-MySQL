<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Subcategory;
use Livewire\WithFileUploads;

use Illuminate\Validation\Rule;


class AdminEditSubcategoryComponent extends Component
{
    use WithFileUploads;
    public $subcategory_slug;
    public $subcategory_id;
    public $name;
    public $slug;
    public $newimage;
    public $image;

    public function mount($subcategory_slug){
        $this->subcategory_slug  = $subcategory_slug;
        $subcategory = Subcategory::where('slug',$subcategory_slug)->first();
        $this->subcategory_id = $subcategory->id;
        $this->name = $subcategory->name;
        $this->slug = $subcategory->slug;
        $this->image = $subcategory->image;
    }

    public function generateSlug(){
        $this->slug = Str::slug($this->name);
    }

    //for validation
    public function updated($fields){
        $this->validateOnly($fields,[
           'name' => 'required',
           'slug' => ['required', Rule::unique('categories')->ignore($this->subcategory_id)],
        //    'newimage' => 'mimes:jpeg,png'
        ]);
   }


    public function updateCategory(){

        $this->validate([
            'name' => 'required',
            'slug' => ['required', Rule::unique('categories')->ignore($this->subcategory_id)],
            // 'newimage' => 'required|mimes:jpeg,png'
        ]);

        $subcategory = Subcategory::find($this->subcategory_id);
        $subcategory->name = $this->name;
        $subcategory->slug = $this->slug;
        if($this->newimage){
            $imageName = Carbon::now()->timestamp.'.'.$this->newimage->extension();
            $this->newimage->storeAs('categories',$imageName);
            $subcategory->image = $imageName;
        }
        $subcategory->save();

        session()->flash('message','Subcategory has been updated Successfully');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-subcategory-component')->layout('layouts.dashboard');
    }
}

