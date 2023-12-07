<?php

use App\Models\Product;
use App\Models\Category;


// get nav Bar Products
if (! function_exists('get_prod')) {
    function get_prod() {
        $product = Product::where('status', 1)->where('is_nav',1)->get();
        return $product;
    }
}


// get nav bar categories


if (! function_exists('get_category')) {
    function get_category() {
        $category = Category::where('status', 1)->where('is_nav',1)->get();
        return $category;
    }
}
