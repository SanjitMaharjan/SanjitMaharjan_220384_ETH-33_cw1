<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{

    public function wishlistPage()
    {
        $items = Wishlist::with('products')->where('user_id', Auth::user()->id)->get();
        dump($items);
        return view('wishlist', compact($items));
    }

    public function addToWishlist($product_id)
    {
        $product = Product::findOrFail($product_id);
        $wishlist = new Wishlist();
        $wishlist->product_id = $product;
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
