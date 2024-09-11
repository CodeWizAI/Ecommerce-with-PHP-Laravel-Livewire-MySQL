<main>
    <div class="container">
        <div class="menu-info">
            <a href="{{ route('home') }}">Home</a><span class="color-custom2"> / </span><a href="#">Category</a><span
                class="color-custom2"> / </span><a
                href="{{ route('product.category', ['category_slug' => $category_slug]) }}">{{ $category_name }}</a>
        </div>
    </div>
    <div class="container">
        <div class="display-section">
            <h2>Category Name : <b>{{ $category_name }}</b></h2>
            <div class="row">
                @php
                    $wishitems = Cart::instance('wishlist')
                        ->content()
                        ->pluck('id');
                @endphp
                @php
                $cartitems = Cart::instance('cart')
                    ->content()
                    ->pluck('id');
                @endphp


                @foreach ($category->products as $product)
                    <div class="col-md-2 col-6 product-section">
                        <a href="{{ route('product.details', ['slug' => $product->slug]) }}"><img
                                class="product-image" src="{{ asset('images/products') }}/{{ $product->image }}"
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
            <hr>
            {{-- <div class="pagination d-flex justify-content-end">
                {{ $category->products->links() }}
            </div> --}}

        </div>
    </div>
</main>
