@extends('admin.master')

@section('title','dashboard')
    
@section('content')
    


<table width='84%'>
  <tr>
  <th style='width:60px'>Name</th>
  <th style='width:60px'>Img</th>
  <th style='width:10px'>Description</th>
  <th style='width:80px'>Action</th>
  </tr>
  @foreach ($categories as $category)
  {{-- {{asset('imgs/'.$category->photo_path)}} --}}
  <tr>
    <td>{{$category->name}}</td>
    <td> <img src= '{{asset('imgs/'.$category->img_path)}}'  width='160px' height='140px' </td>
    
    <td>{{$category->description}}</td>
    <td> 
      <a class='btn btn-secondary'href='{{route('category.edit',$category)}}'>Edit </a>
      <form action="{{route('category.destroy',$category)}}" method="POST">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger" >Delete</button>
      </form>
      
    </td>
  </tr>
  @endforeach
  
 </table>






@endsection