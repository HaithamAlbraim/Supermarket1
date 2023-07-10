<link rel="stylesheet" href="{{ URL::asset('css/admin.css'); }} ">

<div class="vertical-menu">
<a class="nav-link" type="button" href="{{url(route('admin.dashboard'))}}">Home</a>

 <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle w-100 " type="button" data-bs-toggle="dropdown"
      aria-expanded="false">
      Product
    </button>
  <div class="dropdown-menu">
    
    <a class="dropdown-item" href="{{route('showAll_items')}}">All Products</a>
    <a class="dropdown-item" href="{{route('item.create')}}">Add Product</a>
   
  </div>
</div>
<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle w-100 " type="button" data-bs-toggle="dropdown"
  aria-expanded="false">
  category
</button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="{{route('showAll_categories')}}">All Categories</a>
    <a class="dropdown-item" href="{{url(route('category.create'))}}">Add Category</a>
   
  </div>
</div>
<a class="nav-link" type="button" href="{{route('showInvertory')}}">Inventory</a>

</div>

