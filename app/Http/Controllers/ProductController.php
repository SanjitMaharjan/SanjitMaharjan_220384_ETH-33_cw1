<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function getProducts(Request $request)
    {
        if ($request->get('search')) {
            $keyword = $request->get('search');
            $products = Product::where('name', 'like', $keyword . '%')->get();
        } else {
            $products = Product::all();
        }
        dd($products);
    }



    public function createProduct()
    {
        if (Auth::user()->username !== 'admin') {
            return view('errorPage');
        } else {
            $attributes = request()->validate([
                'title' => "required|max:255|unique:products,title",
                'description' => "required|min:3",
                'price' => "required"
            ]);
            Product::create($attributes);
        }
    }


    public function edit(Request $request, $id)
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
