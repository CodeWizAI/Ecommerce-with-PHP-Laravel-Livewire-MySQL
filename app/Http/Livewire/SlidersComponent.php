<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\HomeSlider;

class SlidersComponent extends Component
{
    public function render()
    {
        $sliders = HomeSlider::where('status',1)->get();
        return view('livewire.sliders-component',['sliders'=>$sliders]);
    }
}
