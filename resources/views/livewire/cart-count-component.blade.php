<div class="cart">
    <a href="{{route('product.cart')}}"><span><i
    class="fas fa-shopping-cart cart-icon"></i></span>
    @if (Cart::instance('cart')->count() > 0)
        <span class="badge number-wishcart badge-pill rounded">{{ Cart::instance('cart')->count() }} items</span>
    @else
        <span class="badge empty-wishcart badge-pill rounded">{{ Cart::instance('cart')->count() }} items</span>
    @endif
    

<br>Cart</a>
</div>