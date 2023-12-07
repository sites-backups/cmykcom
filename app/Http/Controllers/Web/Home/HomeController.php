<?php

namespace App\Http\Controllers\Web\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(){
        return view('web.home.index');
        // return view('layouts.web_layout');
    }

    function contactUs(){
        return view('web.contactUs.index');
    }
}
