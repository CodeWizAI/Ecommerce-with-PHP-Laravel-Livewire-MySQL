<div class="wrapper">

    <nav id="sidebar">
        <div class="sidebar-header d-flex align-items-center justify-content-center">
            <img src="{{ asset('images/logo.png') }}" alt="company logo" width="100">
        </div>
        <div class="d-flex align-items-center justify-content-center"  style="border-bottom: 1px solid #fff;">
            <h5><b>Admin Dashboard</b></h5>
        </div>

        <ul class="lisst-unstyled components">
            <li>
                <a href="{{ route('admin.dashboard') }}"><span><i class="fas fa-tachometer-alt"></i></span>
                    &nbsp;Dashboard
                </a>
            </li>
            <li class="active">
                <a href="{{ route('admin.orders') }}"><span><i class="fas fa-align-left"></i></span> &nbsp;Orders</a>
            </li>
            <li>
                <a href="{{ route('admin.sliders') }}"><span><i class="fas fa-image"></i></span> &nbsp;Sliders</a>
            </li>
            <li>
                <a href="{{ route('admin.categories') }}"><span><i class="fas fa-layer-group"></i></span>
                    &nbsp;Categories</a>
            </li>
            <li>
                <a href="{{ route('admin.products') }}"><i class="fab fa-product-hunt"></i></span> &nbsp;Products</a>
            </li>
            <li>
                <a href="{{ route('admin.sale') }}"><span><i class="fas fa-toggle-on"></i></span> &nbsp;Sale</a>
            </li>
            <li>
                <a href="{{ route('admin.featuredproducts') }}"><span><i class="fas fa-clipboard-list"></i></span> &nbsp;Featured Products</a>
            </li>
            <li>
                <a href="{{ route('admin.coupons') }}"><span><i class="fas fa-tag"></i></span> &nbsp;Coupons</a>
            </li>
            <li>
                <a href=""><span><i class="far fa-address-card"> </i></span> &nbsp; My
                    Details</a>
            </li>

            <li style="border-top: 1px solid #fff;"><a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span><i
                            class="fas fa-sign-out-alt"></i></span> &nbsp;logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
    <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light nav-toggle">
            <button type="button" id="sidebarCollapse" class="btn toggle-btn">
                <i class="fas fa-bars"></i>
            </button>
        </nav>
        <br>
        <div id="main">
            <div class="card">
                <div class="card-header head-info">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Order Details</h4>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('admin.orders') }}"
                                class="btn float-right btn-custom1 text-custom">Orders List</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (Session::has('message'))
                        <div class="alert alert-success" role="alert"><a href="#" class="close"
                                data-dismiss="alert" aria-label="close">&times;</a>{{ Session::get('message') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table id="table" class="table table-striped">
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
                    <div class="container" style="padding:10px 0;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card none">
                                    <div class="card-header">
                                        Ordered Items
                                    </div>
                                        <div class="card-body">
                                            <div class="cart-product">
                                                <ul>
                                                    @foreach ($order->orderItems as $item)
                                                        <li>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="row product-info-section">
                                                                        <div
                                                                            class="col-md-4 col-12 d-flex
                                                            align-items-center">
                                                                            <div class="product-image">
                                                                                <img src="{{ asset('images/products') }}/{{ $item->product->image }}"
                                                                                    alt="{{ $item->product->name }}"
                                                                                    class="w-100">
                                                                            </div>
                                                                        </div>
                                                                        <div
                                                                            class="col-md-8 col-12 d-flex
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
                                                                        <div
                                                                            class="col-md-4 col-4 d-flex align-items-center justify-content-center">
                                                                            <h5 class="price">$
                                                                                {{ $item->price }}</h5>


                                                                        </div>

                                                                        <div
                                                                            class="col-md-4 col-4 d-flex align-items-center justify-content-center">

                                                                            <div
                                                                                class="quantity d-flex align-items-center justify-content-center">
                                                                                <h5> {{ $item->quantity }}</h5>

                                                                            </div>
                                                                        </div>

                                                                        <div
                                                                            class="col-md-4 col-4 d-flex align-items-center justify-content-center">
                                                                            <div
                                                                                class="quantity d-flex align-items-center justify-content-center">
                                                                                <h5>$
                                                                                    {{ $item->quantity * $item->price }}
                                                                                </h5>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="order-summary">
                                                <p class="order-head">Order Summary</p>
                                                <hr>
                                                <p class="order-total">Subtotal: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
                                                        style="font-weight: bold;">$
                                                        {{ number_format($order->subtotal, 2) }}</span></p>
                                                <p class="order-total">Tax ({{ config('cart.tax') }}) %:
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-weight: bold;">$
                                                        {{ $order->tax }}
                                                    </span></p>
                                                <p class="order-total">Shipping: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
                                                        style="font-weight: bold;"> Free Shipping</span></p>

                                                <p class="order-total">Total: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
                                                        style="font-weight: bold;">$
                                                        {{ number_format($order->total, 2) }}</span></p>
                                            </div>
                                            <hr>
                                        </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container" style="padding:10px 0;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card none">
                                    <div class="card-header">
                                        Billing Details
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-striped" id="myTable">

                                            <tr>
                                                <th>First Name :</th>
                                                <td>{{ $order->firstname }}</td>
                                                <th>Last Name :</th>
                                                <td>{{ $order->lastname }}</td>
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
                    @if ($order->is_shipping_different == 1)
                        <div class="container" style="padding:10px 0;">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card none">
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
                    @endif
                    <div class="container" style="padding:10px 0;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card none">
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
                </div>
            </div>
        </div>
    </div>
</div>
