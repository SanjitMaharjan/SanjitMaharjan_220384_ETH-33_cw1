<html>
<title></title>

<body>
    <h1>NOt logged in</h1>
    @foreach($products as $product)
    {{ $product->name }}
    {{ $product->description }}
    {{ $product->price }}
    <img src="{{ asset('images/'.$product->image) }}" style="width: 100px">
    @endforeach
</body>

</html>