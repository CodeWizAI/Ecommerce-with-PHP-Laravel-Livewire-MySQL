<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use App\Models\Coupon;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;

class CartComponent extends Component
{

    //for coupon code
    public $coupon_code;
    public $discount;
    public $subtotalwithdiscount;
    public $taxafterdiscount;
    public $totalafterdiscount;
    public $checkout;
    



    public function increaseQuantity($rowId){

        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('cart-count-component','refreshComponent');
    }
    public function decreaseQuantity($rowId){

        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('cart-count-component','refreshComponent');
    }

    public function destroy($rowId){
        Cart::instance('cart')->remove($rowId);
        $this->emitTo('cart-count-component','refreshComponent');
        session()->flash('success_message','Item has been Removed');
    }

    //for save option
    public function saveForLater($rowId){
        $product =  Cart::instance('cart')->get($rowId);
        Cart::instance('cart')->remove($rowId);
        Cart::instance('saveforlater')->add($product->id,$product->name,1,$product->price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component','refreshComponent');
        session()->flash('success_message','Product Has Been Save For Later');
        
    }


    public function moveToCart($rowId)
    {
        $product =  Cart::instance('saveforlater')->get($rowId);
        Cart::instance('saveforlater')->remove($rowId);
        Cart::instance('cart')->add($product->id,$product->name,1,$product->price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component','refreshComponent');
        session()->flash('save_success_message','Product Has Been Moved To Cart');
    }

    public function deleteFromSave($rowId)
    {
        Cart::instance('saveforlater')->remove($rowId);
        session()->flash('save_success_message','Product Has been Removed From Saved');

    }


    public function applyCoupon(){
        $coupon = Coupon::where('coupon_code',$this->coupon_code)->first();
        $coupon_cart = Coupon::where('coupon_code',$this->coupon_code)->where('cart_value','<=',Cart::instance('cart')->subtotal())->first();
        $expired_coupon = Coupon::where('coupon_code',$this->coupon_code)->where('expiry_date','>=',Carbon::today())->first();
        if(!$coupon)
        {
            session()->flash('coupon_message','Coupon Code Is Invalid !!!');
            return;
        }
        if(!$coupon_cart)
        {
            session()->flash('coupon_message','This Coupon Code Is Valid For Product Price Upto $ '.$coupon->cart_value.' Only');
            return;

        }
        if(!$expired_coupon)
        {
            session()->flash('coupon_message','This Coupon Code Is Expired');
            return;

        }
        session()->put('coupon',[
            'coupon_code' => $coupon->coupon_code,
            'coupon_type' => $coupon->type,
            'coupon_value' => $coupon->value,
            'cart_value' => $coupon->cart_value

        ]);
    }

    public function calculateDiscount()
    {
        if(session()->has('coupon'))
        {
            if(session()->get('coupon')['coupon_type'] == 'fixed')
            {
                $this->discount = session()->get('coupon')['coupon_value'];

            }
            else
            {
                $this->discount = (Cart::instance('cart')->subtotal() * session()->get('coupon')['coupon_value'])/100;
            }
            $this->subtotalwithdiscount = Cart::instance('cart')->subtotal() - $this->discount;
            $this->taxafterdiscount =  ($this->subtotalwithdiscount * config('cart.tax'))/100;
            $this->totalafterdiscount = $this->subtotalwithdiscount + $this->taxafterdiscount;
        }
    }


    public function removeCoupon()
    {
        session()->forget('coupon');
    }


    //for checkout
    public function checkout()
    {
        if(Auth::check())
        {
            return redirect()->route('checkout');
        }
        else
        {
            return redirect()->route('login');
        }
    }


    public function setamountForCheckout()
    {
        if(!Cart::instance('cart')->count() > 0)
        {
            session()->forget('checkout');
        }
        if(session()->has('coupon'))
        {
            session()->put('checkout',[
                'discount' => $this->discount,
                'subtotal' => $this->subtotalwithdiscount,
                'tax' => $this->taxafterdiscount,
                'total' => $this->totalafterdiscount
            ]);
        }
        else
        {
            // $checkout = [
            //     'discount' => 0,
            //     'subtotal' => Cart::instance('cart')->subtotal(),
            //     'tax' => Cart::instance('cart')->tax(),
            //     'total' => Cart::instance('cart')->total()
            // ];
            
            session()->put('checkout',[
                'discount' => 0,
                'subtotal' => Cart::instance('cart')->subtotal(),
                'tax' => Cart::instance('cart')->tax(),
                'total' => Cart::instance('cart')->total()
            ]);
        }
    }

    public function render()
    {
        if(session()->has('coupon'))
        {
            if(Cart::instance('cart')->subtotal() < session()->get('coupon')['cart_value'])
            {
                session()->forget('coupon');
            }
            else
            {
                $this->calculateDiscount();
            }
        }
        $this->setamountForCheckout();

        //for database
        if(Auth::check())
        {
            Cart::instance('cart')->store(Auth::user()->email);
        }
        return view('livewire.cart-component')->layout('layouts.base');
    }
}
