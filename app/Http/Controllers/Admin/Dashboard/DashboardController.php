<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Admin Login Page

    public function Login()
    {
        return view('auth.login');
    }


    // Dashboard Home Page

    public function dashboard()
    {
        return view('admin.dashboard.index');
    }
}
