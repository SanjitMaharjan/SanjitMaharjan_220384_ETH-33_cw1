<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function dashboard()
    {
        $productCount = Product::count();
        $noOfDeliveries = Cart::where('delivered', true)->count();
        $noOfOrdersLeft = Cart::where('delivered', false)->count();
        return view('admin_dashboard', [
            "no_of_products" => $productCount,
            "no_of_deliveries" => $noOfDeliveries,
            "no_of_orders" => $noOfOrdersLeft,
            "income" => "Rs. 1200"
        ]);
    }

    public function adminProducts(Request $request)
    {
        $carts = Cart::with('products')->get();
        $products = [];
        foreach ($carts as $cart) {
            foreach ($cart->products as $product) {
                array_push($products, $product);
            }
        }
        return view('admin_product');
    }

    public function getProducts(Request $request)
    {
        if ($request->get('search')) {
            $keyword = $request->get('search');
            $products = Product::where('name', 'like', $keyword . '%')->get();
        } else {
            $products = Product::all();
        }
        return view('index', compact($products));
    }

    public function getProduct(int $id)
    {
        return Product::find($id);
    }

    public function addPage()
    {
        return view('admin_add');
    }

    public function createProduct()
    {
        $attributes = request()->validate([
            'title' => "required|max:255|unique:products,title",
            'description' => "required|min:3",
            'price' => "required"
        ]);
        Product::create($attributes);
        session()->flash('info', "Product added successfully");
        return view("admin_add");
    }

    public function edit(int $id)
    {
        $product = Product::findOrFail($id);
        return view('edit_product_page', compact($product));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->title = $request->title;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->save();
        } else {
            return view('error page');
        }
    }

    public function delete($id)
    {
        $product = product::find($id);
        $product->delete();
    }
}
