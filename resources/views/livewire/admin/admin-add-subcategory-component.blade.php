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
        <li  class="active">
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
        <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="btn toggle-btn">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </nav>
        <br>
        <div id="main">
            <div class="card">
                <div class="card-header head-info">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Add Sub Category</h4>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('admin.subcategories', ['category_id' => $category_id]) }}" class="btn float-right btn-custom1 text-custom">Sub-Categories List</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="storeSubcategory">
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
                                <label for="category-name" class="col-sm-4 col-form-label">Sub-Category Name</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control"  placeholder="category name" wire:model="name" wire:keyup="generateSlug">
                                  @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                  @enderror
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="slug" class="col-sm-4 col-form-label">Sub-Category Slug</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control"  placeholder="slug" wire:model="slug">
                                  @error('slug')
                                    <p class="text-danger">{{$message}}</p>
                                  @enderror
                                 
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="product-image" class="col-sm-4 col-form-label">Sub-Category Image</label>
                                <div class="col-sm-8">
                                  <input type="file" class="input-file" wire:model="image">
                                  @if($image)
                                     <img src="{{$image->temporaryUrl()}}" width="120" alt="">
                                  @endif
                                  @error('image')
                                    <p class="text-danger">{{$message}}</p>
                                  @enderror
                                </div>
                            </div>
                            <hr>
                              <div class="form-group row">
                                <label for="slug" class="col-sm-4 col-form-label"></label>
                                <div class="col-sm-8">
                                  <button type="submit" class="btn btn-custom2 mr-auto">Add Sub-Category</button>
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
  