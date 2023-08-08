@extends('components.layout')

@section('content')

<div class="container mt-3">
  <h1>Wishlist</h1>
  <div class="row">
    @foreach($products as $product)
    
    @include('Components.ProductBody')

    @endforeach
  </div>
</div>


@endsection