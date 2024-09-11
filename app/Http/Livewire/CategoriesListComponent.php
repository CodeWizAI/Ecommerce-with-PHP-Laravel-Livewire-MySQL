<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoriesListComponent extends Component
{
    public function render()
    {
        //for category
        $categories = Category::whereNull('category_id')->with('subCategories')->get();
        return view('livewire.categories-list-component',['categories'=>$categories])->layout('layouts.base');
    }
}
