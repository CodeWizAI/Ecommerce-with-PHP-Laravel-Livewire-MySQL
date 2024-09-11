<main>
    <div class="container">
        <div class="menu-info">
            <a href="{{ route('home') }}">Home</a><span class="color-custom2"> / </span><a href="{{ route('product.wishlist') }}">My Wishlist</a>
        </div>
    </div>
    <div class="container">
        <div class="display-section">
            <h2>My <b>Wishlist</b></h2>
            @if (Cart::instance('wishlist')->content()->count() > 0)
            <div class="row">
               
                    @foreach (Cart::instance('wishlist')->content() as $product)
                    <div class="col-md-2 col-6 product-section">
                        <a href="{{ route('product.details', ['slug' => $product->model->slug]) }}"><img class="product-image"
                                src="{{ asset('images/products') }}/{{ $product->model->image }}"
                                alt="{{ $product->model->name }}">
                        </a>
                        <div class="product-info">
                            <div class="product-name d-flex justify-content-center">
                                <a href="{{ route('product.details', ['slug' => $product->model->slug]) }}">
                                    {{ $product->model->name }}
                                </a>
    
                            </div>
                            <div class="product-price  d-flex justify-content-center">
                                $ {{ number_format($product->model->regular_price,0) }}
                            </div>
    
                        </div>
                        <div class="add-to-cart d-flex justify-content-center">
                                <button class="added-wish-btn" type="button">
                                    <a href="javascript:void(0)" wire:click.prevent="removeWish({{ $product->model->id }})"><i
                                            class="far fa-heart"></i></a>
                                </button>
    
                            <button class="cart-btn" type="button">
                                <a href="#"
                                wire:click.prevent="moveWishToCart('{{ $product->rowId }}')">Move
                                    To Cart</a>
                            </button>
    
    
                        </div>
    
                    </div>
                    @endforeach
               
            </div>
            @else
            <div class="text-center" style="padding:10px 0; text-transform:capitalize;">
                <h4>Your wishlist Is Empty</h4>
                <p>Add Items In your wishlist</p>
                <a href="{{route('shop')}}" class="btn btn-custom2">Go To Shop</a>
           </div>
        @endif
        </div>
    </div>
    
</main>
