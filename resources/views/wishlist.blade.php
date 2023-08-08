@extends('components.layout')

@section('content')

<div class="container mt-3">
  <h1>Wishlist</h1>
  <div class="row">
    @foreach($products as $product)
    <div class="card col-xl-3 col-lg-4 col-md-6 col-sm-12" id="wishlist-card-{{ $product->id }}">
       @include('Components.ProductBody')
    </div>
    @endforeach
  </div>
</div>

@endsection