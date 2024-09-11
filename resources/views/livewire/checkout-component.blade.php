<main>
    <div class="container">
        <div class="login-form">
            <form wire:submit.prevent="placeOrder" onsubmit="$('#processing').show();">
                <div class="login-head">
                    Billing / Shipping Address
                </div>
                <hr>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="">Full Name <span class="text-danger">*</span></label>
                        <input type="" class="form-control" name="fullname" 
                            wire:model="fullname">
                        @error('fullname')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="">Email Address <span class="text-danger">*</span></label>
                        <input type="" class="form-control" name="email" placeholder="Enter email address here"
                            wire:model="email">
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="">Phone Number <span class="text-danger">*</span></label>
                        <input type="" class="form-control" name="mobile" placeholder="Enter phone number here"
                            wire:model="mobile">
                        @error('mobile')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-3 col-6">
                        <label for="">Country <span class="text-danger">*</span></label>
                        <input type="" class="form-control" name="country" placeholder="Enter here"
                            wire:model="country">
                        @error('country')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-3 col-6">
                        <label for="">Zip/Post Code</label>
                        <input type="" class="form-control" name="zipcode" placeholder="Enter postal here"
                            wire:model="zipcode">
                        @error('zipcode')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="">Province <span class="text-danger">*</span></label>
                        <select name="province" class="form-control" id="province" wire:model="province">
                            <option value="">Select Your Province</option>
                            <option value="province1">Province No. 1</option>
                            <option value="province2">Province No.2</option>
                            <option value="bagmati">Bagmati</option>
                            <option value="gandaki">Gandaki</option>
                            <option value="lumbini">Lumbini</option>
                            <option value="karnali">Karnali</option>
                            <option value="sudurpashchim">Sudurpashchim</option>
                        </select>
                        @error('province')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="">City/Town <span class="text-danger">*</span></label>
                        <input type="" class="form-control" name="city" placeholder="Enter city name here"
                            wire:model="city">
                        @error('city')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <label for="">Address Line 1 <span class="text-danger">*</span></label>
                        <input type="" class="form-control" name="address1" placeholder="Enter local location name here"
                            wire:model="address1">
                        @error('address1')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="">Address Line 2</label>
                        <input type="" class="form-control" name="address2" placeholder="Enter local location name here"
                            wire:model="address2">
                        @error('address2')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                

                {{-- for shipping different --}}
                {{--<div class="form-check">
                    <label class="form-check-label" for="flexCheckDefault">
                        <input class="form-check-input" type="checkbox" value="" id="different-address"
                            wire:model="ship_different">
                        <span class="color-custom2" style="font-weight:bold;">Ship to a different address ?</span>
                    </label>
                </div>

                <br>
              
                 @if ($ship_different)
                    <div class="login-head">
                        Shipping Address
                    </div>
                    <hr>

                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="">First Name</label>
                            <input type="" class="form-control" name="s_firstname" placeholder="Enter first name here"
                                wire:model="s_firstname">
                            @error('s_firstname')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="">Last Name</label>
                            <input type="" class="form-control" name="s_lastname" placeholder="Enter last name here"
                                wire:model="s_lastname">
                            @error('s_lastname')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="">Email Address:</label>
                            <input type="" class="form-control" name="s_email" placeholder="Enter email address here"
                                wire:model="s_email">
                            @error('s_email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="">Phone Number</label>
                            <input type="" class="form-control" name="s_" placeholder="Enter phone number here"
                                wire:model="s_mobile">
                            @error('s_mobile')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="">Country</label>
                            <input type="" class="form-control" name="s_country" placeholder="Enter here"
                                wire:model="s_country">
                            @error('s_country')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="">Zip/Postal Code</label>
                            <input type="" class="form-control" name="s_zipcode" placeholder="Enter postal here"
                                wire:model="s_zipcode">
                            @error('s_zipcode')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="">Province</label>
                            <input type="" class="form-control" name="s_province" placeholder="Enter postal here"
                                wire:model="s_province">
                            @error('s_province')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="">City/Town</label>
                            <input type="" class="form-control" name="s_city" placeholder="Enter city name here"
                                wire:model="s_city">
                            @error('s_city')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="">Address Line 1</label>
                            <input type="" class="form-control" name="s_address1"
                                placeholder="Enter local location name here" wire:model="s_address1">
                            @error('s_address1')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="">Address Line 2</label>
                            <input type="" class="form-control" name="s_address2"
                                placeholder="Enter local location name here" wire:model="s_address2">
                            @error('s_address2')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                @endif --}}



                <div class="checkout-summary">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="checkout-head">Payment Method</p>
                            <hr>
                            <div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                        id="exampleRadios1" value="cash_on_delivery" wire:model="paymentmethod">
                                    <label class="form-check-label" for="exampleRadios1">
                                        Cash On Delivery
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                        id="exampleRadios2" value="card" wire:model="paymentmethod">
                                    <label class="form-check-label" for="exampleRadios2">
                                        Credit/Debit Card
                                    </label>
                                </div>
                                @if ($paymentmethod == 'card')
                                <hr>
                                @if(Session::has('stripe_error'))
                                <div class="alert alert-danger" role="alert">{{Session::get('stripe_message')}}</div>
                                @endif
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="">Card Number:</label>
                                        <input type="text" class="form-control" name="card-no" placeholder="Card Number"
                                            wire:model="card_no">
                                        @error('card_no')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Expiry Month:</label>
                                        <input type="text" class="form-control" name="exp-month" placeholder="MM"
                                            wire:model="exp_month">
                                        @error('exp_month')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="">Expiry Year:</label>
                                        <input type="text" class="form-control" name="exp-year" placeholder="YYYY"
                                            wire:model="exp_year">
                                        @error('exp_year')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">CVC:</label>
                                        <input type="password" class="form-control" name="cvc" placeholder="..."
                                            wire:model="cvc">
                                        @error('cvc')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <hr>
                                
                             @endif
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                        id="exampleRadios2" value="paypal" wire:model="paymentmethod">
                                    <label class="form-check-label" for="exampleRadios2">
                                        Paypal
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios"
                                        id="exampleRadios2" value="esewa" wire:model="paymentmethod">
                                    <label class="form-check-label" for="exampleRadios2">
                                        E-sewa
                                    </label>
                                </div>
                            </div>
                            @error('paymentmethod')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror

                        </div>




                        <div class="col-md-6">
                            <div class="text-right">
                                <p class="checkout-head">Shipping Method</p>
                                <hr>
                                <p class="order-total"><span style="font-weight: bold;">Express Delivery (2-3 Days)
                                    </span></p>

                                @if (Session::has('checkout'));

                                @endif
                                <p class="order-total">Grand Total: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
                                        style="font-weight: bold;">$ {{ Session::get('checkout')['total'] }}</span>
                                </p>

                                @if($errors->isEmpty())
                            <div wire:ignore id="processing" style="font-size: 18px; margin-top:20px;color:#F31713;display:none;">
                                <i class="fa fa-spinner fa-pulse fa-fw"></i>
                                <span>Processing....</span>
                            </div>
                            @endif
                            </div>
                            <hr>
                            {{-- @if ($paymentmethod = 'esewa')
                            <form action="https://uat.esewa.com.np/epay/main" method="POST">
                                <input value="100" name="tAmt" type="hidden">
                                <input value="90" name="amt" type="hidden">
                                <input value="5" name="txAmt" type="hidden">
                                <input value="2" name="psc" type="hidden">
                                <input value="3" name="pdc" type="hidden">
                                <input value="EPAYTEST" name="scd" type="hidden">
                                <input value="ee2c3ca1-696b-4cc5-a6be-2c40d929d453" name="pid" type="hidden">
                                <input value="http://merchant.com.np/page/esewa_payment_success?q=su" type="hidden" name="su">
                                <input value="http://merchant.com.np/page/esewa_payment_failed?q=fu" type="hidden" name="fu">
                                <input value="Submit" type="submit">
                                </form> 
                            @else --}}
                            <button type="submit" class="btn btn-success" style="float: right">Place Order Now</button> 
                            {{-- @endif --}}
                        </div>
                    </div>

            </form>
        </div>

    </div>


    </div>
</main>

