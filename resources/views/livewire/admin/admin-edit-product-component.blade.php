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
            <li class="active">
                <a href="{{ route('admin.products') }}"><i class="fab fa-product-hunt"></i></span> &nbsp;Products</a>
            </li>
            <li>
                <a href="{{ route('admin.sale') }}"><span><i class="fas fa-toggle-on"></i></span> &nbsp;Sale</a>
            </li>
            <li>
                <a href="{{ route('admin.featuredproducts') }}"><span><i class="fas fa-clipboard-list"></i></span>
                    &nbsp;Featured Products</a>
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
            </div>
        </nav>
        <br>
        <div id="main">
            <div class="card">
                <div class="card-header head-info">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Edit Product</h4>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('admin.products') }}"
                                class="btn float-right btn-custom1 text-custom">Products List</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="updateProduct" enctype="multipart/form-data">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert"><a href="#" class="close"
                                    data-dismiss="alert" aria-label="close">&times;</a>{{ Session::get('message') }}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="product-name">Product Name</label>
                                    <input type="text" class="form-control" placeholder="Product name"
                                        wire:model="name">
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="regular-price">Regular Price</label></label>

                                    <input type="text" class="form-control" placeholder="Regular Price"
                                        wire:model="regular_price">
                                    @error('regular_price')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="sale-price">Sale Price</label></label>

                                    <input type="text" class="form-control" placeholder="Sale Price"
                                        wire:model="sale_price">
                                    @error('sale_price')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="stock">Stock</label>
                                    <select class="form-control" style="cursor: pointer;" wire:model="stock_status">
                                        <option value="instock">In Stock</option>
                                        <option value="outofstock">Out Of Stock</option>
                                    </select>
                                    @error('stock_status')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="sku">SKU</label>

                                    <input type="text" class="form-control" placeholder="SKU" wire:model="SKU">
                                    @error('SKU')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="featured" >Featured</label>
                                    <select class="form-control" style="cursor: pointer;" wire:model="featured">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="quantity">Quantity</label>

                                    <input type="text" class="form-control" placeholder="Quantity"
                                        wire:model="quantity">
                                    @error('quantity')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="product-image">Product Image</label>
                                    <input type="file" class="input-file" wire:model="newimage">
                                    @if ($newimage)
                                        <img src="{{ $newimage->temporaryUrl() }}" width="120" alt="">
                                    @else
                                        <img src="{{ asset('images/products') }}/{{ $image }}" width="120"
                                            alt="">
                                    @endif
                                    @error('newimage')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="product-image">Product Gallery</label>
                                    <input type="file" class="form-control" wire:model="newimages" multiple>
                                    @error('newimages')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    @if ($newimages)
                                        @foreach ($newimages as $newimage)
                                            <img src="{{ $newimage->temporaryUrl() }}" width="120" alt="">
                                        @endforeach
                                    @else
                                        @if ($images > '')
                                            @php
                                                $images = explode(',', $images);
                                            @endphp

                                            @foreach ($images as $image)
                                                @if ($image)
                                                    <img src="{{ asset('images/products') }}/{{ $image }}"
                                                        width="120" alt="">
                                                @endif
                                            @endforeach
                                        @endif
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="category">Select Category</label>
                                    <div class="select-category">
                                        @foreach ($categories as $key => $category)
                                            <div class="form-check form-check-inline" >
                                                <input class="form-check-input" type="checkbox" style="cursor: pointer;" name="categories"
                                                    id="category_{{ $category->id }}"
                                                    wire:model="category_selected.{{ $key }}"
                                                    value="{{ $category->id }}">
                                                <label class="form-check-label" style="cursor: pointer;"
                                                    for="category_{{ $category->id }}">{{ $category->name }}</label>
                                            </div><br>
                                        @endforeach
                                        @error('category_selected')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="short_description">Short Description</label>
                                    <div wire:ignore>
                                        <textarea name="" class="form-control" id="short_description"
                                            placeholder="short description" wire:model="short_description"></textarea>
                                        @error('short_description')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <div wire:ignore>
                                        <textarea name="" class="form-control" id="description"
                                            placeholder="Description" wire:model="description"></textarea>
                                        @error('description')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row">
                                    <label for="submit-btn" class="col-sm-4 col-form-label"></label>
                                    <div class="col-sm-8">
                                        <a href="{{ route('admin.products') }}"
                                            class="btn float-left btn-danger">Back</a>

                                        <button type="submit" class="btn btn-custom2 float-right">Update
                                            Product</button>

                                    </div>
                                </div>

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
            tinymce.init({
                selector: '#short_description',
                setup: function(editor) {
                    editor.on('change', function(e) {
                        tinyMCE.triggerSave();
                        var sd_data = $('#short_description').val();
                        @this.set('short_description', sd_data);
                    });
                }
            });
            tinymce.init({
                selector: '#description',
                setup: function(editor) {
                    editor.on('change', function(e) {
                        tinyMCE.triggerSave();
                        var d_data = $('#description').val();
                        @this.set('description', d_data);
                    });
                }
            });
        });
    </script>

@endpush
