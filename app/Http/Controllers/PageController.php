<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('customers.home');
    }

    public function about()
    {
        return view('customers.about');
    }

    public function contact()
    {
        return view('customers.contact');
    }
}
