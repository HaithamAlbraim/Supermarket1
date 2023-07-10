@extends('layouts.master')

@section('title','cart')
    
@section('content')
    
<div class="container">
    <table style="width:100% ;">
        <tr>
          <th>Item img</th>
          <th>Item name</th>
          <th>Item price</th>
          <th>quantity</th>
          <th>Total price</th>
        </tr>
        @php
            $total=0;
        @endphp
        @if (isset($cart_items))
        @foreach ($cart_items as $item)
        {{-- {{$item->id}} --}}

<tr> 
    <td> <img src='{{asset('imgs/'.$item->img_path)}}' width='160px' height='100px'></td>
    <td>{{$item->name}}</td>
    <td>{{$item->price}}.JD</td>
    <td>
      <form action="{{route('updateCart',$item->id)}}">

        <input type='number' min='1' max='{{$item->quantity}}' name='quantity' style='width:60px' value={{session('cart')[$item->id]}}>
        <button type='submit' name='refresh_btn'>Refresh</button>
      </form>

      <a href="{{route('removeFromCart',$item->id)}}" class="btn btn-danger">Delete</a>
      
   </td>
   @php
       
     $supTotal=$item->price*session('cart')[$item->id]; 
     $total+=$supTotal
   @endphp
    <td>{{$supTotal}}</td>
    
</tr> 
@endforeach
 
@endif
</table>
{{$total}}
<a class='btn btn-danger'href='{{route('clearCart')}}'>Cancle </a>



@endsection