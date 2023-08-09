@extends("admin_layout")

@section("content")

<form id="adminAddForm" method="POST" action="/admin/users/add">
  @csrf
  <div class="mb-md-5 mt-md-4 pb-5">
    <h2 class="fw-bold mb-2 text-uppercase">Add User</h2>
    <div class="form-outline form-white mb-4">
      <label class="form-label" for="typeUsername">Full Name</label>
      <input type="text" id="typeUsername" class="form-control form-control-lg" name="name" value="{{ old('name') }}" />
      @error('name')
      <span class="text-danger" style="font-size: 16px;">{{ $message }}</span>
      @enderror
    </div>
    <div class="form-outline form-white mb-4">
      <label class="form-label" for="typeUsername">Email</label>
      <input type="email" name="email" id="typeUsername" class="form-control form-control-lg" value="{{ old('email') }}" />
      @error('email')
      <span class="text-danger" style="font-size: 16px;">{{ $message }}</span>
      @enderror
    </div>
    <div class="form-outline form-white mb-4">
      <label class="form-label" for="typeUsername">Phone Number</label>
      <input name="phone_number" type="number" id="typeUsername" class="form-control form-control-lg" value="{{ old('phone_number') }}" />
      @error('phone_number')
      <span class="text-danger" style="font-size: 16px;">{{ $message }}</span>
      @enderror
    </div>
    <div class="form-outline form-white mb-4">
      <label class="form-label" for="typePasswordX">Password</label>
      <input name="password" type="password" id="typePasswordX" class="form-control form-control-lg" value="{{ old('password') }}" />
      @error('password')
      <span class="text-danger" style="font-size: 16px;">{{ $message }}</span>
      @enderror
    </div>
    <button class="btn btn-success btn-lg px-5" type="submit">Add User</button>
  </div>
</form>

<div class="container ">
  <h1 class="mb-4">Admin Users</h1>
  <table class="table table-bordered table-hover">
    <thead class="thead-dark">
      <tr>
        <th scope="col">User ID</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone Number</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
        <td>{{ $user->id }} </td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->phone_number }}</td>
        <td>
          @if(!$user->isCurrent)
          <form class="d-inline" action="/admin/users/{{ $user->id }}/delete" method="POST">
            @csrf
            <button type="submit" class="btn btn-sm btn-delete text-white btn-danger">Delete</button>
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