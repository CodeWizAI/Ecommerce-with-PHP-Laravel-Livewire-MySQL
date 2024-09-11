<main>
    <div class="container">
        <div class="menu-info">
            <a href="{{ route('home') }}">Home</a><span class="color-custom2"> / </span><a
                href="{{ route('product.cart') }}">My Cart</a>
        </div>
    </div>
    <div class="container">
        <div class="display-section">
            <h2>My <b>Cart</b></h2>
        </div>
        <div class="mycart">
            @if (Session::has('success_message'))
                                    <div class="alert alert-success" role="alert"><a href="#" class="close"
                                            data-dismiss="alert"
                                            aria-label="close">&times;</a>{{ Session::get('success_message') }}
                                    </div>
                                @endif
            @if (Cart::instance('cart')->count() > 0)
                <div class="mycart-head">
                    Product's Details
                </div>
                <div class="cart-product">
                    <ul>
                        @foreach (Cart::instance('cart')->content() as $product)
                            <li>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row product-info-section">
                                            <div
                                                class="col-md-4 col-12 d-flex
                                    align-items-center">
                                                <div class="product-image">
                                                    <img src="{{ asset('images/products') }}/{{ $product->model->image }}"
                                                        alt="{{ $product->model->name }}">
                                                </div>
                                            </div>
                                            <div
                                                class="col-md-8 col-12 d-flex
                                    align-items-center justify-content-center">
                                                <div class="product-name">
                                                    <a
                                                        href="{{ route('product.details', ['slug' => $product->model->slug]) }}">{{ $product->model->name }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row price-section">
                                            <div
                                                class="col-md-3 col-4 d-flex align-items-center justify-content-center">

                                                @if ($product->model->sale_price > 0)
                                                    <div class="price">${{ $product->model->sale_price }}
                                                    </div>
                                                @else
                                                    <div class="price">${{ $product->model->regular_price }}
                                                    </div>
                                                @endif

                                            </div>
                                            <div
                                                class="col-md-3 col-4 d-flex align-items-center justify-content-center">

                                                <div class="quantity d-flex align-items-center justify-content-center">
                                                    <a href=""
                                                        wire:click.prevent="decreaseQuantity('{{ $product->rowId }}')"><i
                                                            class="fas fa-minus-circle minus-sign"
                                                            style="float: left"></i></a>
                                                    <input type="text" name="product-quantity"
                                                        value="{{ $product->qty }}" data-max="120" pattern="[0-9]">
                                                    <a href=""
                                                        wire:click.prevent="increaseQuantity('{{ $product->rowId }}')"><i
                                                            class="fas fa-plus-circle plus-sign"
                                                            style="float: left"></i></a>
                                                </div>


                                            </div>
                                            <div
                                                class="col-md-3 col-4 d-flex align-items-center justify-content-center">
                                                <div class="total-price">$ {{ $product->subtotal }}</div>
                                            </div>
                                            <div
                                                class="col-md-3 col-12 d-flex align-items-center justify-content-center">
                                                <div class="save-for-later">
                                                    <button type="button" class="btn btn-primary"><a href="#"
                                                            wire:click.prevent="saveForLater('{{ $product->rowId }}')"><i
                                                                class="far fa-clock text-light"></i></a></button>
                                                </div>
                                                <div class="save-for-later-sm">
                                                    <button type="button" class="btn btn-primary"><a href="#"
                                                            class="text-light"
                                                            wire:click.prevent="saveForLater('{{ $product->rowId }}')">Save
                                                            For Later</a></button>
                                                </div>
                                                <div class="delete-from-cart">
                                                    <a href="#" type="button" class="btn btn-danger"
                                                        wire:click.prevent="destroy('{{ $product->rowId }}')"><i
                                                            class="fas fa-times"></i></a>
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
                    <div class="row">
                        @if (!Session::has('coupon'))
                            <div class="col-md-6">
                                <p class="coupon-head">Do You Have A Coupon Code?</p>
                                <hr>
                                @if (Session::has('coupon_message'))
                                    <div class="alert alert-danger" role="alert"><a href="#" class="close"
                                            data-dismiss="alert"
                                            aria-label="close">&times;</a>{{ Session::get('coupon_message') }}
                                    </div>
                                @endif
                                <form wire:submit.prevent="applyCoupon">
                                    <div class="form-group row">
                                        <label for="category-name" class="col-sm-4 col-form-label">Coupon Code</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" placeholder="enter your code here"
                                                wire:model="coupon_code">
                                            @error('coupon_code')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-danger float-right">Apply Coupon</button>
                                </form>
                                <br>

                            </div>
                        @else
                            <div class="col-md-6">
                                <p class="coupon-head">Coupon Status</p>
                                <hr>
                                <p>Your Coupon Has Been Applied Successfully.</p>
                            </div>
                        @endif
                        <div class="col-md-6">
                            <div class="">
                                <p class="order-head">Order Summary</p>
                                <hr>
                                <p class="order-total">Subtotal: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
                                        style="font-weight: bold;">$
                                        {{ Cart::instance('cart')->subtotal() }}</span></p>
                                @if (Session::has('coupon'))
                                    <p class="order-total">Discount ({{ Session::get('coupon')['coupon_code'] }}):
                                        <a href="#" wire:click.prevent="removeCoupon"><i
                                                class="fa fa-times text-danger"></i></a>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-weight: bold;">$
                                            {{ number_format($discount, 2) }}
                                        </span></p>
                                    <p class="order-total">Subtotal With Discount &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
                                            style="font-weight: bold;">$ {{ number_format($subtotalwithdiscount, 2) }}
                                        </span></p>
                                    <p class="order-total">Tax ({{ config('cart.tax') }}) %:
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
                                            style="font-weight: bold;">{{ number_format($taxafterdiscount, 2) }}
                                        </span></p>

                                    <p class="order-total">Total: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
                                            style="font-weight: bold;">$
                                            {{ number_format($totalafterdiscount, 2) }}</span></p>

                                @else
                                    <p class="order-total">Tax: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
                                            style="font-weight: bold;">$
                                            {{ number_format(Cart::instance('cart')->tax(), 2) }}</span></p>
                                    <hr>
                                    <p class="order-total"><span class="color-custom1">Total:
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="font-weight: bold;"
                                            class="color-custom2">$
                                            {{ number_format(Cart::instance('cart')->total(), 2) }}</span>
                                    </p>
                                @endif
                            </div>

                            <button type="button" class="btn btn-custom1"><a href="{{ route('shop') }}"
                                    class="text-light" style="text-decoration: none"><i
                                        class="fas fa-arrow-left"></i> Continue
                                    Shopping</a></button>
                            <button type="button" class="btn btn-custom2" style="float: right"
                                wire:click.prevent="checkout">Checkout</button>
                        </div>
                    </div>
                </div>
            @else
                <div class="text-center" style="padding:10px 0; text-transform:capitalize;">
                    <h4>Your Cart Is Empty</h4>
                    <p>Add Items In your Cart</p>
                    <a href="{{ route('shop') }}" class="btn btn-custom2">Go To Shop</a>
                </div>
            @endif
        </div>
    </div>
    @if (Cart::instance('saveforlater')->count() > 0)
        <div class="container">
            <div class="display-section">
                <h2>saved <b>for later</b></h2>
            </div>
            <div class="mycart">
                @if (Session::has('save_success_message'))
                    <div class="alert alert-success">
                        <strong>Success</strong> {{ Session::get('save_success_message') }}
                    </div>
                @endif
                <div class="mycart-head">
                    Products Name
                </div>
                <div class="cart-product">
                    <ul>
                        @foreach (Cart::instance('saveforlater')->content() as $product)
                            <li>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row product-info-section">
                                            <div
                                                class="col-md-4 col-12 d-flex
                                    align-items-center">
                                                <div class="product-image">
                                                    <img src="{{ asset('images/products') }}/{{ $product->model->image }}"
                                                        alt="{{ $product->model->name }}">
                                                </div>
                                            </div>
                                            <div
                                                class="col-md-8 col-12 d-flex
                                    align-items-center justify-content-center">
                                                <div class="product-name">
                                                    <a
                                                        href="{{ route('product.details', ['slug' => $product->model->slug]) }}">{{ $product->model->name }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row price-section">
                                            <div
                                                class="col-md-6 col-4 d-flex align-items-center justify-content-center">
                                                @if ($product->model->sale_price > 0)
                                                    <div class="price">${{ $product->model->sale_price }}
                                                    </div>
                                                @else
                                                    <div class="price">${{ $product->model->regular_price }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div
                                                class="col-md-6 col-12 d-flex align-items-center justify-content-center">
                                                <div class="move-option">
                                                    <button type="button" class="btn btn-custom2 text-light"><a href="#"
                                                            wire:click.prevent="moveToCart('{{ $product->rowId }}')"><i
                                                                class="fas fa-shopping-cart text-light"></i></a></button>
                                                </div>
                                                <div class="delete-from-cart-lg">
                                                    <a href="" type="button" class="btn btn-danger"
                                                        wire:click.prevent="deleteFromSave('{{ $product->rowId }}')"><i
                                                            class="fas fa-times"></i></a>
                                                </div>
                                                <div class="delete-from-cart-sm">
                                                    <button type="button" class="btn btn-danger"><a href="#"
                                                            wire:click.prevent="deleteFromSave('{{ $product->rowId }}')">Delete
                                                            From
                                                            cart</a>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif
</main>
