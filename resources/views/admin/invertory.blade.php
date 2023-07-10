@extends('admin.master')

@section('title','invertory')
    
@section('content')
    

<table style="width: 80%;">
  <tr>
    <th>Name</th>
    <th>Quantity</th>
    <th>add</th>
  </tr>
  
    @foreach ($items as $item)
        
    
    <tr>
      <td>{{$item->name}}</td>
      <td>{{$item->quantity}}</td>
      <td>
        <form action='{{route('updateInvertory',$item->id)}}' >
           <input type='number' name='newQuantity' value="1" min="1">
          <button class='btn btn-secondary' type='submit'>Edit </button>
        </form>
      </td>
      </tr>
      @endforeach
      
    
  </table>
  @endsection





