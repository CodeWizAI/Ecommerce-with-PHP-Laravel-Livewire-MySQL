<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\HomeSlider;

use Carbon\Carbon;
use Livewire\WithFileUploads;

class AdminAddHomeSliderComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $subtitle;
    public $price;
    public $link;
    public $status;
    public $image;

    public function mount(){
        $this->status = 0;  
    }

    public function storeSlider(){
        $slider  = new HomeSlider();
        $slider->title = $this->title;
        $slider->subtitle = $this->subtitle;
        $slider->price = $this->price;
        $slider->link = $this->link;

        $imageName = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('sliders',$imageName);
        $slider->image = $imageName;

        $slider->status = $this->status;
        $slider->save();

        session()->flash('message','A new slider has beeen created successfully');


    }


    public function render()
    {
        return view('livewire.admin.admin-add-home-slider-component')->layout('layouts.dashboard');
    }
}
