<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
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
Route::post("/cart/remove/{product_id}", [CartController::class, 'removeFromCart']); // auth

Route::middleware(['auth'])->group(function () {

    Route::get("/logout", [UserController::class, 'logout']);
    //product 
    Route::get('/dashboard', [ProductController::class, 'getProducts']);
    Route::get('/product-details/{id}', [ProductController::class, 'productDetails']);

    //Categories
    Route::get('/categories/{category:title}', [CategoryController::class, 'getProductsByCategory']);

    Route::get("/cart", [CartController::class, 'getCartItems']);
    Route::get("/cart/checkout", [CartController::class, 'checkout']);
    Route::post("/cart/add/{product_id}", [CartController::class, 'addToCart']);
    Route::post("/cart/order/{cart_id}", [CartController::class, 'orderItems']);
    Route::get("/wishlist", [WishlistController::class, 'wishlistPage']);
    Route::post("/wishlist/add/{product_id}", [WishlistController::class, 'addToWishlist']);
    Route::post("/wishlist/remove/{product_id}", [WishlistController::class, 'removeFromWishList']);
});

Route::get("/", function () {
    if (Auth::check()) {
        return redirect("/dashboard");
    }
    $products = Product::all();
    return view("not_login_dashboard", compact('products'));
});

Route::get("/about", function () {
    if(Auth::check()) {
        $categories = Category::all();
        return view("about", compact('categories'));
    }
    return view("not_logged_in_about");
});


Route::get("/help", function () {
    if(Auth::check()) {
        $categories = Category::all();
        return view("helpus", compact('categories'));
    }
    return view("not_logged_in_help");
});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get("/ordered", [CartController::class, 'getOrderedItems']); // auth, admin
    Route::post("/cart/deliver/{cart_id}", [CartController::class, 'deliverItems']); // auth, admin

    Route::get("/admin/customers", [UserController::class, 'customerPage']);;
    Route::get("/admin/dashboard", [ProductController::class, 'dashboard']); // admin
    Route::get("/admin/products", [ProductController::class, 'adminProductPage']); // admin
    Route::get("/admin/products/{id}/edit", [ProductController::class, 'edit']); // admin
    Route::post("/admin/products/{id}/update", [ProductController::class, 'update']);  // admin
    Route::post("/admin/products/add", [ProductController::class, 'create']); // admin
    Route::post("/admin/products/{id}/delete", [ProductController::class, 'delete']); // admin

    Route::get("/admin/users", [UserController::class, 'addAdminUserPage']);
    Route::post("/admin/users/{id}/delete", [UserController::class, 'removeAdminUser']);
    Route::post("/admin/users/add", [UserController::class, 'addAdminUser']);

    Route::get("/admin/products/ordered", [CartController::class, 'adminOrderedProductPage'])->name("adminProductOrderedPage");
    Route::post("/admin/products/{cart_id}/deliver", [CartController::class, 'deliverProduct']);
    Route::post("/cart/deliver/{cart_id}", [CartController::class, 'deliverItems']); // auth, admin'

});
