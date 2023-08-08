<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
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

Route::get("/", function () {
    return view('index');
});


Route::get('/login', [UserController::class, 'loginPage']);
Route::post("/login", [UserController::class, 'loginUser']);
Route::post("/register", [UserController::class, 'registerUser']);
Route::get('/register', [UserController::class, 'registerPage']);


// yeha // paxi lekheko middleware haru vitra rakhe ho.. // auth lekheko auth middleware vitra rakhe // admin middleware lekheko admin middleware vitra rakhen
Route::get("/carts/items", [CartController::class, 'getCartItems']); // auth
Route::get("/ordered", [CartController::class, 'getOrderedItems']); // auth, admin
Route::post("/cart/add/{product_id}", [CartController::class, 'addToCart']); // auth
Route::post("/cart/remove/{product_id}", [CartController::class, 'removeFromCart']); // auth
Route::post("/cart/order/{cart_id}", [CartController::class, 'orderItems']); // auth
Route::post("/cart/deliver/{cart_id}", [CartController::class, 'deliverItems']); // auth, admin

Route::get("/wishlist", [WishlistController::class, 'wishlistPage']);
Route::post("/wishlist/add/{product_id}", [WishlistController::class, 'addToWishlist']);
Route::post("/wishlist/remove/{product_id}", [WishlistController::class, 'removeFromWishList']);


Route::get("/admin/dashboard", [ProductController::class, 'dashboard']); // admin
Route::get("/admin/products", [ProductController::class, 'adminProductPage']); // admin
Route::get("/admin/products/{id}/edit", [ProductController::class, 'edit']); // admin
Route::post("/admin/products/{id}/update", [ProductController::class, 'update']);  // admin
Route::post("/admin/products/add", [ProductController::class, 'create']); // admin
Route::post("/admin/products/{id}/delete", [ProductController::class, 'delete']); // admin

Route::get("/admin/products/ordered", [CartController::class, 'adminOrderedProductPage'])->route("adminProductOrderedPage");
Route::post("/admin/products/deliver", [CartController::class, 'deliverProduct']);
