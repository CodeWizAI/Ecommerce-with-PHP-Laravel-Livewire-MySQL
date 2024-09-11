<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupon;

class AddCouponComponent extends Component
{
    public $coupon_code;
    public $coupon_type;
    public $coupon_value;
    public $cart_value;
    public $expiry_date;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'coupon_code' => 'required|unique:coupons',
            'coupon_type' => 'required',
            'coupon_value' => 'required|numeric',
            'cart_value' => 'required|numeric',
            'expiry_date' => 'required|date_invalid'
        ]);
    }


    public function storeCoupon()
    {
        $this->validate([

            'coupon_code' => 'required|unique:coupons',
            'coupon_type' => 'required',
            'coupon_value' => 'required|numeric',
            'cart_value' => 'required|numeric',
            'expiry_date' => 'required|date_invalid'

        ]);
        $coupon = new Coupon();
        $coupon->coupon_code = $this->coupon_code;
        $coupon->type = $this->coupon_type;
        $coupon->value = $this->coupon_value;
        $coupon->cart_value = $this->cart_value;
        $coupon->expiry_date = $this->expiry_date;

        $coupon->save();
        session()->flash('message','Coupon Has Been Created Successfully');

    }
    public function render()
    {
        return view('livewire.admin.add-coupon-component')->layout('layouts.dashboard');
    }
}
