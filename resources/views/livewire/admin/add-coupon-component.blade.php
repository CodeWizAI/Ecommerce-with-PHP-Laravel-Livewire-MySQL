<div class="wrapper">
    <nav id="sidebar">
        <div class="sidebar-header d-flex align-items-center justify-content-center">
            <img src="{{ asset('images/logo.png') }}" alt="company logo" width="100">
        </div>
        <div class="d-flex align-items-center justify-content-center" style="border-bottom: 1px solid #fff;">
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
                <a href="{{ route('admin.featuredproducts') }}"><span><i class="fas fa-clipboard-list"></i></span>
                    &nbsp;Featured Products</a>
            </li>
            <li class="active">
                <a href="{{ route('admin.coupons') }}"><span><i class="fas fa-tag"></i></span> &nbsp;Coupons</a>
            </li>
            <li>
                <a href="{{ route('admin.profile') }}"><span><i class="far fa-address-card"> </i></span> &nbsp; My
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
                        <div class="col-md-6">
                            <h4>Add New Coupon</h4>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('admin.coupons') }}"
                                class="btn float-right btn-custom1 text-custom">Coupons List</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="storeCoupon">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert"><a href="#" class="close"
                                    data-dismiss="alert" aria-label="close">&times;</a>{{ Session::get('message') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-8">
                                <div class="form-group row">
                                    <label for="coupon-code" class="col-sm-4 col-form-label">Coupon Code</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" placeholder="coupon code"
                                            wire:model="coupon_code">
                                        @error('coupon_code')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="coupon-code" class="col-sm-4 col-form-label">Coupon Type</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" wire:model="coupon_type">
                                            <option value="">Select</option>
                                            <option value="fixed">Fixed</option>
                                            <option value="percent">Percentage</option>
                                        </select>
                                        @error('coupon_type')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="coupon-value" class="col-sm-4 col-form-label">Coupon Value</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" placeholder="coupon value"
                                            wire:model="coupon_value">
                                        @error('coupon_value')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cart-value" class="col-sm-4 col-form-label">Cart Value</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" placeholder="cart value"
                                            wire:model="cart_value">
                                        @error('cart_value')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="expiry-date" class="col-sm-4 col-form-label">Expiry Date</label>
                                    <div class="col-sm-8" wire:ignore>
                                        <input type="text" class="form-control" id="expiry-date"
                                            placeholder="expiry date" wire:model="expiry_date">
                                        @error('expiry_date')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <hr>

                                <div class="form-group row">
                                    <label for="slug" class="col-sm-4 col-form-label"></label>
                                    <div class="col-sm-8">
                                        <a href="{{ route('admin.coupons') }}"
                                            class="btn float-left btn-danger">Back</a>

                                        <button type="submit" class="btn btn-custom2 float-right">Add Coupon</button>
                                    </div>
                                </div>


                            </div>
                            <div class="col-md-2">

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')

    <script>
        $(function() {
            $('#expiry-date').datetimepicker({
                    format: 'Y-MM-DD',
                    icons: {
                        date: "fa fa-calendar",
                        previous: "fa fa-chevron-left",
                        next: "fa fa-chevron-right",
                        today: "fa fa-clock-o",
                        clear: "fa fa-trash-o"
                    }
                })
                .on('dp.change', function(ev) {
                    var data = $('#expiry-date').val();
                    @this.set('expiry_date', data);
                });

        });
    </script>

@endpush



{{-- <div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="admin-heading">
                    <div class="row">
                        <div class="col-md-10">
                            <span style="padding-left: 10px">Add New Coupon</span>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('admin.coupons') }}" class="btn btn-sm btn-primary">All Coupons</a>
                        </div>
                    </div>


                </div>

                <div class="addcategory-form mt-5">

                    <form wire:submit.prevent="storeCoupon">
                        <div class="row">
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-8">
                                @if (Session::has('message'))
                                    <div class="alert alert-success" role="alert">
                                        {{ Session::get('message') }}
                                    </div>
                                @endif
                                <div class="form-group row">
                                    <label for="coupon-code" class="col-sm-4 col-form-label">Coupon Code</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" placeholder="coupon code"
                                            wire:model="coupon_code">
                                        @error('coupon_code')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="coupon-code" class="col-sm-4 col-form-label">Coupon Type</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" wire:model="coupon_type">
                                            <option value="">Select</option>
                                            <option value="fixed">Fixed</option>
                                            <option value="percent">Percentage</option>
                                        </select>
                                        @error('coupon_type')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="coupon-value" class="col-sm-4 col-form-label">Coupon Value</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" placeholder="coupon value"
                                            wire:model="coupon_value">
                                        @error('coupon_value')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cart-value" class="col-sm-4 col-form-label">Cart Value</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" placeholder="cart value"
                                            wire:model="cart_value">
                                        @error('cart_value')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="expiry-date" class="col-sm-4 col-form-label">Expiry Date</label>
                                    <div class="col-sm-8" wire:ignore>
                                        <input type="text" class="form-control" id="expiry-date"
                                            placeholder="expiry date" wire:model="expiry_date">
                                        @error('expiry_date')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="slug" class="col-sm-4 col-form-label"></label>
                                    <div class="col-sm-8">
                                        <button type="submit" class="btn btn-success mr-auto">Create Coupon</button>
                                    </div>
                                </div>


                            </div>
                            <div class="col-md-2">

                            </div>
                        </div>

                    </form>
                    <hr>
                </div>

            </div>
        </div>

    </div>
</div>

@push('scripts')

    <script>
       $(function(){
         $('#expiry-date').datetimepicker({
            format: 'Y-MM-DD',
            icons: {
                date: "fa fa-calendar",
                previous: "fa fa-chevron-left",
                next: "fa fa-chevron-right",
                today: "fa fa-clock-o",
                clear: "fa fa-trash-o"
            }
         })
         .on('dp.change',function (ev){
           var data = $('#expiry-date').val();
           @this.set('expiry_date',data);
         });

       });
    </script>

@endpush --}}
