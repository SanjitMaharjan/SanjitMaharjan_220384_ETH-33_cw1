<div class="top-right" style="font-size: 28px; color: red; cursor:pointer;" id="wishlist{{ $product->id }}">
  @if($product->addedOnWishlist)
  <i class="fa-solid fa-heart" onclick="removeFromWishlist(event, {{ $product->id }})"></i>
  @else
  <i class="fa-regular fa-heart" onclick="addToWishlist(event, {{ $product->id }})"></i>
  @endif
</div>
<a href=""><img class="card-img-top" src="{{ asset('images/'.$product->image) }} " alt="Card image"></a>
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