<div class="container" style="padding:30px 0;">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            Order Details
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('user.orders') }}" class="btn btn-success float-right">My Orders
                                List</a>
                            @if ($order->status == 'delivered')
                                <a href="#" wire:click.prevent="cancelOrder" class="btn btn-warning pull-right">Cancel
                                    Order</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (Session::has('order_message'))
                        <div class="alert alert-success" role="alert">{{ Session::get('order_message') }}</div>
                    @endif
                    <table class="table table-striped" id="myTable">
                        <tr>
                            <th>Order ID :</th>
                            <td>{{ $order->id }}</td>
                            <th>Order Date :</th>
                            <td>{{ $order->created_at }}</td>
                            <th>Order Status :</th>
                            @if ($order->status == 'delivered')
                                <td class="text-success"><b>{{ $order->status }}</b></td>
                            @elseif($order->status == 'canceled')
                                <td class="text-danger"><b>{{ $order->status }}</b></td>
                            @else
                                <td class="text-warning"><b>{{ $order->status }}</b></td>

                            @endif
                            @if ($order->status == 'delivered')
                                <th>Delivered Date :</th>
                                <td>{{ $order->delivered_date }}</td>
                            @elseif($order->status == 'canceled')
                                <th>Canceled Date :</th>
                                <td>{{ $order->cancelled_date }}</td>
                            @endif
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container" style="padding:30px 0;">
    <div class="row">
        <div class="col-md-12">
            <span>Your rating</span>
            <p class="stars" data-toggle="rating">
                
                <label for="rated-1"></label>
                <input type="radio" id="rated-1" name="rating" value="1">
                <label for="rated-2"></label>
                <input type="radio" id="rated-2" name="rating" value="2">
                <label for="rated-3"></label>
                <input type="radio" id="rated-3" name="rating" value="3">
                <label for="rated-4"></label>
                <input type="radio" id="rated-4" name="rating" value="4">
                <label for="rated-5"></label>
                <input type="radio" id="rated-5" name="rating" value="5" checked="checked">
            </p>
            <div class="card">
                <div class="card-header">


                    Ordered Items


                </div>
                <div class="card-body">


                    <div class="table-responsive">
                        <table id="table" class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col" class="nowrap">Order ID</th>
                                    <th scope="col" class="nowrap">Image</th>
                                    <th scope="col" class="nowrap">Product Name</th>
                                    <th scope="col" class="nowrap">Price</th>
                                    <th scope="col" class="nowrap">Quantity</th>
                                    <th scope="col" class="nowrap">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->orderItems as $item)
                                    <tr>
                                        <td class="nowrap">{{ $item->id }}</td>
                                        <td class="nowrap"><img src="{{ asset('images/products') }}/{{ $item->product->image }}"
                                            alt="{{ $item->product->name }}" width="60"></td>
                                        <td class="nowrap">{{ $item->product->name }}</td>
                                        <td class="nowrap">$  {{ $item->price }}</td>
                                        <td class="nowrap">{{ $item->quantity }}</td>
                                        <td class="nowrap"> $ {{ $item->quantity * $item->price }}</td>  
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>






                   {{--  <div class="cart-product">
                        <ul>
                            @foreach ($order->orderItems as $item)

                                <li>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row product-info-section">
                                                <div class="col-md-4 col-12 d-flex
                                        align-items-center">
                                                    <div class="product-image">
                                                        <img src="{{ asset('images/products') }}/{{ $item->product->image }}"
                                                            alt="{{ $item->product->name }}" class="w-100">
                                                    </div>
                                                </div>
                                                <div class="col-md-8 col-12 d-flex
                                        align-items-center justify-content-center">
                                                    <div class="product-name">
                                                        <a
                                                            href="{{ route('product.details', ['slug' => $item->product->slug]) }}">{{ $item->product->name }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row price-section">
                                                <div class="col-md-3 col-4 d-flex align-items-center justify-content-center">
                                                    <h5 class="price">$ {{ $item->price }}</h5>
                                                </div>

                                                <div class="col-md-3 col-4 d-flex align-items-center justify-content-center">                                                    
                                                        <h5> {{ $item->quantity }}</h5>  
                                                </div>

                                                <div class="col-md-3 col-4 d-flex align-items-center justify-content-center">
                                                        <h5>$ {{ $item->quantity * $item->price }}</h5>
                                                    </div>
                     
                                                <div class="col-md-3 col-4 d-flex align-items-center justify-content-center">
                                                    @if ($order->status == 'delivered' && $item->review_status == false)
                                                        <a href="#" class="btn btn-success">Write Review</a>
                                                    @endif
                                                </div>


                                            </div>


                                        </div>
                                    </div>


                                </li>

                            @endforeach


                        </ul>
                    </div> --}}



                    <div class="order-summary">
                        <p class="order-head">Order Summary</p>
                        <hr>
                        <p class="order-total">Subtotal: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
                                style="font-weight: bold;">$
                                {{ number_format($order->subtotal, 2) }}</span></p>
                        <p class="order-total">Tax ({{ config('cart.tax') }}) %:
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-weight: bold;">$ {{ $order->tax }}
                            </span></p>
                        <p class="order-total">Shipping: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-weight: bold;">
                                Free Shipping</span></p>

                        <p class="order-total">Total: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-weight: bold;">$
                                {{ number_format($order->total, 2) }}</span></p>


                    </div>


                    <hr>

                </div>
            </div>


        </div>
    </div>

</div>
<div class="container" style="padding:30px 0;">




    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Billing Details
                </div>
                <div class="card-body">
                    <table class="table table-striped " id="myTable">

                        <tr>
                            <th>Full Name :</th>
                            <td>{{ $order->fullname }}</td>
                        </tr>
                        <tr>
                            <th>Phone :</th>
                            <td>{{ $order->mobile }}</td>
                            <th>Email :</th>
                            <td>{{ $order->email }}</td>
                        </tr>

                        <tr>
                            <th>Country :</th>
                            <td>{{ $order->country }}</td>
                            <th>Province :</th>
                            <td>{{ $order->province }}</td>
                        </tr>
                        <tr>
                            <th>Zip/Postal Code :</th>
                            <td>{{ $order->zipcode }}</td>
                            <th>City :</th>
                            <td>{{ $order->city }}</td>
                        </tr>
                        <tr>
                            <th>Address Line 1 :</th>
                            <td>{{ $order->address1 }}</td>
                            <th>Adsress Line 2 :</th>
                            <td>{{ $order->address2 }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
{{-- @if ($order->is_shipping_different == 1)
    <div class="container" style="padding:30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Shipping Details
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="myTable">

                            <tr>
                                <th>First Name :</th>
                                <td>{{ $order->shipping->firstname }}</td>
                                <th>Last Name :</th>
                                <td>{{ $order->shipping->lastname }}</td>
                            </tr>
                            <tr>
                                <th>Phone :</th>
                                <td>{{ $order->shipping->mobile }}</td>
                                <th>Email :</th>
                                <td>{{ $order->shipping->email }}</td>
                            </tr>

                            <tr>
                                <th>Country :</th>
                                <td>{{ $order->shipping->country }}</td>
                                <th>Province :</th>
                                <td>{{ $order->shipping->province }}</td>
                            </tr>
                            <tr>
                                <th>Zip/Postal Code :</th>
                                <td>{{ $order->shipping->zipcode }}</td>
                                <th>City :</th>
                                <td>{{ $order->shipping->city }}</td>
                            </tr>
                            <tr>
                                <th>Address Line 1 :</th>
                                <td>{{ $order->shipping->address1 }}</td>
                                <th>Adsress Line 2 :</th>
                                <td>{{ $order->shipping->address2 }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif --}}

</div>
<div class="container" style="padding:30px 0;">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Transaction Details
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>Transaction Method :</th>
                            <td>{{ $order->transaction->mode }}</td>
                        </tr>
                        <tr>
                            <th>Status :</th>
                            <td>{{ $order->transaction->status }}</td>
                        </tr>
                        <tr>
                            <th>Transaction Date :</th>
                            <td>{{ $order->transaction->created_at }}</td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>

    </div>

</div>
