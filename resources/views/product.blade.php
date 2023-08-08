@extends('components.layout')
@section('content')
<div class="container-fluid">
    <div class="container">
        <div class="row">
          @foreach($products as $product)
          
          @include('Components.ProductBody')
           
          @endforeach
        </div>
    </div>
</div>

@endsection


