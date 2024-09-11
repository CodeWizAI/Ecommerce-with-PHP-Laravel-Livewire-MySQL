<div>
    <ul class="dropdown-menu animate slideIn  mt-2" aria-labelledby="navbarDropdownMenuLink">
        @foreach ($categories as $category)
            @if ($category->subCategories->count() > 0)
                <li>
                    <a class="dropdown-item"
                        href="{{ route('product.category', ['category_slug' => $category->slug]) }}">{{ $category->name }}
                        <span class="float-right"><i class="fas fa-arrow-right"></i></span></a>

                    <ul class="dropdown-menu dropdown-submenu">
                        @foreach ($category->subCategories as $subCategory)
                            <li>
                                <a class="dropdown-item"
                                    href="{{ route('product.category', ['category_slug' => $subCategory->slug]) }}">{{ $subCategory->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            @else
                <li>
                    <a class="dropdown-item"
                        href="{{ route('product.category', ['category_slug' => $category->slug]) }}">{{ $category->name }}</a>
                </li>
            @endif
        @endforeach
    </ul>
</div>
