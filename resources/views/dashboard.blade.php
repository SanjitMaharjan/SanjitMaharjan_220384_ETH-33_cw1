@extends("Components.layout")

@section('content')

@if(!$searching)
<div class="container">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      @php
      $i = 0;
      @endphp
      @foreach($carouselProducts as $product)
      <div class="carousel-item {{ $i==0 ? 'active': '' }}">
        <div class="d-flex justify-content-center ">
          <img class="d-block w-100" src="{{ $product->image }}" alt="First slide">
        </div>
        <div class="carousel-caption d-none d-md-block">
          <h5 class="display-2">{{ $product->name }}</h5>
          <p>{{ $product->price }}</p>
        </div>
      </div>
      @php
      $i++
      @endphp
      @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
@endif

<div class="container-fluid">
  <div class="container">
    <div class="row">
      @foreach($products as $product)
      <div class="card col-lg-3 col-md-6 col-sm-12">
        @include('Components.ProductBody')
      </div>

      @endforeach
    </div>
  </div>
</div>

@endsection