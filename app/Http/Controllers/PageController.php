<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('website.home');
    }

    public function shop()
    {
        return view('website.shop');
    }

    public function about()
    {
        return view('website.about');
    }


       public function consultation()
    {
        return view('website.consultation');
    }


    
       public function blog()
    {
        return view('website.blog');
    }
}
