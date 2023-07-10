@extends('layouts.master')

@section('title', 'items')

@section('content')



  <div class="container-fluid">
    <div class="row">

      @foreach ($items as $item)
        {{-- @if ($item->quantity <   1)
          @continue
        @endif --}}
        
        
          <div class='card m-2' style='width:330px'>
            <img src="{{ asset('imgs/' . $item->img_path) }}" class='card-img-top' alt='...' height=200px;>
            <div class='card-body justify-content-center' style='text-align:center;'>
              <h5 class='card-title'>{{ $item->name }}</h5>
              <p class='card-text'>{{ $item->price }}.</p>
              
              <a href="{{route('addToCart',$item->id)}}" class='btn btn-primary'>Add to cart</a>
            </div>
          </div>
          @endforeach
        </div>

    </div>
  









@endsection
