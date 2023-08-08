@extends("admin_layout")

@section('content')

<div class="container ">
  <h1 class="mb-4">Ordered Items</h1>
  <table class="table table-bordered table-hover">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Product ID</th>
        <th scope="col">Product Name</th>
        <th scope="col">Price</th>
        <th scope="col">Name</th>
        <th scope="col">Phone Number</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $product)
      <tr>
        <td>{{ $product['id'] }} </td>
        <td>{{ $product['name'] }}</td>
        <td>${{ $product['price'] }}</td>
        <td>{{ $product['user_name'] }}</td>
        <td>{{ $product['user_number'] }}</td>
        <td>
          @if($product['delivered'])
          <a href="#" class="btn btn-sm btn-edit text-white btn-success">Delivered</a>
          @else
          <form class="d-inline" action="/admin/products/{{ $product['cart_id'] }}/deliver" method="POST">
            @csrf
            <button type="submit" class="btn btn-sm btn-delete text-white btn-info">Deliver</button>
          </form>
          @endif
        </td>
      </tr>
      @endforeach
      <!-- Add more rows as needed -->
    </tbody>
  </table>
</div>

@endsection