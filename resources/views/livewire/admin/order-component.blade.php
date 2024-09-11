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
            <li class="active">
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
        
        <br>
        <div id="main">
            <div class="card">
                <div class="card-header head-info">
                    <div class="row">
                        <div class="col-md-12 d-flex align-items-center justify-content-center">
                            <h4>All Orders</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (Session::has('message'))
                        <div class="alert alert-success" role="alert"><a href="#" class="close"
                                data-dismiss="alert" aria-label="close">&times;</a>{{ Session::get('message') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table id="table" class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col" class="nowrap">ID</th>
                                    <th scope="col" class="nowrap">Full Name</th>
                                    <th scope="col" class="nowrap">Mobile</th>
                                    <th scope="col" class="nowrap">Email</th>
                                    <th scope="col" class="nowrap">Total</th>
                                    <th scope="col" class="nowrap">Status</th>
                                    <th scope="col" class="nowrap">Order Date</th>
                                    <th scope="col" class="nowrap" colspan="2" class="text-center">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($orders as $order)
                              <tr>
                                  <td class="nowrap">{{ $order->id }}</td>
                                  <td class="nowrap">{{ $order->firstname }} {{ $order->lastname }}</td>
                                  <td class="nowrap">{{ $order->mobile }}</td>
                                  <td class="nowrap">{{ $order->email }}</td>
                                  <td class="nowrap">$ {{ $order->total }}</td>
                                  @if ($order->status == 'delivered')
                                      <td class="nowrap text-success"><b>{{ $order->status }}</b></td>
                                  @elseif($order->status == 'canceled')
                                      <td class="nowrap text-danger"><b>{{ $order->status }}</b></td>
                                  @else
                                      <td class="nowrap text-warning"><b>{{ $order->status }}</b></td>
      
                                  @endif
      
                                  <td class="nowrap">{{ $order->created_at }}</td>
                                  <td class="nowrap"><a
                                          href="{{ route('admin.orderdetails', ['order_id' => $order->id]) }}"
                                          class="btn btn-success">View Details</a></td>
                                  <td>
                                      <div class="dropdown">
                                          <button class="btn btn-secondary dropdown-toggle" type="button"
                                              id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                              aria-expanded="false">
                                              Status
                                          </button>
                                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                              <a class="dropdown-item" href="#"
                                                  wire:click.prevent="updateOrderStatus({{ $order->id }},'delivered')">Delivered</a>
                                              <a class="dropdown-item" href="#"
                                                  wire:click.prevent="updateOrderStatus({{ $order->id }},'canceled')">Cancelled</a>
                                          </div>
                                      </div>
                                  </td>
                              </tr>
                          @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>

@endpush



{{-- 


<div class="container" style="padding: 30px 0;">
    <div class="row">
        <div class="col-md-12">
            <div class="admin-heading">
                <div class="row">
                    <div class="col-md-12">
                        <span style="padding-left: 10px">All Orders List</span>
                    </div>
                </div>


            </div>
            @if (Session::has('order_message'))
                <div class="alert alert-success" role="alert">{{ Session::get('order_message') }}</div>
            @endif
            <table class="table table-striped table-responsive" style="box-sizing: border-box" id="myTable">
                <thead>
                    <tr>
                        <th class="nowrap">ID</th>
                        <th class="nowrap">Full Name</th>
                        <th class="nowrap">Mobile</th>
                        <th class="nowrap">Email</th>
                        <th class="nowrap">Total</th>
                        <th class="nowrap">Status</th>
                        <th class="nowrap">Order Date</th>
                        <th class="nowrap" colspan="2" class="text-center">Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td class="nowrap">{{ $order->id }}</td>
                            <td class="nowrap">{{ $order->firstname }} {{ $order->lastname }}</td>
                            <td class="nowrap">{{ $order->mobile }}</td>
                            <td class="nowrap">{{ $order->email }}</td>
                            <td class="nowrap">$ {{ $order->total }}</td>
                            @if ($order->status == 'delivered')
                                <td class="nowrap text-success"><b>{{ $order->status }}</b></td>
                            @elseif($order->status == 'canceled')
                                <td class="nowrap text-danger"><b>{{ $order->status }}</b></td>
                            @else
                                <td class="nowrap text-warning"><b>{{ $order->status }}</b></td>

                            @endif

                            <td class="nowrap">{{ $order->created_at }}</td>
                            <td class="nowrap"><a
                                    href="{{ route('admin.orderdetails', ['order_id' => $order->id]) }}"
                                    class="btn btn-success">View Details</a></td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Status
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#"
                                            wire:click.prevent="updateOrderStatus({{ $order->id }},'delivered')">Delivered</a>
                                        <a class="dropdown-item" href="#"
                                            wire:click.prevent="updateOrderStatus({{ $order->id }},'canceled')">Cancelled</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
            <span class="d-flex justify-content-end">{{ $orders->links() }}</span>

        </div>
    </div>


</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

@endpush --}}
