@extends("admin_layout")

@section("content")

<div class="container ">
  <h1 class="mb-4">Customers</h1>
  <table class="table table-bordered table-hover">
    <thead class="thead-dark">
      <tr>
        <th scope="col">User ID</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone Number</th>
      </tr>
    </thead>
    <tbody>
      @foreach($customers as $customer)
      <tr>
        <td>{{ $customer->id }} </td>
        <td>{{ $customer->name }}</td>
        <td>{{ $customer->email }}</td>
        <td>{{ $customer->phone_number }}</td>
      </tr>
      @endforeach
      <!-- Add more rows as needed -->
    </tbody>
  </table>
</div>

@endsection