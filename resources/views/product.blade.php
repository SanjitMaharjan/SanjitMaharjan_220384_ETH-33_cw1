@extends('components.layout')
@section('content')
<div class="container-fluid">
    <div class="container">
        <div class="row">
            @foreach($products as $product)
            <div class="card col-lg-3 col-md-6 col-sm-12">
                @include('Components.ProductBody')
            </div>

            @endforeach
        </div>
    </div>
</div>

@endsection