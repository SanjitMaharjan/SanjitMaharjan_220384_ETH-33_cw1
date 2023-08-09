@extends("admin_layout")

@section('content')


<div class="container mt-5 p-4 bg-light rounded shadow">
    <h2 class="text-center mb-4">Upload Product</h2>
    <form method="POST" action="/admin/products/{{$product->id}}/update" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Product Name:</label>
            <input type="text" id="typeUsername" class="form-control form-control-lg" name="name" value="{{ $product->name }}" />
            @error('name')
            <span class="text-danger" style="font-size: 16px;">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="details" class="form-label">Product Description:</label>
            <textarea class="form-control" name="description" rows="5" required>
            {{ $product->description }}
            </textarea>
            @error('description')
            <span class="text-danger" style="font-size: 16px;">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price:</label>
            <div class="input-group">
                <span class="input-group-text">Rs.</span>
                <input type="text" id="typeUsername" class="form-control form-control-lg" name="price" value="{{ $product->price }}" />
            </div>
            @error('price')
            <span class="text-danger" style="font-size: 16px;">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category:</label>
            <select class="form-select" name="category_id" required>
                <option value="" disabled>Select a category</option>
                @foreach($categories as $category)
                <option value="{{ $category->value }}" selected="{{ $category->value == $product->category_id }}">{{$category->title}}</option>
                <@endforeach </select>
        </div>
        <button type="submit" class="btn btn-primary btn-block" style="background-color: black; border-color: black;" name="Upload">
            update
        </button>
    </form>
</div>

@endsection