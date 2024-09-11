<div class="wrapper">

    <nav id="sidebar">
        <div class="sidebar-header d-flex align-items-center justify-content-center">
            <img src="{{ asset('images/logo.png') }}" alt="company logo" width="100">
        </div>
        <div class="d-flex align-items-center justify-content-center"  style="border-bottom: 1px solid #fff;">
            <h5><b>Admin Dashboard</b></h5>
        </div>
        
        

        <ul class="lisst-unstyled components">
            <li   class="active">
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
          <li>
              <a href="{{route('admin.profile')}}"><span><i class="far fa-address-card"> </i></span> &nbsp; My
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


    </div>
</div>

@push('scripts')


@endpush
