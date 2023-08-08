@extends('components.layout')
@section('content')
<div class="container-fluid">
    <div class="container">
        <div class="row">
        @foreach($products as $product)
            <div class="card col-lg-3 col-md-6 col-sm-12" >
                <div class="top-right"><i class="fa-regular fa-heart"></i>
                    <i class="fa-regular fa-heart"></i></div>
                <a href="#"><img class="card-img-top" src="{{$product->image}}" alt="Card image"></a>
                <div class="card-body">
                    <h5 class="card-title">{{$product->name}}</h5>
                    <strong class=" text-danger">Rs. {{$product->price}}</strong>
                  <div class="btn-group w-100">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Buy</button>
                  </div>
                </div>
            </div>
   @endforeach
        </div>
    </div>
</div>

@endsection


