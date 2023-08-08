<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function adminOrderedProductPage()
    {
        $carts = Cart::with('products')->get();
        $products = [];
        foreach ($carts as $cart) {
            foreach ($cart->products as $product) {
                array_push($products, [
                    "id" => $product->id,
                    "cart_id" => $cart->id,
                    "name" => $product->name,
                    "price" => $product->price,
                    'delivered' => $cart->delivered,
                    'user_name' => $cart->user->name,
                    'user_number' => $cart->user->phone_number,
                ]);
            }
        }
        // dd($products);
        return view('admin_product_ordered', ['products' => $products]);
    }

    public function deliverProduct(int $cart_id)
    {
        $cart = Cart::findOrFail($cart_id);
        if ($cart) {
            $cart->delivered = true;
            $cart->save();
            return redirect(route('adminProductOrderedPage'));
        }
    }

    public function checkout()
    {
        $carts = Cart::where("user_id", Auth::user()->id)->get();
        foreach ($carts as $cart) {
            $cart->ordered = true;
            $cart->save();
        }
        return redirect("/")->with("success", "Successfully checked out");
    }

    public function getCartItems()
    {
        $cartItems = Cart::where('user_id', Auth::user()->id)->where('ordered', false)->get();
        $products = [];
        $totalPrice = 0;
        foreach ($cartItems as $cartItem) {
            foreach ($cartItem->products as $product) {
                array_push($products, $product);
                $totalPrice += $product->price;
            }
        }
        return view('cart_page', compact('products', 'totalPrice'));
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
        $product = Cart::where('product_id', $product_id)->first();
        $product->delete();
        return redirect(back());
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
