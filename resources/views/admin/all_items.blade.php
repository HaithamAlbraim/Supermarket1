@extends('admin.master')

@section('title','dashboard')
    
@section('content')
    


<table width='84%'>
  <tr>
  <th style='width:60px'>Name</th>
  <th style='width:60px'>Img</th>
  <th style='width:10px'>Category</th>
  <th style='width:10px'>Price</th>
  <th style='width:80px'>Action</th>
  </tr>
  @foreach ($items as $item)
  {{-- {{asset('imgs/'.$item->photo_path)}} --}}
  <tr>
    <td>{{$item->name}}</td>
    <td> <img src= '{{asset('imgs/'.$item->img_path)}}'  width='160px' height='140px' </td>
    
    <td>{{ $item->category->name }}</td>
    <td>{{$item->price}}</td>
    <td> 
      <a class='btn btn-secondary'href='{{route('item.edit',$item)}}'>Edit </a>
      <form action="{{route('item.destroy',$item)}}" method="POST">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger" >Delete</button>
      </form>
      
    </td>
  </tr>
  @endforeach
  
 </table>






@endsection