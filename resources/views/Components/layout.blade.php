<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <title>Hamro Bazaar</title>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="/">Hamro <span style="color: Brown;">Bazaar</span></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Catagories</a>
            <div class="dropdown-menu bg-dark">
              <!--Drop Down Menu here-->
              @foreach($categories as $category)
              <a href="/categories/{{$category->title}}" name="search" class="dropdown-item " style="color: bisque;">{{$category->title}}</a>
              @endforeach
              <!--Yeta samma -->
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/about">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/help">Help</a>
          </li>

          @if(auth()->check() && auth()->user()->is_admin)
          {
          <li class="nav-item">
            <a class="nav-link" href="/admin/dashboard">Admin pannel</a>
          </li>
          }
          @endif

        </ul>

        <form class="form-inline mt-2 mt-md-0" action="/" method="GET">
          <input class="form-control mr-sm-2" name="search" type="text" value="{{request('search')}}" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <ul class="navbar-nav mr-right">

          <li class="nav-item">
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/wishlist" title="Wishlist">
              <i class="fa-regular fa-heart" style="font-size: 20px;"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/cart" title="Cart">
              <i class="fa-solid fa-cart-shopping" style="font-size: 20px;"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/logout" title="Logout">
              <i class="fa-solid fa-right-from-bracket" style="font-size: 20px;"></i>
            </a>
          </li>

        </ul>
      </div>
    </nav>
  </header>

  <section class="container mt-3">
    @if($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ $message }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @elseif($message = Session::get('info'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
      {{ $message }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @elseif($message = Session::get('danger'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ $message }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
  </section>


  @yield('content')
  <!-- Optional JavaScript -->

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->


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

    async function addToWishlist(event, product_id) {
      event.target.parentElement.innerHTML = `<i class="fa-solid fa-heart" onclick="removeFromWishlist(event, ${product_id})"></i>`;
      await fetch(`/wishlist/add/${product_id}`, {
        method: "POST",
        credentials: "same-origin",
        headers: {
          'Content-Type': 'application/json',
          "X-CSRF-Token": '{{ csrf_token() }}'
        },
      });
    }

    async function removeFromWishlist(event, product_id) {
      event.target.parentElement.innerHTML = `<i class="fa-regular fa-heart" onclick="addToWishlist(event, ${product_id})"></i>`;
      await fetch(`/wishlist/remove/${product_id}`, {
        method: "POST",
        credentials: "same-origin",
        headers: {
          'Content-Type': 'application/json',
          "X-CSRF-Token": '{{ csrf_token() }}'
        },
      });
      document.getElementById(`wishlist-card-${product_id}`)?.remove();
    }
  </script>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>