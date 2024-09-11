
      <form action="{{route('product.search')}}" class="search-box">
        {{-- <select name="product_category_id" id="" class="select-option">
            <option value="all">All Category</option>
            @foreach ($categories as $category)
               <option value="{{$category->id}}" data-id="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select> --}}
        <input class="search-input" type="text" name="search" placeholder="Search Your Items Here . . . .">
        <button class="search-button" type="submit"><i class="fas fa-search"></i></button>
      </form>
 
  