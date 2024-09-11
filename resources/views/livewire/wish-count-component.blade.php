<div class="wish"><a href="{{route('product.wishlist')}}"><span><i class="fas fa-heart wish-icon"></i></span>
    @if (Cart::instance('wishlist')->count() > 0)
    <span class="badge number-wishcart badge-pill rounded">{{ Cart::instance('wishlist')->count() }} items</span>
    
    @else
    <span class="badge empty-wishcart badge-pill rounded">{{ Cart::instance('wishlist')->count() }} items</span>
    @endif
    
    <br>Wishlist</a>
</div>