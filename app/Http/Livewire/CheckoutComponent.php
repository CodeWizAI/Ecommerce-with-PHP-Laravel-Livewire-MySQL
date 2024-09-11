<?php

namespace App\Http\Livewire;

use App\Mail\OrderMail;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;
use App\Services\Esewa;
use Livewire\Component;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Cart;
use Exception;
use Stripe;

class CheckoutComponent extends Component
{


    //for billing address
    public $fullname;
    public $email;
    public $address1;
    public $address2;
    public $mobile;
    public $city;
    public $country;
    public $province;
    public $zipcode;


    // //for shipping address
    // public $ship_different;
    // public $s_firstname;
    // public $s_lastname;
    // public $s_email;
    // public $s_address1;
    // public $s_address2;
    // public $s_mobile;
    // public $s_city;
    // public $s_country;
    // public $s_province;
    // public $s_zipcode;


    //for payment method
    public $paymentmethod;
    public $card_no;
    public $exp_month;
    public $exp_year;
    public $cvc;



    public $thankyou;

    public function mount()
    {
        $this->fullname = Auth::user()->name;
        $this->email = Auth::user()->email;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'fullname' => 'required',
            'email' => 'required|email',
            'address1' => 'required',
            'mobile' => 'required|numeric',
            'city' => 'required',
            'country' => 'required',
            'province' => 'required',
            'paymentmethod' => 'required'
        ]);

        //for shipping different
        // if($this->ship_different)
        // {
        //     $this->validateOnly($fields, [
        //     's_firstname' => 'required',
        //         's_lastname' => 'required',
        //         's_email' => 'required|email',
        //         's_address1' => 'required',
        //         's_mobile' => 'required|numeric',
        //         's_city' => 'required',
        //         's_country' => 'required',
        //         's_province' => 'required',
        //         's_zipcode' => 'required',
        //         'paymentmethod' =>'required'

        //     ]);

        // }

        //for card checkout
        if ($this->paymentmethod == 'card') {
            $this->validateOnly($fields, [
                'card_no' => 'required|numeric',
                'exp_month' => 'required|numeric',
                'exp_year' => 'required|numeric',
                'cvc' => 'required|numeric'
            ]);
        }
    }

    public function placeOrder()
    {
        //validate billin g address form
        $this->validate([
            'fullname' => 'required',
            'email' => 'required|email',
            'address1' => 'required',
            'mobile' => 'required|numeric',
            'city' => 'required',
            'country' => 'required',
            'province' => 'required',
            'paymentmethod' => 'required|in:card,cash_on_delivery,paypal,esewa'
        ]);
        
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->subtotal = session()->get('checkout')['subtotal'];
        $order->discount = session()->get('checkout')['discount'];
        $order->tax = session()->get('checkout')['tax'];
        $order->total = session()->get('checkout')['total'];
        $order->fullname = $this->fullname;
        $order->email = $this->email;
        $order->address1 = $this->address1;
        $order->address2 = $this->address2;
        $order->mobile = $this->mobile;
        $order->city = $this->city;
        $order->country = $this->country;
        $order->province = $this->province;
        $order->zipcode = $this->zipcode;
        $order->status = 'ordered';
        $order->payment_method = $this->paymentmethod;
        $order->payment_status = false;
        // $order->is_shipping_different = $this->ship_different ? 1 : 0;
        $order->is_shipping_different =  0;
        $order->save();

        //to add products as a ordered item
        foreach (Cart::instance('cart')->content() as $item) {
            $orderitem = new OrderItem();
            $orderitem->product_id = $item->id;
            $orderitem->order_id = $order->id;
            $orderitem->price = $item->price;
            $orderitem->quantity = $item->qty;
            $orderitem->save();
        }
        if ($this->paymentmethod == 'esewa') {
            return redirect()->route('proceed-to-pay', $order->id);
        }


        if ($this->paymentmethod == 'card') {
            $this->validate([
                'card_no' => 'required|numeric',
                'exp_month' => 'required|numeric',
                'exp_year' => 'required|numeric',
                'cvc' => 'required|numeric'
            ]);
        }

        //to save order

        //for different shipping address
        //validate shipping address form
        // if ($this->ship_different) {
        //     $this->validate([
        //         's_firstname' => 'required',
        //         's_lastname' => 'required',
        //         's_email' => 'required|email',
        //         's_address1' => 'required',
        //         's_mobile' => 'required|numeric',
        //         's_city' => 'required',
        //         's_country' => 'required',
        //         's_province' => 'required',
        //         's_zipcode' => 'required',
        //         'paymentmethod' =>'required'
        //     ]);

        //    $shipping = new Shipping();
        //    $shipping->order_id  = $order->id;
        //    $shipping->firstname = $this->s_firstname;
        //    $shipping->lastname = $this->s_lastname;
        //    $shipping->email = $this->s_email;
        //    $shipping->address1 = $this->s_address1;
        //    $shipping->address2 = $this->s_address2;
        //    $shipping->mobile = $this->s_mobile;
        //    $shipping->city = $this->s_city;
        //    $shipping->country = $this->s_country;
        //    $shipping->province = $this->s_province;
        //    $shipping->zipcode = $this->s_zipcode;
        //    $shipping->save();
        // }

        //for transaction
        if ($this->paymentmethod == 'cash_on_delivery') {
            // $this->makeTransaction($order->id,'pending');
            $this->resetCart();
            // redirect to success page
        } else if ($this->paymentmethod == 'card') {
            $stripe = Stripe::make('sk_test_51JQ3IaA4VFb80iTDK8hPxQ5SYA7xgGoBe73qzD1MjMVHOYucYarLhlCNqFv5g9j2I3WdDpdSdGHYiCjtrs65S8lz00dWe2WeLu');


            try {
                $token = $stripe->tokens()->create([
                    'card' => [
                        'number' => $this->card_no,
                        'exp_month' => $this->exp_month,
                        'exp_year' => $this->exp_year,
                        'cvc' => $this->cvc
                    ]
                ]);



                if (!isset($token['id'])) {
                    session()->flash('stripe_error', 'The stripe token was generated correctly');
                    $this->thankyou = 0;
                }

                $customer = $stripe->customers()->create([
                    'name' => $this->fullname,
                    'email' => $this->email,
                    'phone' => $this->mobile,
                    'address' => [
                        'line1' => $this->address1,
                        'postal_code' => $this->zipcode,
                        'city' => $this->city,
                        'state' => $this->province,
                        'country' => $this->country

                    ],
                    'shipping' => [
                        'name' => $this->fullname,
                        'address' => [
                            'line1' => $this->address1,
                            'postal_code' => $this->zipcode,
                            'city' => $this->city,
                            'state' => $this->province,
                            'country' => $this->country
                        ],

                    ],
                    'source' => $token['id']
                ]);


                $charge = $stripe->charges()->create([
                    'customer' => $customer['id'],
                    'currency' => 'USD',
                    'amount' => session()->get('checkout')['total'],
                    'description' => 'Payment for order no ' . $order->id


                ]);
                if ($charge['status'] == 'succeeded') {
                    $this->makeTransaction($order->id, 'approved');
                    $this->resetCart();
                } else {
                    session()->flash('stripe_error', 'Error In Transaction');
                    $this->thankyou = 0;
                }
            } catch (Exception $e) {
                session()->flash('session_error', $e->getMessage());
                $this->thankyou = 0;
            }
        }


        $this->sendOrderConfirmationMail($order);
    }


    public function resetCart()
    {
        $this->thankyou = 1;
        Cart::instance('cart')->destroy();
        session()->forget('checkout');
    }


    public function makeTransaction($order_id, $status)
    {
        $transaction = new Transaction();
        $transaction->user_id = Auth::user()->id;
        $transaction->order_id = $order_id;
        $transaction->mode = $this->paymentmethod;
        $transaction->status = $status;
        $transaction->save();
    }

    public function verifyCheckout()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        } else if ($this->thankyou) {
            return redirect()->route('thankyou');
        } else if (!session()->get('checkout')) {
            return redirect()->route('product.cart');
        }
    }


    //for sending order confirmation email
    public function sendOrderConfirmationMail($order)
    {
        Mail::to($order->email)->send(new OrderMail($order));
    }


    public function render()
    {
        $this->verifyCheckout();
        return view('livewire.checkout-component')->layout('layouts.base');
    }
}
