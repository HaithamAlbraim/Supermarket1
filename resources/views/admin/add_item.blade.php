@extends('admin.master')

@section('title','Add Item')
    
@section('content')
<div class="card justify-content-center "  style="width: 80%">
  <div class="card-header text-center">
    Add Item
  </div>
  <div class="card-body ">
 <form action="{{route('item.store')}}" method="post" enctype="multipart/form-data" >
  @csrf
 <div class="form-group">
  <label>Item Name</label>
  <input type="text" class="form-control" name="name">
 </div>
  <div class="form-group">
  <label>Item Category</label>
  <select class="form-select" aria-label="Default select example" name="category_id">
   
    @foreach ($categories as $category)
        
    <option value="{{$category->id}}">{{$category->name}}</option>
    @endforeach
    
  </select>
</div>
<div class="form-group">
  <label>Item Price</label>
  <input type="text" class="form-control" name="price">
</div>
 
  <div class="form-group">
  <label>Item img</label>
  <input type="file" class="form-control-file" name="img_path">
  </div>
  <div style="text-align: center;">
  <button type="submit" class="btn btn-primary" name="add_item">Add</button>
  </div>
 </form>
  </div>
  </div>
@endsection