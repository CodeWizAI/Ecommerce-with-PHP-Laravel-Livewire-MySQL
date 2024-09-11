<main>
    @livewire('sliders-component')
    {{-- on sale section --}}
    @if ($onsale_products->count() > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
        <div class="container">
            <div class="onsale-section display-section">
                <div class="row">
                    <div class="col-md-6 sale-head col-12 d-flex justify-content-center">
                        <p>Products On Sale</p>
                    </div>
                    <div class="col-md-6 col-12 offer-time d-flex justify-content-center">
                        <p><i class="far fa-clock time-clock"></i> <span class="time-end" id="sale-expire"></span>
                        </p>
                    </div>
                </div>
                @php
                    $wishitems = Cart::instance('wishlist')
                        ->content()
                        ->pluck('id');
                    $cartitems = Cart::instance('cart')
                        ->content()
                        ->pluck('id');
                @endphp
                <div class="row">
                    @foreach ($onsale_products as $product)
                        <div class="col-md-2 col-6 product-section">

                            <a href="{{ route('product.details', ['slug' => $product->slug]) }}"><img
                                    class="product-image" src="{{ asset('images/products') }}/{{ $product->image }}"
                                    alt="{{ $product->name }}">
                                <button class="btn btn-sm btn-danger sale-btn">Sale</button>
                            </a>
                            <div class="product-info">
                                <div class="product-name d-flex justify-content-center">
                                    <a href="{{ route('product.details', ['slug' => $product->slug]) }}">
                                        {{ $product->name }}
                                    </a>

                                </div>
                                <div class="product-price  d-flex justify-content-center">
                                    <s>Rs. {{ number_format($product->regular_price, 0) }}</s> &nbsp;&nbsp; Rs.
                                    {{ number_format($product->sale_price, 0) }}
                                </div>

                            </div>
                            <div class="add-to-cart d-flex justify-content-center">
                                @if ($wishitems->contains($product->id))
                                    <button class="added-wish-btn" type="button">
                                        <a href="javascript:void(0)"
                                            wire:click.prevent="removeWish({{ $product->id }})"><i
                                                class="far fa-heart"></i></a>
                                    </button>

                                @else
                                    <button class="wish-btn" type="button">
                                        <a href="javascript:void(0)"
                                            wire:click.prevent="addToWishlist({{ $product->id }},'{{ $product->name }}',{{ $product->regular_price }})"><i
                                                class="far fa-heart"></i></a>
                                    </button>

                                @endif

                                
                                    @if ($cartitems->contains($product->id))
                                        <a type="button" class="added-cart-btn" href="{{ route('product.cart') }}">Go
                                            To Cart</a>
                                    @else
                                        <button class="cart-btn" type="button">
                                            <a href="#"
                                                wire:click.prevent="store({{ $product->id }},'{{ $product->name }}',{{ $product->regular_price }})">Add
                                                To Cart</a>
                                        </button>
                                    @endif
                                


                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <div class="container">
        <div class="display-section">
            <h2>ALL <b>Categories</b></h2>
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-md-3 col-6 category">
                        <div class="category-name d-flex align-items-center justify-content-center">
                            <a style="text-decoration: none; color:#fff;"
                                href="{{ route('product.category', ['category_slug' => $category->slug]) }}"
                                class="">{{ $category->name }}</a>
                        </div>
                        <a href="{{ route('product.category', ['category_slug' => $category->slug]) }}">
                            <img class="category-image"
                                src="{{ asset('images/categories') }}/{{ $category->image }}" alt=""></a>
                        {{-- <div class="category-btn">
                            <a href="{{ route('product.category', ['category_slug' => $category->slug]) }}"
                                class="btn btn category-btn">{{ $category->name }}</a>
                        </div> --}}

                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container">
        <div class="display-section">
            <h2>Latest <b>Products</b></h2>
        </div>
        @php
            $wishitems = Cart::instance('wishlist')
                ->content()
                ->pluck('id');
            $cartitems = Cart::instance('cart')
                ->content()
                ->pluck('id');
        @endphp

        <div class="row">
            @foreach ($latest_products as $product)
                <div class="col-md-2 col-6 product-section">
                    <a href="{{ route('product.details', ['slug' => $product->slug]) }}"><img class="product-image"
                            src="{{ asset('images/products') }}/{{ $product->image }}"
                            alt="{{ $product->name }}">
                    </a>
                    <div class="product-info">
                        <div class="product-name d-flex justify-content-center">
                            <a href="{{ route('product.details', ['slug' => $product->slug]) }}">
                                {{ $product->name }}
                            </a>

                        </div>
                        <div class="product-price  d-flex justify-content-center">
                            $ {{ number_format($product->regular_price, 0) }}
                        </div>

                    </div>
                    <div class="add-to-cart d-flex justify-content-center">
                        @if ($wishitems->contains($product->id))
                            <button class="added-wish-btn" type="button">
                                <a href="#" wire:click.prevent="removeWish({{ $product->id }})"><i
                                        class="far fa-heart"></i></a>
                            </button>

                        @else
                            <button class="wish-btn" type="button">
                                <a href="#"
                                    wire:click.prevent="addToWishlist({{ $product->id }},'{{ $product->name }}',{{ $product->regular_price }})"><i
                                        class="far fa-heart"></i></a>
                            </button>

                        @endif
                        @if ($cartitems->contains($product->id))
                            <a type="button" class="added-cart-btn" href="{{ route('product.cart') }}">Go
                                To Cart</a>
                        @else
                            <button class="cart-btn" type="button">
                                <a href="#"
                                    wire:click.prevent="store({{ $product->id }},'{{ $product->name }}',{{ $product->regular_price }})">Add
                                    To Cart</a>
                            </button>
                        @endif




                    </div>

                </div>
            @endforeach

        </div>
    </div>

    {{-- latest product section --}}
    {{-- <div class="container">
        <div class="product-section" data-aos="zoom-out-up">
            <h2>Latest <b>Products</b></h2>
            <div class="row">
                @php
                    $wishitems = Cart::instance('wishlist')
                        ->content()
                        ->pluck('id');
                @endphp
                @foreach ($latest_products as $product)
                    <div class="col-md-3 col-6 product-detail">
                        <div class="product">
                            <a href="{{ route('product.details', ['slug' => $product->slug]) }}"><img
                                    class="product-image"
                                    src="{{ asset('images/products') }}/{{ $product->image }}"
                                    alt="Card image cap"></a>
                            <div class="product-info">
                                <a href="{{ route('product.details', ['slug' => $product->slug]) }}"
                                    class="product-name">
                                    <h6><b>{{ $product->name }}</b></h6>
                                </a>
                                <p class="product-price"><b>$ {{ $product->regular_price }}</b></p>
                                <div class="">
                                    @if ($wishitems->contains($product->id))
                                        <a href="
                                    javascript:void(0)" class="btn added-wish btn-sm" style="float: left"
                                    wire:click.prevent="removeWish({{ $product->id }})"><i
                                        class="far fa-heart wish-icon"></i></a>

                                @else
                                    <a href="javascript:void(0)" class="btn add-wish btn-sm" style="float: left"
                                        wire:click.prevent="addToWishlist({{ $product->id }},'{{ $product->name }}',{{ $product->regular_price }})"><i
                                            class="far fa-heart wish-icon"></i></a>

                @endif

                <a href="#" class="btn add-cart btn-sm" style="float: right"
                    wire:click.prevent="store({{ $product->id }},'{{ $product->name }}',{{ $product->regular_price }})">Add
                    To Cart</a>
            </div>
        </div>
    </div>
    </div>
    @endforeach
    </div>
    </div>
    </div> --}}

    {{-- categories showing section --}}


    <div class="container-fluid">
        <div class="row">
            <div class="service-section">
                <div class="row">
                    <div class="col-md-4 col-12">
                        <div class="service">
                            <i class="fas fa-truck "></i>
                            <div class="service-name">
                                <b>FREE SHIPPING</b><br><small>Free On Order Over Rs. 1000</small>
                            </div>

                        </div>

                    </div>
                    <div class="col-md-4 col-12 ">
                        <div class="service">
                            <i class="far fa-credit-card "></i>
                            <div class="service-name">
                                <b>SAFE PAYMENT</b><br><small>Safe Your Online Payment</small>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4 col-12">
                        <div class="service">
                            <i class="fas fa-headset"></i>
                            <div class="service-name">
                                <b>ONLINE SUPPORT</b><br><small>We Offer You 24/7 Support</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- subscribe for newsletter section --}}
    <div class="container-fluid">
        <div class="subscribe">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="s-logo">
                        <i class="fas fa-paper-plane"></i>
                    </div>
                    <div class="s-title">Subscribe For Newsletter</div>
                </div>
                <div class="col-md-6 col-12 d-flex justify-content-center align-items-center">
                    <form action="" class="s-form">
                        <input type="text" name="email">
                        <button type="button" class="s-btn">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>


{{-- script for countdown on on sale products --}}
@push('scripts')
    <script>
        // $('.add-wish').on('click', function() {

        //             AOS.refreshHard();
        //         }
        //         $('.added-wish').on('click', function() {

        //                 AOS.refreshHard();
        //             }



        //get the date time from database
        window.data = {!! json_encode($sale->sale_date) !!};
        // Set the date we're counting down to
        var countDownDate = new Date(window.data).getTime();

        // Update the count down every 1 second
        var x = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            if (days < 10) {
                days = '0' + days;
            }
            if (hours < 10) {
                hours = '0' + hours;
            }
            if (minutes < 10) {
                minutes = '0' + minutes;
            }
            if (seconds < 10) {
                seconds = '0' + seconds;
            }

            // Output the result in an element with id="sale-expire"
            document.getElementById("sale-expire").innerHTML = days + " Days : " + hours + " Hours : " +
                minutes + " Minutes : " + seconds + " Seconds";
        }, 1000);
    </script>

@endpush
