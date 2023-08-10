<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\User;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class ProductController extends Controller
{

    public function dashboard()
    {
        $productCount = Product::count();
        $noOfDeliveries = Cart::where('delivered', true)->count();
        $deliveredItems = Cart::where('delivered', true)->get();
        $customerCount = User::where("is_admin", false)->count();
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
            "income" => "Rs. $price",
            "customerCount" => $customerCount
        ]);
    }


    public function getProducts(Request $request)
    {
        $productFromQuery = [];
        $carouselProducts = [];
        $searching = false;
        // dd($request->all());
        if (request()->get('search')) {
            $searching = true;
            $keyword = request()->get('search');
            $productFromQuery = Product::where('name', 'like', '%'. $keyword . '%')->get();
        } else {
            $productFromQuery = Product::all();
            $carouselProducts = Product::orderBy('created_at', 'desc')->get()->take(5);
        }

        $products = [];
        foreach ($productFromQuery as $product) {
            $product->cartAdded = (bool)Cart::where("product_id", $product->id)->where("user_id", Auth::user()->id)->where('ordered', false)->count();
            $product->addedOnWishlist = (bool)Wishlist::where("product_id", $product->id)->where("user_id", Auth::user()->id)->count();
            array_push($products, $product);
        }
        $categories = Category::all();


        return view('dashboard', compact('searching', 'carouselProducts', 'products', 'categories'));
    }


    public function getProduct(int $id)
    {
        return Product::find($id);
    }

    public function adminProductPage()
    {
        $products = Product::all();
        $categories = Category::all();
        return view('admin_product', compact("products", "categories"));
    }

    public function create()
    {
        $attributes = request()->validate([
            'name' => "required|max:255|unique:products,name",
            'description' => "required|min:3",
            'price' => "required",
            "category_id" => "required"
        ]);
        $imageName = time() . '.' . request()->image->extension();
        request()->file('image')->move(public_path("images"), $imageName);
        $attributes['image'] = $imageName;
        Product::create($attributes);
        session()->flash('info', "Product added successfully");
        return redirect("/admin/products");
    }

    public function edit(int $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin_edit_product', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();
        session()->flash('success', "Product updated successfully");
        return redirect("/admin/products");
    }

    public function delete($id)
    {

        $product = product::find($id);
        $product->delete();
        session()->flash('danger', "Product deleted successfully");
        return redirect("/admin/products");
    }



    public function productDetails($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('productDetails', compact('product', 'categories'));
    }
}
