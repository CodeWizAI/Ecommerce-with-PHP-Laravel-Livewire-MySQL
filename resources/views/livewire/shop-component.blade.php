<main>
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
    <div class="container">
        <div class="menu-info">
            <a href="{{ route('home') }}">Home</a> / <a href="{{ route('shop') }}">Shop</a>
        </div>
    </div>

    <div class="container">

        <div class="category-show-section">
            <div class="row">
                <div class="col-md-4 col-12 order-md-1  order-2 ">
                    {{-- <div class="category-section">
                        <div class="category">
                            <div class="cat-head d-flex align-items-center">
                                Categories&nbsp;&nbsp;&nbsp;<i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="category-full">
                                <div class="row no-gutters">
                                    @foreach ($categories as $category)
                                        <div class="col-md-12">
                                            <div class="cat-name pl-2">
                                                <a class=""
                                                    href="
                                                    {{ route('product.category', ['category_slug' => $category->slug]) }}">{{ $category->name }}</a>
                                            </div>
                                        </div>
                                        <ul class="list-unstyled">
                                            @foreach ($category->subCategories as $subCategory)

                                                <li class="form-check">
                                                    <input class="form-check-input"
                                                        id="category_{{ $subCategory->id }}" type="checkbox"
                                                        value="{{ $subCategory->id }}" wire:model="category_checked">
                                                    <label class="form-check-label"
                                                        for="category_{{ $subCategory->id }}">
                                                        {{ $subCategory->name }}
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="category-display card rounded border-0 shadow-sm position-relative">
                        <div class="card-body p-3">
                            <div class="d-flex align-items-center mb-2 pb-2 border-bottom">
                                <div class="ms-3">
                                    <h4 class="text-uppercase fw-weight-bold mb-0 text-black"><b>Categories</b></h4>
                                </div>
                            </div>
                            @foreach ($categories as $category)

                                <div class="form-check mb-2">
                                    <a style="text-decoration: none;font-size:17px;text-transform:capitalize;font-weight:900;"
                                        class="color-custom1"
                                        href="{{ route('product.category', ['category_slug' => $category->slug]) }}">{{ $category->name }}</a>
                                    {{-- <input class="form-check-input" id="flexCheck1" type="checkbox">
                                <label class="form-check-label" for="flexCheck1"><span class="fst-italic pl-1">{{ $category->name }}</span></label> --}}
                                    <div class="row">
                                        @foreach ($category->subCategories as $subCategory)
                                            <div class="col-md-6">
                                                <li class="form-check">
                                                    <input class="form-check-input color-custom2"
                                                        style="cursor: pointer;" id="category_{{ $subCategory->id }}"
                                                        type="checkbox" value="{{ $subCategory->id }}"
                                                        wire:model="category_checked">
                                                    <label class="form-check-label color-custom2"
                                                        style="cursor: pointer; text-decoration: none;font-size:14px;font-weight:700;text-transform:capitalize"
                                                        for="category_{{ $subCategory->id }}">
                                                        {{ $subCategory->name }}
                                                    </label>
                                                </li>

                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="mt-5">
                        <h4>POPULAR PRODUCTS</h4>

                        <hr>
                        @foreach ($popular_products as $product)
                            <div class="row no-gutters popular-product">
                                <div class="col-md-4 col-4">
                                    <a href="{{ route('product.details', ['slug' => $product->slug]) }}"><img
                                            class="popular-product-image p-1"
                                            src="{{ asset('images/products') }}/{{ $product->image }}" width="100"
                                            alt="{{ $product->name }}">
                                    </a>
                                </div>
                                <div class="col-md-8 col-8 d-flex align-items-center">
                                    <div class="product-info ml-3">
                                        <div class="product-name">
                                            <a href="{{ route('product.details', ['slug' => $product->slug]) }}">
                                                {{ $product->name }}
                                            </a>
                                        </div>
                                        <div class="product-price">
                                            $ {{ number_format($product->regular_price, 0) }}
                                        </div>
                                        <div class="add-to-cart">
                                            @if ($wishitems->contains($product->id))
                                                <button class="added-wish-btn float-left" type="button">
                                                    <a href="javascript:void(0)"
                                                        wire:click.prevent="removeWish({{ $product->id }})"><i
                                                            class="far fa-heart"></i></a>
                                                </button>
                                            @else
                                                <button class="wish-btn float-left" type="button">
                                                    <a href="javascript:void(0)"
                                                        wire:click.prevent="addToWishlist({{ $product->id }},'{{ $product->name }}',{{ $product->regular_price }})"><i
                                                            class="far fa-heart"></i></a>
                                                </button>
                                            @endif
                                            @if ($cartitems->contains($product->id))
                                                <a type="button" class="added-cart-btn"
                                                    href="{{ route('product.cart') }}">Go
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
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-8 col-12 order-md-2 order-1 p-0">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="display-section all-md-section">
                                All Products
                            </div>
                            <div class="display-section all-sm-section">
                                <h2>all <b>Products</b></h2>
                            </div>
                        </div>
                        <div class="row">

                            <div class="product-per-page col-md-6 col-6 mt-2 mb-0">
                                <p class="ppp float-left">Products Per Page<br>
                                    <select name="post-per-page" class="use-chosen" wire:model="pagesize">
                                        <option value="12" selected="selected">12 per page</option>
                                        <option value="16">16 per page</option>
                                        <option value="20">18 per page</option>
                                        <option value="24">24 per page</option>
                                        <option value="32">32 per page</option>
                                    </select>
                                </p>
                            </div>
                            <div class="mobile-category-filter col-md-6 col-6 mt-2 mb-0">
                                <p class="ppp float-left">Filter By Category<br>
                                    <select name="category" class="use-chosen" wire:model="category_selected">
                                        <option value="" selected="selected">Choose Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </p>
                            </div>
                            <div class="col-md-6 col-6 mt-2 mb-0">
                                <p class="ppp float-right">Sorting Type<br>
                                    <select name="orderby" class="use-chosen float-right" wire:model="sorting">
                                        <option value="default" selected="selected">Default sorting</option>
                                        <option value="date">Newness</option>
                                        <option value="price">Price: low to high</option>
                                        <option value="price-desc">Price: high to low</option>
                                    </select>
                                </p>
                            </div>
                            <div class="col-md-12">
                                <p class="pp d-flex justify-content-center"><b>Price Range : <span
                                            class="color-custom2"> Rs. {{ $minimum_price }} -
                                            Rs. {{ $maximum_price }}</span></b></p>
                                <div id="price-filter" class="price-slider" wire:ignore
                                    style="color: #33304f; !important">
                                </div>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            @if ($products->count() > 0)
                                @foreach ($products as $product)
                                    <div class="col-md-3 col-6 product-section">
                                        <a href="{{ route('product.details', ['slug' => $product->slug]) }}"><img
                                                class="product-image"
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
                                                <a type="button" class="added-cart-btn"
                                                    href="{{ route('product.cart') }}">Go
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
                            @else
                                <div class="col-md-12">
                                    <div class="text-center" style="padding:10px 0; text-transform:capitalize;">
                                        <h4>No Products Found</h4>
                                        <a href="{{ route('shop') }}" class="btn btn-custom2">Go To Shop</a>
                                    </div>
                                </div>


                            @endif
                        </div>
                        <hr class="p-0">
                        <div class="pagination  justify-content-end p-0  ">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="container">
        <div class="row">
            <div class="display-section">
                <h2>featured <b>Products</b></h2>
                <div class="row">
                    @foreach ($featured_products as $product)
                        <div class="col-md-2 col-6 featured product-section">
                            <a href="{{ route('product.details', ['slug' => $product->slug]) }}"><img
                                    class="product-image"
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
    </div>
</main>

@push('scripts')
    <script>
        var filter = document.getElementById('price-filter');
        noUiSlider.create(filter, {
            start: [1, 1000],
            connect: true,
            range: {
                'min': 1,
                'max': 1000
            },
        });
        filter.noUiSlider.on('update', function(value) {
            @this.set('minimum_price', value[0]);
            @this.set('maximum_price', value[1])
        });
        $("#accordion").on("hide.bs.collapse show.bs.collapse", e => {
            $(e.target)
                .prev()
                .find("i:last-child")
                .toggleClass("fa-minus fa-plus");
        });
    </script>
@endpush
