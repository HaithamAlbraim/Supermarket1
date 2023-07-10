@extends('admin.master')

@section('title','Add category')
    
@section('content')
<div class="card justify-content-center "  style="width: 80%">
  <div class="card-header text-center">
    Add Category
  </div>
  <div class="card-body ">
 <form action="{{route('category.update',$category)}}" method="POST"  enctype="multipart/form-data" >
  @csrf
  @method('PATCH')
 <div class="form-group">
  <label>Category Name</label>
  <input type="text" class="form-control" name="name" value="{{$category->name}}" >
 </div>
  <div class="form-group">
  <label>Category descripteion</label>
  <input type="text" class="form-control" name="description" value="{{$category->description}}">
  </div>
 
  <div class="form-group">
  <label>Item img</label>
  <input type="file" class="form-control-file" name="img" value="{{$category->img_path}}" >
  </div>
  <div style= "text-align: center;">
  <button type="submit" class="btn btn-primary" name="add_category">Edit</button>
  </div>
 </form>
  </div>
  </div>
@endsection