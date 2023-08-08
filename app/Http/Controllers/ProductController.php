<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function dashboard()
    {
        $productCount = Product::count();
        $noOfDeliveries = Cart::where('delivered', true)->count();
        $deliveredItems = Cart::where('delivered', true)->get();
        $price = 0;
        foreach ($deliveredItems as $item) {
            foreach ($item->products as $product) {
                $price += $product->price;
            }
        }
        $noOfOrdersLeft = Cart::where('delivered', false)->count();
        return view('admin_dashboard', [
            "no_of_products" => $productCount,
            "no_of_deliveries" => $noOfDeliveries,
            "no_of_orders" => $noOfOrdersLeft,
            "income" => "$ $price"
        ]);
    }

    public function getProducts(Request $request)
    {
        if (request('search')) {
            $keyword = request('search');
            $products = Product::where('name', 'like', $keyword . '%')->get();
        } else {
            $products = Product::all();
        }
        $categories = Category::all();


        return view('product', compact('products', 'categories'));
    }

    public function getProduct(int $id)
    {
        return Product::find($id);
    }

    public function create()
    {
        $attributes = request()->validate([
            'title' => "required|max:255|unique:products,title",
            'description' => "required|min:3",
            'price' => "required"
        ]);
        Product::create($attributes);
        session()->flash('info', "Product added successfully");
        return view("admin_product");
    }

    public function edit(int $id)
    {
        $product = Product::findOrFail($id);
        return view('admin_edit_product', compact($product));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();
        session()->flash('info', "Product updated successfully");
        return view("admin_product");
    }

    public function delete($id)
    {
        $product = product::find($id);
        $product->delete();
        session()->flash('info', "Product updated successfully");
        return view("admin_product");
    }
}
