<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{

    public function wishlistPage()
    {
        $items = Wishlist::where('user_id', Auth::user()->id)->get();
        $products = [];
        foreach ($items as $item) {
            $item->product->cartAdded = (bool)Cart::where("product_id", $item->product->id)->where("user_id", Auth::user()->id)->count();
            $item->product->addedOnWishlist = (bool)Wishlist::where("product_id", $item->product->id)->where("user_id", Auth::user()->id)->count();
            array_push($products, $item->product);
        }
        $categories = Category::all();

        return view('wishlist', ['products' => $products, "categories" => $categories]);
    }

    public function addToWishlist($product_id)
    {
        $product = Product::findOrFail($product_id);
        $wishlist = new Wishlist();
        $wishlist->product_id = $product->id;
        $wishlist->user_id = Auth::user()->id;
        $wishlist->save();
    }

    public function removeFromWishList($product_id)
    {
        $product = Product::findOrFail($product_id);
        $wishlist = Wishlist::where('product_id', $product->id)->first();
        if ($wishlist) {
            $wishlist->delete();
        }
    }
}
