<div class="container-fluid">
    <div class="top-menu logo-info">
        <div class="row">
            <div
                class=" d-flex align-items-center justify-content-center col-md-2 col-sm-2 col-5 order-md-1 order-sm-1">
                <div class="logo left-section ">
                    <a href=""><img src="{{ asset('images/logo.png') }}" alt="company logo"></a>
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-7 d-flex align-items-center order-md-3 order-sm-3">
                <div class="right-section">
                    <div class="wish-cart">
                        @livewire('wish-count-component')
                        @livewire('cart-count-component')
                    </div>
                </div>
            </div>
            <div
                class="col-md-7 col-sm-7 col-12 d-flex align-items-center justify-content-center order-md-2 order-sm-2">
                <div class="center-section search-bar">
                    @livewire('header-search-component')
                </div>
            </div>
        </div>
    </div>
</div>