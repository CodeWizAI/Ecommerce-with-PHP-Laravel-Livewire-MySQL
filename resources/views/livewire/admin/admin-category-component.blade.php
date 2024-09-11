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
            <li class="active">
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
                            <h4>All Categories</h4>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('admin.addcategory') }}"
                                class="btn float-right btn-custom1 text-custom">Add new Category</a>
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
                                    <th scope="col" class="nowrap">Category Name</th>
                                    <th scope="col" class="nowrap">Slug</th>
                                    <th scope="col" class="nowrap">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td class="nowrap">{{ $category->id }}</td>
                                        <td class="nowrap">{{ $category->name }}</td>
                                        <td class="nowrap">{{ $category->slug }}</td>
                                       
                                        <td class="nowrap">
                                            <a href="{{ route('admin.editcategory', ['category_slug' => $category->slug]) }}"
                                                class="btn btn-primary btn-sm"><i class="far fa-edit"></i></a>
                                            <a type="button" href="#"
                                                onclick="confirm('Are You Sure , You want to delete this Category?') || event.stopImmediatePropagation()"
                                                wire:click.prevent="deleteCategory({{ $category->id }})"
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
