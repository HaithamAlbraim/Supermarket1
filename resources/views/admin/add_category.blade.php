@extends('admin.master')

@section('title','Add category')
    
@section('content')
<div class="card justify-content-center "  style="width: 80%">
  <div class="card-header text-center">
    Add Category
  </div>
  <div class="card-body ">
 <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data" >
  @csrf
 <div class="form-group">
  <label>Category Name</label>
  <input type="text" class="form-control" name="name">
 </div>
  <div class="form-group">
  <label>Category descripteion</label>
  <input type="text" class="form-control" name="description">
  </div>
 
  <div class="form-group">
  <label>Item img</label>
  <input type="file" class="form-control-file" name="img">
  </div>
  <div style="text-align: center;">
  <button type="submit" class="btn btn-primary" name="add_category">Add</button>
  </div>
 </form>
  </div>
  </div>
@endsection