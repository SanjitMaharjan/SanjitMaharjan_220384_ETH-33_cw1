@extends('components.layout')

@section('content')

<div class="container mt-3">
  <h1>Wishlist</h1>
  <div class="row">
    @foreach($products as $product)
    <div class="card col-lg-3 col-md-6 col-sm-12">
      <div class="top-right"><i class="fa-regular fa-heart"></i>
        <i class="fa-regular fa-heart"></i>
      </div>
      <a href="#"><img class="card-img-top" src="{{$product->image}}" alt="Card image"></a>
      <div class="card-body">
        <h5 class="card-title">{{$product->name}}</h5>
        <strong class=" text-danger">Rs. {{$product->price}}</strong>
        <div class="btn-group w-100 mt-2" id="cardBtn{{ $product->id }}">
          @if(!$product->cartAdded)
          <button type="button" class="btn btn-sm btn-outline-secondary" onclick="addToCart(event, {{ $product->id }})">Add to Cart</button>
          @else
          <button type="button" class="btn btn-sm btn-danger white" onclick="removeFromCart(event, {{ $product->id }})">Remove from Cart</button>
          @endif
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

<script>
  async function addToCart(event, product_id) {
    event.target.innerText = `Adding`;
    await fetch(`/cart/add/${product_id}`, {
      method: "POST",
      credentials: "same-origin",
      headers: {
        'Content-Type': 'application/json',
        "X-CSRF-Token": '{{ csrf_token() }}'
      },
    });
    event.target.parentElement.innerHTML = `<button type="button" class="btn btn-sm btn-danger white" onclick="removeFromCart(event, ${product_id})">Remove from cart</button>`;
  }

  async function removeFromCart(event, product_id) {
    event.target.innerText = `Removing`;
    await fetch(`/cart/remove/${product_id}`, {
      method: "POST",
      credentials: "same-origin",
      headers: {
        'Content-Type': 'application/json',
        "X-CSRF-Token": '{{ csrf_token() }}'
      },
    });
    event.target.parentElement.innerHTML = `<button type="button" class="btn btn-sm btn-outline-secondary" onclick="addToCart(event, ${product_id})">Add to Cart</button`;
  }
</script>

@endsection