<?php

namespace App\Http\Controllers\Web\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCategories;


class ItemController extends Controller
{
    public function categoryList(){
        $category = Category::get();
        // return $category;
        return view('web.categories.index',get_defined_vars());
    }
    public function productCategory($slug)
    {
        // return $slug;
        $category_id = Category::where('slug',$slug)->first();
        $category_name  =   $category_id->name;

        $single_id = $category_id->id;
        $products = ProductCategories::with('product')->where('category_id',$single_id)->get();
        // return $products->product->images->thumbnail;
        // return $category_name;


        // return $products;
        // return $productCategory->category[0];
        return view('web.product.index',get_defined_vars());
    }
    public function productDetail($slug)
    {
        // return $slug;
        $product = Product::with('images','categories','meta','faqs','specs')->where('slug',$slug)->first();
        // return $product;
        $prod_name = Product::get(['id','prod_title']);
        // return $prod_name;
        // return $prod_name[0]->prod_title;
        return view('web.product.productDetail',get_defined_vars());
    }
}
