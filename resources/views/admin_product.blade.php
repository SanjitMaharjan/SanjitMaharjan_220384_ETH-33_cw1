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
        <form method="POST" action="/admin/products/add" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Product Name:</label>
                <input type="text" id="typeUsername" class="form-control form-control-lg" name="name" value="{{ old('name') }}" />
                @error('name')
                <span class="text-danger" style="font-size: 16px;">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="details" class="form-label">Product Description:</label>
                <textarea class="form-control" name="description" rows="5" required>
                {{ old('description') }}
                </textarea>
                @error('description')
                <span class="text-danger" style="font-size: 16px;">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price:</label>
                <div class="input-group">
                    <span class="input-group-text">Rs.</span>
                    <input type="text" id="typeUsername" class="form-control form-control-lg" name="price" value="{{ old('price') }}" />
                </div>
                @error('price')
                <span class="text-danger" style="font-size: 16px;">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category:</label>
                <select class="form-select" name="category_id" required>
                    <option value="" selected disabled>Select a category</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{$category->title}}</option>
                    <@endforeach </select>
            </div>
            <div class="mb-3">
                <label for="image1" class="form-label">Product Image</label>
                <input type="file" class="form-control" name="image">
            </div>
            <button type="submit" class="btn btn-primary btn-block" style="background-color: black; border-color: black;">
                Upload
            </button>
        </form>
    </div>


    <div class="container mt-5">
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Product ID</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            @foreach($products as $product)
            <tr>
                <th scope="row">{{$product->id}}</th>
                <td><img src="{{ asset('images/'.$product->image) }}" alt="" style="width: 100px;"></td>
                <td>{{$product->name}}</td>
                <td>Rs.<span>{{$product->price}}</span></td>
                <td>
                    <a href="/admin/products/{{ $product->id }}/edit" class="btn btn-sm btn-edit text-white"><i class="fas fa-edit"></i> Edit</a>
                    <!--Delete button-->
                    <form class="d-inline" action="/admin/products/{{$product->id}}/delete" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-delete text-white"><i class="fas fa-trash"></i> Delete</button>
                    </form>
                    <!--Upto here-->
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    @endsection