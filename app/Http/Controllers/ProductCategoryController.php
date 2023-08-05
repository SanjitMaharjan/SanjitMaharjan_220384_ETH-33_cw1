<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

// TODO: getCategoryFromPostId
// category id rw post id hunxa tesbatw create garne
class ProductCategoryController extends Controller
{
    public function getPostFromCategoryId(int $category_id)
    {
        $product_ids = ProductCategory::where('category_id', $category_id)->get('product_id');
        dd($product_ids);
        $products = [];
        foreach ($product_ids as $product_id) {
            $product = Product::find($product_id);
            if ($product)
                array_push($products, $product);
        }
        return $products;
    }
}
