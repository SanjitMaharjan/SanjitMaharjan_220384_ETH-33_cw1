@extends('admin_layout')

@section('content')

<style>
    .btn-edit {
      background-color: #28a745;
      border-color: #28a745;
    }
    .btn-delete {
      background-color: #dc3545;
      border-color: #dc3545;
    }
  </style>
<body style="background-color: #999999;">
  <div class="container mt-5 p-4 bg-light rounded shadow">
    <h2 class="text-center mb-4">Upload Product</h2>
    <form method="POST" action="" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="name" class="form-label">Product Name:</label>
        <input type="text" class="form-control" name="name" required>
      </div>
        
      <div class="mb-3">
        <label for="details" class="form-label">Product Details:</label>
        <textarea class="form-control" name="details" rows="5" required></textarea>
      </div>
        
      <div class="mb-3">
        <label for="price" class="form-label">Price:</label>
        <div class="input-group">
          <span class="input-group-text">Rs.</span>
          <input type="number" class="form-control" name="price" required>
        </div>
      </div>
        
      <div class="mb-3">
        <label for="category" class="form-label">Category:</label>
        <select class="form-select" name="category" required>
          <option value="" selected disabled>Select a category</option>
          <!--Add categories-->
          <option value="electronics">Categories Selection</option>
          <!-- Add more categories here -->
        </select>
      </div>
      <div class="mb-3">
        <label for="image1" class="form-label">Product Image</label>
        <input type="file" class="form-control" name="image[]" multiple>
      </div>
      <button type="submit" class="btn btn-primary btn-block" style="background-color: black; border-color: black;" name="Upload">
        Upload
      </button>
    </form>
  </div>
  

  <div class="container mt-5">
    <table class="table table-bordered table-hover">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Product ID</th>
          <th scope="col">Product Name</th>
          <th scope="col">Price</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody class="bg-light">
        <tr>
          <th scope="row">Product Id here</th>
          <td>Product name here</td>
          <td>Rs.<span>Price here</span></td>
          <td>
            <a href="#" class="btn btn-sm btn-edit text-white"><i class="fas fa-edit"></i> Edit</a>
            <!--Delete button-->
            <form class="d-inline" action="#" method="POST">
              <button type="submit" class="btn btn-sm btn-delete text-white" ><i class="fas fa-trash"></i> Delete</button>
            </form>
            <!--Upto here-->
          </td>
        </tr>
        <!-- Add more rows as needed -->
        
      </tbody>
    </table>
  </div>
@endsection