<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get("/login", [UserController::class, 'loginPage'])->name('login');
Route::post("/login", [UserController::class, 'loginUser']);
Route::post("/register", [UserController::class, 'registerUser']);
Route::get('/register', [UserController::class, 'registerPage']);

Route::middleware(['auth'])->group(function () {
  // yeha // paxi lekheko middleware haru vitra rakhe ho.. // auth lekheko auth middleware vitra rakhe // admin middleware lekheko admin middleware vitra rakhen
  Route::get("/carts/items", [CartController::class, 'getCartItems']); // auth
  Route::post("/cart/add/{product_id}", [CartController::class, 'addToCart']); // auth
  Route::post("/cart/remove/{product_id}", [CartController::class, 'removeFromCart']); // auth
  Route::post("/cart/order/{cart_id}", [CartController::class, 'orderItems']); // auth
  Route::get("/wishlist", [WishlistController::class, 'wishlistPage']);
  Route::post("/wishlist/add/{product_id}", [WishlistController::class, 'addToWishlist']);
  Route::post("/wishlist/remove/{product_id}", [WishlistController::class, 'removeFromWishList']);
});


Route::middleware(['auth', 'isAdmin'])->group(function () {
  Route::get("/ordered", [CartController::class, 'getOrderedItems']); // auth, admin
  Route::post("/cart/deliver/{cart_id}", [CartController::class, 'deliverItems']); // auth, admin

  Route::get("/admin/dashboard", [ProductController::class, 'dashboard']); // admin
  Route::get("/admin/products", [ProductController::class, 'adminProductPage']); // admin
  Route::get("/admin/products/{id}/edit", [ProductController::class, 'edit']); // admin
  Route::post("/admin/products/{id}/update", [ProductController::class, 'update']);  // admin
  Route::post("/admin/products/add", [ProductController::class, 'create']); // admin
  Route::post("/admin/products/{id}/delete", [ProductController::class, 'delete']); // admin

  Route::get("/admin/products/ordered", [CartController::class, 'adminOrderedProductPage'])->name("adminProductOrderedPage");
  Route::post("/admin/products/deliver", [CartController::class, 'deliverProduct']);
  Route::post("/cart/deliver/{cart_id}", [CartController::class, 'deliverItems']); // auth, admin'

});

//product 
Route::get('/', [ProductController::class, 'getProducts']);
Route::get('/product-details/{id}', [ProductController::class, 'productDetails']);

//Categories
Route::get('/categories/{category:title}', [CategoryController::class, 'getProductsByCategory']);
