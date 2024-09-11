<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupon;

use Illuminate\Validation\Rule;

class EditCouponComponent extends Component
{
    public $coupon_code;
    public $coupon_type;
    public $coupon_value;
    public $cart_value;
    public $expiry_date;
    public $coupon_id;

    public function mount($coupon_id)
    {
        $coupon = Coupon::find($coupon_id);
        $this->coupon_code = $coupon->coupon_code;
        $this->coupon_type = $coupon->type;
        $this->coupon_value = $coupon->value;
        $this->cart_value = $coupon->cart_value;
        $this->coupon_id = $coupon->id;
        $this->expiry_date = $coupon->expiry_date;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'coupon_code' => ['required', Rule::unique('coupons')->ignore($this->coupon_id)],
            'coupon_type' => 'required',
            'coupon_value' => 'required|numeric',
            'cart_value' => 'required|numeric',
            'expiry_date' => 'required|date'
        ]);
    }


    public function updateCoupon()
    {
        $this->validate([

            'coupon_code' => ['required', Rule::unique('coupons')->ignore($this->coupon_id)],
            'coupon_type' => 'required',
            'coupon_value' => 'required|numeric',
            'cart_value' => 'required|numeric',
            'expiry_date' => 'required|date'

        ]);
        $coupon = Coupon::find($this->coupon_id);
        $coupon->coupon_code = $this->coupon_code;
        $coupon->type = $this->coupon_type;
        $coupon->value = $this->coupon_value;
        $coupon->cart_value = $this->cart_value;
        
        $coupon->expiry_date = $this->expiry_date;
        $coupon->save();
        session()->flash('message','Coupon Has Been Updated Successfully');

    }
    public function render()
    {
        return view('livewire.admin.edit-coupon-component')->layout('layouts.dashboard');
    }
}
