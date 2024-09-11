<main>
    <div class="container">
        <div class="product-full-detail">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="product-image">
                        <a href=""><img id="main-image" src="{{asset('images/products')}}/{{$product->image}}" alt="{{$product->name}}}"></a>
                    </div>
                
                    @if ($product->images > '')
                        
                    
                    @php
                       $images = explode(",",$product->images)   
                    @endphp
                    <div class="thumbnail text-center">
                        <img onclick="change_image(this)" src="{{asset('images/products')}}/{{$product->image}}" alt="{{$product->name}}}" style="padding: 5px;"></a>
                        @foreach ($images as $image)
                        @if ($image)
                         <img onclick="change_image(this)" src="{{asset('images/products')}}/{{$image}}" width="100" alt="rrr"  style="padding: 5px;">     
                        @endif 
                        @endforeach
                        
                    
                    </div>  
                    @endif
                </div>
                <div class="col-md-6 col-12">
                    <div class="product-info">
                        <p class="product-name">{{$product->name}}</p>

                        <p class="">
                        @foreach ($product->categories as $category)
                            {{ $category->name }}
                        @endforeach
                        </p>

                        @if ($product->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                        <p class="product-price"><s><b>$ {{ $product->regular_price }}</b></s><span style="margin-left:15px; color:#0f6eb8;"><b>$ {{$product->sale_price}}</b></span></p>
                        @else
                            <p class=""><b>$ {{$product->regular_price}}</b></p>
                        @endif
                        
                        <hr>
                        <p class="description-head">Description</p>
                        <p class="description"> {!! $product->description !!}
                        </p>
                        <hr>
                        <p class="quantity-head">Quantity</p>
                        <div class="quantity d-flex align-items-center justify-content-center">
                            <a href="" wire:click.prevent = ""><i class="fas fa-minus-circle minus-sign" style="float: left" wire:click.prevent="decreaseQuantity"></i></a>
                            <input type="text" name="product-quantity" value="" data-max="120" pattern="[0-9]" wire:model="quantity">
                            <a href=""><i class="fas fa-plus-circle plus-sign" style="float: left" wire:click.prevent="increaseQuantity"></i></a>   
                        </div>
                        </p>
                        <hr>
                        @if ($product->sale_price > 0 && $sale->status == 1 && $sale->sale_date > Carbon\Carbon::now())
                           <button type="button" class="btn add-btn"><a href="#"  wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->sale_price}})">Add To Cart</a></button>
                        @else
                           <button type="button" class="btn add-btn"><a href="#"  wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->regular_price}})">Add To Cart</a></button>
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="display-section">
            <h2>Related <b>Products</b></h2>
        </div>
        @php
            $wishitems = Cart::instance('wishlist')
                ->content()
                ->pluck('id');
        @endphp

        <div class="row">
            @foreach ($related_products as $product)
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

                        <button class="cart-btn" type="button">
                            <a href="#"
                                wire:click.prevent="store({{ $product->id }},'{{ $product->name }}',{{ $product->regular_price }})">Add
                                To Cart</a>
                        </button>


                    </div>

                </div>
            @endforeach

        </div>
    </div>
</main>
@push('scripts')
<script>
    function change_image(image){

var container = document.getElementById("main-image");

container.src = image.src;

}



document.addEventListener("DOMContentLoaded", function(event) {







});
</script>

    
@endpush
