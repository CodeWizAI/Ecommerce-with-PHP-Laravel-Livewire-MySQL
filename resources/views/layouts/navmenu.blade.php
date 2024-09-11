@if (Route::has('login'))
    @auth
        @if (Auth::user()->utype === 'admin')
            <div class="container-fluid">
                <div class="row">
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                            data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="toggle-btn"><i class="fas fa-bars"></i></span>
                            <span class="close-btn"><i class="fas fa-arrow-up"></i></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarCollapse">
                            <ul class="nav navbar-nav">
                                <hr class="border">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ route('admin.categories') }}">Categories</a>
                                </li>
                                <hr class="border">
                                <li class="nav-item active">
                                    <a title="Products" class="nav-link"
                                        href="{{ route('admin.products') }}">Products</a>
                                </li>
                                <hr class="border">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ route('admin.sliders') }}">Sliders</a>
                                </li>
                                <hr class="border">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ route('admin.sale') }}">Manage Sale</a>
                                </li>
                                <hr class="border">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ route('admin.coupons') }}">Coupons</a>
                                </li>
                                <hr class="border">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ route('admin.orders') }}">Orders</a>
                                </li>
                                <hr class="border">
                                <li class="nav-item active">
                                    <a class="nav-link" href="/faq">FAQ</a>
                                </li>
                                <hr class="border">
                                <li class="nav-item active">
                                    <a class="nav-link" href="/cart">My Cart</a>
                                </li>
                                <hr class="border">
                            </ul>
                        </div>
                        <ul class="navbar-nav" style="display: inline-block">
                            <li class="nav-item dropdown active">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span><i class="far fa-user"></i></span> &nbsp;{{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#"><span><i class="far fa-address-card"></i></span>
                                        &nbsp;My Details</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span><i
                                                class="fas fa-sign-out-alt"></i></span> &nbsp;logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

        @else
            <div class="container-fluid">
                <div class="row">

                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                            data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="toggle-btn"><i class="fas fa-bars"></i></span>
                            <span class="close-btn"><i class="fas fa-arrow-up"></i></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarCollapse">
                            <ul class="nav navbar-nav">
                                <hr class="border">
                                <li class="nav-item active">
                                    <a class="nav-link" href="/">Home</a>
                                </li>
                                <hr class="border">
                                <li class="nav-item dropdown active">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Categories
                                    </a>
                                    @livewire('categories-list-component')
    
                                </li>
                                <hr class="border">
                                <li class="nav-item active">
                                    <a class="nav-link" href="/shop">Shop</a>
                                </li>
                                <hr class="border">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#">Offers</a>
                                </li>
                                <hr class="border">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ route('user.orders') }}">My Orders</a>
                                </li>
                                <hr class="border">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#">Blog</a>
                                </li>
                                <hr class="border">
                                <li class="nav-item active">
                                    <a class="nav-link" href="/faq">FAQ</a>
                                </li>
                                <hr class="border">
                                <li class="nav-item active">
                                    <a class="nav-link" href="/cart">My Cart</a>
                                </li>
                                <hr class="border">
                            </ul>
                        </div>
                        <ul class="navbar-nav" style="display:inline-block;">
                            <li class="nav-item dropdown active">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span><i class="far fa-user"></i></span>
                                    &nbsp;{{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right animate slideIn"
                                    aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#"><span><i class="far fa-address-card"></i></span>
                                        &nbsp;My Details</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span><i
                                                class="fas fa-sign-out-alt"></i></span> &nbsp;logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>


        @endif


    @else
        <div class="container-fluid">
            <div class="row">
                <nav class="navbar navbar-expand-lg">
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                        data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="toggle-btn"><i class="fas fa-bars"></i></span>
                        <span class="close-btn"><i class="fas fa-arrow-up"></i></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="nav navbar-nav">
                            <hr class="border">
                            <li class="nav-item active">
                                <a class="nav-link" href="/">Home</a>
                            </li>
                            <hr class="border">
                            <li class="nav-item dropdown active">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Categories
                                </a>
                                @livewire('categories-list-component')

                            </li>
                            <hr class="border">
                            <li class="nav-item active">
                                <a class="nav-link" href="/shop">Shop</a>
                            </li>
                            <hr class="border">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Offers</a>
                            </li>
                            <hr class="border">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Featured Brands</a>
                            </li>
                            <hr class="border">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Blog</a>
                            </li>
                            <hr class="border">
                            <li class="nav-item active">
                                <a class="nav-link" href="/faq">FAQ</a>
                            </li>
                            <hr class="border">
                            <li class="nav-item active">
                                <a class="nav-link" href="/cart">My Cart</a>
                            </li>
                            <hr class="border">
                        </ul>


                    </div>
                    <ul class="navbar-nav login-register" style="display: inline-block">
                        <li class="nav-item active" style="display: inline-block">
                            <a class="nav-link" href="{{ route('register') }}"><span><i
                                        class="far fa-user"></i></span> &nbsp;Register</a>
                        </li>
                        |
                        <li class="nav-item active" style="display: inline-block">
                            <a type="button" class="nav-link" href="{{ route('login') }}"><span><i
                                        class="fas fa-sign-in-alt"></i></span> &nbsp;Login</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>


    @endif

    @endif
