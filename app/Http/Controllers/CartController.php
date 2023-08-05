<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function getOrderedItems()
    {
        $orderedItems = Cart::with('user')->where('ordered', true)->orderBy('delivered', 'asc')->get();
        return view('ordered_page');
    }

    public function getCartItems()
    {
        $cartItems = Cart::with('products')->where('user_id', Auth::user()->id)->get();
        dd($cartItems);
        // totalPrice, cartItems
        return view('cart_page');
    }

    public function addToCart(int $product_id)
    {
        $product = Product::findOrFail($product_id);
        $cart = new Cart;
        $cart->user_id = Auth::user()->id;
        $cart->product_id = $product->id;
        $cart->save();
    }

    public function removeFromCart(int $product_id)
    {
        $product = Product::findOrFail($product_id);
        $product->delete();
    }

    public function orderItems(int $cart_id)
    {
        $cart = Cart::findOrFail($cart_id);
        $cart->ordered = true;
        $cart->save();
    }

    public function deliverItems(int $cart_id)
    {
        $cart = Cart::findOrFail($cart_id);
        $cart->delivered = true;
        $cart->save();
    }
}
