<?php

namespace App\Http\Controllers\Web\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Product;

class FrontendHomeController extends Controller
{
    function index(){
        $products = Product::with('images')->limit(8)->get();
        return view('web.home.index',get_defined_vars());
        // return view('layouts.web_layout');
    }
    public function searchItem(Request $request){

        // return $request;
        $search = $request->input('search') ? $request->input('search') : '';
        $count = Product::where('prod_title', 'like', '%' . $search . '%')->count();
        // return $count;
        $products = Product::with('images','categories')->where('prod_title', 'like', '%' . $search . '%')->get();
        // return $products[0];

        return view('web.search.index',get_defined_vars());

    }

    function contactUs(){
        return view('web.contactUs.index');
    }

    function aboutUS(){
        return view('web.aboutUs.index');
    }

    function quote(){
        return view('web.forms.getQuote');
    }

    function blogList(){
        $blog = Blog::get();
        // return $blog;
        return view('web.blog.index',get_defined_vars());
    }
    function blogDetail($slug){
        // return $slug;
        $blog = Blog::where('slug',$slug)->first();
        // return $blog;
        return view('web.blog.blogdetail',get_defined_vars());
    }

}
