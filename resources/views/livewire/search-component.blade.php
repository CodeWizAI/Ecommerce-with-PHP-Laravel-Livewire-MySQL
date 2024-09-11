<main>
    <div class="container">
        <div class="menu-info">
            <a href="{{ route('home') }}">Home</a> / <a href="#">Search</a>
        </div>
    </div>
    <div class="container">
        <div class="display-section">
            <h2>Search Result For : <b>{{ $search }}</b></h2>
        </div>
        @php
            $wishitems = Cart::instance('wishlist')
                ->content()
                ->pluck('id');
        @endphp
        @if ($products->count() > 0)
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-3  product-section">
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

                            <button class="cart-btn" type="button">
                                <a href="#"
                                    wire:click.prevent="store({{ $product->id }},'{{ $product->name }}',{{ $product->regular_price }})">Add
                                    To Cart</a>
                            </button>


                        </div>

                    </div>
                @endforeach
            </div>
            <hr>
            <div class="pagination d-flex justify-content-end">
                {{ $products->links() }}
            </div>


        @else
            <div class="text-center" style="padding:10px 0; text-transform:capitalize;">
                <h4>No Products Found For Your search</h4>
                <p>Add Items In your Cart</p>
                <a href="{{ route('shop') }}" class="btn btn-custom2">Go To Shop</a>
            </div>
        @endif
    </div>
</main>
