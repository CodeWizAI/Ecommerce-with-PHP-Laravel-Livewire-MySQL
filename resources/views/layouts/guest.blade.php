<!doctype html>
<html lang="en">

<head>
    <title>LensHub Nepal</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.css">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"
        integrity="sha512-aEe/ZxePawj0+G2R+AaIxgrQuKT68I28qh+wgLrcAJOz3rxCP+TwrK5SPN+E5I+1IQjNtcfvb96HDagwrKRdBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.7.0/nouislider.min.css"
        integrity="sha512-40vN6DdyQoxRJCw0klEUwZfTTlcwkOLKpP8K8125hy9iF4fi8gPpWZp60qKC6MYAFaond8yQds7cTMVU8eMbgA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.7.0/nouislider.css"
        integrity="sha512-zK13DHt+RvOBWVI7UsG9euzg5sl1QUhJKZVu20rrvPLaTito+K9elJBtEPWi3YJ+O6o5tYp6cdOc4lN9ePm9Lw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- font family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto+Condensed&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">

    <!-- font awesome for icons -->
    <script src="https://kit.fontawesome.com/af0eec3b3b.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.2.0/aos.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.7.0/nouislider.js"
        integrity="sha512-TL5A285sI9ihbWGterIw/8T1EosEaxW03ZMfjMeJGBSYHeK+i8mFw3BnqBky5JTBg4grIH3mwPZ4YONz1TSCZQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script src="https://cdn.tiny.cloud/1/31t92rntpgyq7zyhnq01a2yv9tmv6l0abnakrg050ycjwx5m/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>



    <!-- local css file -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


    <style>
        .navbar {
            white-space: nowrap;
        }

    </style>

    @livewireStyles


</head>

