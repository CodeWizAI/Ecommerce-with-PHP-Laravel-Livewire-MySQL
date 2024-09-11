<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\Category;

use livewire\WithPagination;

class AdminCategoryComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public function deleteCategory($id)
    {

        $category = Category::find($id);
        $category->products()->sync([]);
        $category->delete();
        session()->flash('message', 'Category Has been deleted successfully');
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-category-component', ['categories' => $categories])->layout('layouts.dashboard');
    }
}
