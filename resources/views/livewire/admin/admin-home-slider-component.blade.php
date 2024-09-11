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
            <li class="active">
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
                        <div class="col-md-6">
                            <h4>All Sliders</h4>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('admin.addslider') }}" class="btn float-right btn-custom1 text-custom">Add New Slider</a>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    @if (Session::has('message'))
                        <div class="alert alert-success" role="alert"><a href="#" class="close"
                                data-dismiss="alert" aria-label="close">&times;</a>{{ Session::get('message') }}</div>
                    @endif
                    <div class="table-responsive">
                        <table id="table" class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col" class="nowrap">ID</th>
                                    <th scope="col" class="nowrap">Image</th>
                                    <th scope="col" class="nowrap">Title</th>
                                    <th scope="col" class="nowrap">Subtitle</th>
                                    <th scope="col" class="nowrap">Price</th>
                                    <th scope="col" class="nowrap">Link</th>
                                    <th scope="col" class="nowrap">Status</th>
                                    <th scope="col" class="nowrap">Date</th>
                                    <th scope="col" class="nowrap">Action</th>
                                  </tr>
                            </thead>
                            <tbody>
                                @foreach ($sliders as $slider)
                                <tr>
                                    <td class="nowrap">{{$slider->id}}</td>
                                    <td class="nowrap"><img src="{{asset('images/sliders')}}/{{$slider->image}}" alt="" width="60"></td>
                                    <td class="nowrap">{{$slider->title}}</td>
                                    <td class="nowrap">{{$slider->subtitle}}</td>
                                    <td class="nowrap">{{$slider->price}}</td>
                                    <td class="nowrap">{{$slider->link}}</td>
                                    <td class="nowrap">{{$slider->status == 1 ? 'Active':'Inactive'}}</td>
                                    <td class="nowrap">{{$slider->created_at}}</td>
                                    <td class="nowrap">
                                            <a href="{{route('admin.editslider',['slider_id'=>$slider->id])}}"
                                                class="btn btn-primary btn-sm"><i class="far fa-edit"></i></a>
                                            <a type="button" href="#"
                                                onclick="confirm('Are You Sure , You want to delete this Slider?') || event.stopImmediatePropagation()"
                                                wire:click.prevent="deleteSlider({{$slider->id}})"
                                                class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
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



<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="category-heading">
                    <div class="row">
                        <div class="col-md-10">
                            <span style="padding-left: 10px">All Sliders List</span> 
                        </div>
                        <div class="col-md-2" >
                            <a href="{{route('admin.addslider')}}" class="btn btn-primary btn-sm">Add New Slider</a>
                        </div>
                    </div>
                  
                  
                </div>
                <div class="category-list">
                    @if(Session::has('message'))
                       <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Image</th>
                            <th scope="col">Title</th>
                            <th scope="col">Subtitle</th>
                            <th scope="col">Price</th>
                            <th scope="col">Link</th>
                            <th scope="col">Status</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($sliders as $slider)
                            <tr>
                                <td>{{$slider->id}}</td>
                                <td><img src="{{asset('images/sliders')}}/{{$slider->image}}" alt="" width="60"></td>
                                <td>{{$slider->title}}</td>
                                <td>{{$slider->subtitle}}</td>
                                <td>{{$slider->price}}</td>
                            <td>{{$slider->link}}</td>
                                <td>{{$slider->status == 1 ? 'Active':'Inactive'}}</td>
                                <td>{{$slider->created_at}}</td>
                                <td>
                                    <a href="{{route('admin.editslider',['slider_id'=>$slider->id])}}" class="btn edit-btn"><i class="far fa-edit"></i></a>
                                    <a href="#" wire:click.prevent="deleteSlider({{$slider->id}})" class="btn btn-danger"><i class="fas fa-times"></i></a>
                                </td>
                            </tr>  
                            @endforeach
                          
                          
                        </tbody>
                      </table>
                      <span class="d-flex justify-content-end">{{$sliders->links()}}</span>
                </div>
            </div>
        </div>
        
    </div>
</div> --}}
