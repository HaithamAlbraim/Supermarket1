@extends('layouts.master')

@section('title','Home paje')

@section('content')
  <div id="carouselExampleAutoplaying" class="carousel slide"  data-bs-ride="carousel">
   
    <div class="carousel-inner">
      {{-- {{$categories}} --}}
      @foreach ($categories as $category)
      <div class="carousel-item active">
        <img src="{{asset('imgs/'.$category->img_path)}}" class="d-block w-100" alt="..." height="600px"  >

        <div class="carousel-caption d-none d-md-block">
        <a  href="{{route('show_items_in_category',$category->id)}}" class="btn btn-primary">shop </a>
          <h5>{{$category->name}}</h5>
          <p>{{$category->description}}</p>
        </div>
      </div>
      @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>





   


@endsection