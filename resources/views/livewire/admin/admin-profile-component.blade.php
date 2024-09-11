<div class="wrapper">

    <nav id="sidebar">
        <div class="sidebar-header d-flex align-items-center justify-content-center">
            <img src="{{ asset('images/logo.png') }}" alt="company logo" width="100">
        </div>
        <div class="d-flex align-items-center justify-content-center"  style="border-bottom: 1px solid #fff;">
            <h5><b>Admin Dashboard</b></h5>
        </div>

        <ul class="lisst-unstyled components">
            <li>
                <a href="{{ route('admin.dashboard') }}"><span><i class="fas fa-tachometer-alt"></i></span>
                    &nbsp;Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('admin.orders') }}"><span><i class="fas fa-align-left"></i></span> &nbsp;Orders</a>
            </li>
            <li>
                <a href="{{ route('admin.sliders') }}"><span><i class="fas fa-image"></i></span> &nbsp;Sliders</a>
            </li>
            <li>
                <a href="{{ route('admin.categories') }}"><span><i class="fas fa-layer-group"></i></span>
                    &nbsp;Categories</a>
            </li>
            <li>
                <a href="{{ route('admin.products') }}"><i class="fab fa-product-hunt"></i></span> &nbsp;Products</a>
            </li>
            <li>
                <a href="{{ route('admin.sale') }}"><span><i class="fas fa-toggle-on"></i></span> &nbsp;Sale</a>
            </li>
            <li>
                <a href="{{ route('admin.featuredproducts') }}"><span><i class="fas fa-clipboard-list"></i></span> &nbsp;Featured Products</a>
            </li>
            <li>
                <a href="{{ route('admin.coupons') }}"><span><i class="fas fa-tag"></i></span> &nbsp;Coupons</a>
            </li>
            <li class="active">
                <a href=""><span><i class="far fa-address-card"> </i></span> &nbsp; My
                    Details</a>
            </li>

            <li style="border-top: 1px solid #fff;"><a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span><i
                            class="fas fa-sign-out-alt"></i></span> &nbsp;logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
    <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light nav-toggle">
                <button type="button" id="sidebarCollapse" class="btn toggle-btn">
                    <i class="fas fa-bars"></i>
                </button>
        </nav>
        <br><br>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-12 d-flex align-items-center justify-content-center">
                        <h4>My Details</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="profile d-flex justify-content-center">
                                <img style="width: 100%; height:150px" src="{{ asset('images/admin')}}/{{Auth::user()->profile_photo_path}}" alt="user-image">
                            </div>

                        </div>
                        <div class="col-md-9">
                            <table class="table table-striped" id="myTable">
                                <tr>
                                    <th>User ID :</th>
                                    <td>{{ Auth::user()->id }}</td>

                                </tr>
                                <tr>
                                    <th>Full Name :</th>
                                    <td>{{ Auth::user()->name }}</td>

                                </tr>
                                <tr>
                                    <th>Email :</th>
                                    <td>{{ Auth::user()->email }}</td>

                                </tr>
                            </table>
                            <hr>
                            <a href="{{route('admin.changepassword')}}" type="button" class="btn btn-custom2 float-left">Change Password</a>
                            <a href="{{route('admin.updateprofile',['user_id'=> Auth::user()->id])}}" type="button" class="btn btn-custom1 float-right">Update Profile</a>
                        </div>

                    </div>
                </div>



            </div>
        </div>

    </div>
</div>

@push('scripts')


@endpush
