<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function getcategories()
    {
        $categories = Category::all();
        return view('layout',compact('categories'));
        

    }


    public function create()
    {
        $attributes = request()->validate([
            'title' => "required|max:255|unique:products,title",
            
        ]);
        Category::create($attributes);
    }

    public function edit(Request $req,$id)
    {
        $category = Category::find($id);
        if($category)
        {
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
        
        $products = $category->products;
        $categories = Category::all();
        return view('product', compact('products','categories'));
        
    }

}
