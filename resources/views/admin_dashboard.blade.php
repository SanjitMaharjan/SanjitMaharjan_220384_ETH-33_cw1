@extends('admin_layout')

@section('content')

<h1>Admin Dashboard</h1>
<div class="row gx-5">
  <div class="col-sm-12 col-md-6 col-lg-4 coll">
    <a href="/admin/products" style="text-decoration:none;color:white;" class="p-card card1">
      <span class="icon">
        <i class="fa-solid fa-boxes-stacked"></i>
      </span>
      <h1 class="number">{{ $no_of_products }}</h1>
      <p class="text-lg">Total Products</p>
    </a>
  </div>
  <div class="col-sm-12 col-md-6 col-lg-4 coll">
    <a href="/admin/products/ordered" style="text-decoration:none; color:white;" class="p-card card2">
      <span class="icon">
        <i class="fa-solid fa-box-open"></i>
      </span>
      <h1 class="number">{{ $no_of_orders }}</h1>
      <p class="text-lg">Orders Left</p>
    </a>
  </div>
  <div class="col-sm-12 col-md-6 col-lg-4 coll">
    <div class="p-card card3">
      <span class="icon">
        <i class="fa-solid fa-boxes-packing"></i>
      </span>
      <h1 class="number">{{ $no_of_deliveries }}</h1>
      <p class="text-lg">Total Delivered</p>
    </div>
  </div>
  <div class="col-sm-12 col-md-6 col-lg-4 coll">
    <div class="p-card card4">
      <span class="icon">
        <i class="fa-solid fa-coins"></i>
      </span>
      <h1 class="number">{{ $income }}</h1>
      <p class="text-lg">Total Income</p>
    </div>
  </div>
  <div class="col-sm-12 col-md-6 col-lg-4 coll">
    <a href="/admin/customers" style="text-decoration:none; color:white;" class="p-card card5">
      <span class="icon">
        <i class="fa-solid fa-users"></i>
      </span>
      <h1 class="number">{{ $customerCount }}</h1>
      <p class="text-lg">Total Customers</p>
    </a>
  </div>
</div>




<style>
  .p-card {
    display: flex;
    position: relative;
    padding-top: 2.5rem;
    padding-bottom: 2.5rem;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    border-radius: 0.25rem;
    text-align: center;
    color: #ffffff;
    transition: all 300ms ease;
    box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
  }

  .p-card:hover {
    transform: scale(1.05);
  }

  .card1 {
    background: linear-gradient(180deg, #4286f4, #373b44);
  }

  .card2 {
    background: linear-gradient(180deg, #2ebf91, #8360c3);
  }

  .card3 {
    background: linear-gradient(180deg, #240b36, #c31432);
  }

  .card4 {
    background: linear-gradient(0deg, #31b7c2, #7bc393);
  }

  .card5 {
    background: linear-gradient(90deg, #bc4e9c, #f80759);
  }

  .coll {
    padding-top: 15px;
    padding-bottom: 15px;
  }

  .icon {
    top: 1rem;
    left: 1rem;
    font-size: 1.875rem;
    line-height: 2.25rem;
    opacity: 0.7;
  }

  .number {
    margin-bottom: 0.25rem;
    font-size: 2.25rem;
    line-height: 2.5rem;
    font-weight: 700;
  }

  .title {
    font-size: 1rem;
  }
</style>

@endsection