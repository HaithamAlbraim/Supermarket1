@extends('admin.master')

@section('title','Edit item')
    
@section('content')
<div class="card justify-content-center "  style="width: 80%">
  <div class="card-header text-center">
    Edit item
  </div>
  <div class="card-body ">
 <form action="{{route('item.update',$item)}}" method="POST"  enctype="multipart/form-data" >
  @csrf
  @method('PATCH')
 <div class="form-group">
  <label>item Name</label>
  <input type="text" class="form-control" name="name" value="{{$item->name}}" >
 </div>
 <div class="form-group">
  <label>Item Category</label>
  <select class="form-select" aria-label="Default select example" name="category_id">
   
    @foreach ($categories as $category)
        
    <option @if ($category->id==$item->category_id) {{ "selected" }} @endif value="{{$category->id}}">{{$category->name}}
    </option>
    @endforeach
    
  </select>
</div>
  <div class="form-group">
    <label>item price</label>
    <input type="text" class="form-control" name="price" value="{{$item->price}}">
    </div>
 
  <div class="form-group">
  <label>Item img</label>
  <input type="file" class="form-control-file" name="img_path" value="{{$item->img_path}}" >
  </div>
  <div style= "text-align: center;">
  <button type="submit" class="btn btn-primary" name="edit_item">Edit</button>
  </div>
 </form>
  </div>
  </div>
@endsection