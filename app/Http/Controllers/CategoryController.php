<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{

    public function getcategories()
    {
        $categories = Category::all();
        return view('layout', compact('categories'));
    }


    public function create()
    {
        $attributes = request()->validate([
            'title' => "required|max:255|unique:products,title",

        ]);
        Category::create($attributes);
    }

    public function edit(Request $req, $id)
    {
        $category = Category::find($id);
        if ($category) {
            $category->title = $req->title;
            $category->save();
        }
    }


    public function delete($id)
    {

        $category = Category::find($id);
        $category->delete();
    }

    public function getProductsByCategory(Category $category)
    {

        $products = [];
        foreach ($category->products as $product) {
            $product->cartAdded = (bool)Cart::where("product_id", $product->id)->where("user_id", Auth::user()->id)->count();
            $product->addedOnWishlist = (bool)Wishlist::where("product_id", $product->id)->where("user_id", Auth::user()->id)->count();
            array_push($products, $product);
        }
        $categories = Category::all();
        return view('product', compact('products', 'categories'));
    }
}