<body class="home-page">
    <header id="header" class="header">
        {{-- <div class="container-fluid">
            <div class="row">
                <div class="topbar-menu">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 col-sm-6">
                                <div class="top-menu left-menu">
                                    <ul>
                                        <li class="menu-item phone">
                                            <a title="phone number" href="#"><span class="icon"><i
                                                        class="fas fa-mobile-alt mobile-icon">
                                                    </i></span>
                                                &nbsp;Phone:
                                                (+977) 980 8192 821</a>
                                        </li>
                                        <li class="menu-item email">
                                            <a title="email" href="#"><span class="icon"><i
                                                        class="far fa-envelope mail-icon"></i><span>
                                                        &nbsp;alekiran41@gmail.com</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="top-menu right-menu">
                                    <ul>
                                        @if (Route::has('login'))
                                            @auth
                                                @if (Auth::user()->utype === 'admin')
                                                    <li style="color: #fff">
                                                        <div class="dropdown show">
                                                            <a class="btn dropdown-toggle"
                                                                style="background:#F31713; color:#fff" href="#"
                                                                role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false">
                                                                <span><i class="far fa-user"></i></span>
                                                                {{ Auth::user()->name }}
                                                            </a>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                <a class="dropdown-item" href="#">My Details</a>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('admin.dashboard') }}">Dashboard</a>
                                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">logout</a>
                                                                <form id="logout-form" action="{{ route('logout') }}"
                                                                    method="POST">
                                                                    @csrf
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @else
                                                    <li class="menu-item">
                                                        <div class="dropdown">
                                                            <a class="dropdown-toggle" href="#" role="button"
                                                                id="dropdownMenuLink" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="false">
                                                                <span><i class="far fa-user"></i></span>
                                                                {{ Auth::user()->name }}
                                                            </a>

                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                <a class="dropdown-item" href="#">My Details</a>
                                                                <a class="dropdown-item"
                                                                    href="{{ route('user.dashboard') }}">Dashboard</a>
                                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">logout</a>
                                                                <form id="logout-form" action="{{ route('logout') }}"
                                                                    method="POST">
                                                                    @csrf
                                                                </form>
                                                            </div>


                                                    </li>

                                                @endif

                                            @else
                                                <li class="menu-item"><a title="Register or Login"
                                                        href="{{ route('register') }}"><span><i
                                                                class="far fa-user"></i></span> &nbsp;Register</a></li>
                                                <li class="menu-item"><a title="Register or Login"
                                                        href="{{ route('login') }}"><span><i
                                                                class="fas fa-sign-in-alt"></i></span> &nbsp;Login</a></li>
                                            @endif

                                            @endif



                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="container-fluid">
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

            @if (Route::has('login'))
                @auth
                    @if (Auth::user()->utype === 'admin')
                        <div class="container-fluid">
                            <div class="navigation-menu">
                                <nav class="navbar navbar-expand-lg">
                                    <button class="navbar-toggler navbar-toggler-right custom-toggler" type="button"
                                        data-toggle="collapse" data-target="#navbarCollapse" aria-controls="Collapse"
                                        aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>

                                    <div class="collapse navbar-collapse justify-content-center" id="navbarCollapse">
                                        <ul class="navbar-nav">
                                            <li class="nav-item active">
                                                <a class="nav-link"
                                                    href="{{ route('admin.categories') }}">Categories</a>
                                            </li>
                                            <li class="nav-item active">
                                                <a title="Products" class="nav-link"
                                                    href="{{ route('admin.products') }}">Products</a>
                                            </li>
                                            <li class="nav-item active">
                                                <a class="nav-link" href="{{ route('admin.sliders') }}">Sliders</a>
                                            </li>
                                            <li class="nav-item active">
                                                <a class="nav-link" href="{{ route('admin.sale') }}">Manage Sale</a>
                                            </li>
                                            <li class="nav-item active">
                                                <a class="nav-link" href="{{ route('admin.coupons') }}">Coupons</a>
                                            </li>
                                            <li class="nav-item active">
                                                <a class="nav-link" href="{{ route('admin.orders') }}">Orders</a>
                                            </li>
                                            <li class="nav-item active">
                                                <a class="nav-link" href="/faq">FAQ</a>
                                            </li>
                                            <li class="nav-item active">
                                                <a class="nav-link" href="/cart">My Cart</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <ul class="navbar-nav" style="display: inline-block">
                                        <li class="nav-item dropdown active">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span><i class="far fa-user"></i></span> &nbsp;{{ Auth::user()->name }}
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="#">My Details</a>
                                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">logout</a>
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
                                <div class="navigation-menu">
                                    <nav class="navbar navbar-expand-lg">
                                        <button class="navbar-toggler navbar-toggler-right custom-toggler" type="button"
                                            data-toggle="collapse" data-target="#navbarCollapse" aria-controls="Collapse"
                                            aria-expanded="false" aria-label="Toggle navigation">
                                            <span class="navbar-toggler-icon"></span>
                                        </button>

                                        <div class="collapse navbar-collapse justify-content-center" id="navbarCollapse">
                                            <ul class="navbar-nav mr-aut">

                                                <li class="nav-item active">
                                                    <a class="nav-link" href="/">Home</a>
                                                </li>
                                                <li class="nav-item active">
                                                    <a class="nav-link" href="/shop">Shop</a>
                                                </li>
                                                <li class="nav-item active">
                                                    <a class="nav-link" href="#">Offers</a>
                                                </li>
                                                <li class="nav-item active">
                                                    <a class="nav-link" href="{{ route('user.orders') }}">My Orders</a>
                                                </li>
                                                <li class="nav-item active">
                                                    <a class="nav-link" href="#">Blog</a>
                                                </li>
                                                <li class="nav-item active">
                                                    <a class="nav-link" href="/faq">FAQ</a>
                                                </li>
                                                <li class="nav-item active">
                                                    <a class="nav-link" href="/cart">My Cart</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <ul class="navbar-nav" style="display: inline-block">
                                            <li class="nav-item dropdown active">
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span><i class="far fa-user"></i></span> &nbsp;{{ Auth::user()->name }}
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                    <a class="dropdown-item" href="#">My Details</a>
                                                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Dashboard</a>
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">logout</a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                        @csrf
                                                    </form>
                                                </div>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>

                    @endif



                @else
                    <div class="container-fluid">
                        <div class="row">
                            <div class="navigation-menu">
                                <nav class="navbar navbar-expand-lg ">
                                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                                        aria-label="Toggle navigation">
                                        <span><i class="fas fa-bars"></i></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarCollapse">
                                        <ul class="navbar-nav">
                                            <li class="nav-item active">
                                                <a class="nav-link" href="/">Home</a>
                                            </li>
                                            <li class="nav-item dropdown active">
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Categories
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                </div>
                                            </li>
                                            <li class="nav-item active">
                                                <a class="nav-link" href="/shop">Shop</a>
                                            </li>
                                            <li class="nav-item active">
                                                <a class="nav-link" href="#">Offers</a>
                                            </li>
                                            <li class="nav-item active">
                                                <a class="nav-link" href="#">Featured Brands</a>
                                            </li>
                                            <li class="nav-item active">
                                                <a class="nav-link" href="#">Blog</a>
                                            </li>
                                            <li class="nav-item active">
                                                <a class="nav-link" href="/faq">FAQ</a>
                                            </li>
                                            <li class="nav-item active">
                                                <a class="nav-link" href="/cart">My Cart</a>
                                            </li>
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
                    </div>

                @endif

                @endif


            </header>

            {{ $slot }}

            <footer>
                <div class="container-fluid">
                    <div class="footer">
                        <div class="row">
                            <div class="col-md-4 col-12">
                                <h4>About Us</h4>
                                <hr style="background: #fff">
                                <p>Shop Nepal Pvt. Ltd. <br>
                                    Raniban, Kathmandu <br>
                                    +977 9808192821
                                    <br>
                                    shopnepal@hotmail.com
                                </p>
                            </div>
                            <div class="col-md-4 col-12">
                                <h4>Quick Links</h4>
                                <hr style="background: #fff">
                                <p><a href="">Home</a><br>
                                    <a href="">Shop</a>
                                    <br> <a href=""> My Cart</a>
                                    <br><a href="">Our Blog</a>
                                </p>

                            </div>
                            <div class="col-md-4 col-12">
                                <h4>Customer Care</h4>
                                <hr style="background: #fff">
                                <p>Terms And Conditions
                                    <br>Frequently Asked Questions
                                    <br>Returns/Exchange
                                </p>
                            </div>
                        </div>
                        <div class="social d-flex align-items-center justify-content-center">
                            <a href="" class="facebook btn"><i class="fab fa-facebook-f"></i></a>
                            <a href="" class="instagram btn"><i class="fab fa-instagram"></i></a>
                            <a href="" class="twitter btn"><i class="fab fa-twitter"></i></a>
                        </div>
                        <hr style="background: #fff">
                        <div class="copyright">
                            <p>Copyright ©2021 All rights reserved | This template is made by Kiran Ale</p>
                        </div>

                    </div>
                </div>

            </footer>

            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->


            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
                        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
            </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
            </script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
            </script>





            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
                        integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
                        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"
                        integrity="sha512-Y+0b10RbVUTf3Mi0EgJue0FoheNzentTMMIE2OreNbqnUPNbQj8zmjK3fs5D2WhQeGWIem2G2UkKjAL/bJ/UXQ=="
                        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.7.0/nouislider.min.css"
                integrity="sha512-40vN6DdyQoxRJCw0klEUwZfTTlcwkOLKpP8K8125hy9iF4fi8gPpWZp60qKC6MYAFaond8yQds7cTMVU8eMbgA=="
                crossorigin="anonymous" referrerpolicy="no-referrer" />

            <script>
                // // Add slideDown animation to Bootstrap dropdown when expanding.
                // $('.dropdown').on('show.bs.dropdown', function() {
                //     $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
                // });

                // // Add slideUp animation to Bootstrap dropdown when collapsing.
                // $('.dropdown').on('hide.bs.dropdown', function() {
                //     $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
                // });

                AOS.init({
                    once: true,
                    duration: 1000

                });
            </script>
            @livewireScripts
            @stack('scripts')
        </body>

        </html> --}}



        <!doctype html>
<html lang="en">

<head>
    @include('layouts.head')
</head>

<body class="home-page">
    <header id="header" class="header">
        @include('layouts.header')
        @include('layouts.navmenu')
    </header>

    {{ $slot }}

    <footer>
        @include('layouts.footer')

    </footer>
    @include('layouts.script')


</body>

</html>
