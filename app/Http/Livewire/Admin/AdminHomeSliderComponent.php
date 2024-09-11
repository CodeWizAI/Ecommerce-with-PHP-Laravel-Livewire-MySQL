<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Livewire\Component;

class AdminHomeSliderComponent extends Component
{
    public function deleteSlider($slider_id){
         $slider = HomeSlider::find($slider_id)->first();
         $slider->delete();
         session()->flash('message','A slider has been deleted successfully');
    
    }
    public function render()
    {
        $sliders = HomeSlider::all();
        return view('livewire.admin.admin-home-slider-component',['sliders'=>$sliders])->layout('layouts.dashboard');
    }
}
