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
       public function blog()
    {
        return view('website.blog');
    }



     
       public function product()
    {
        return view('website.product');
    }

       public function cart()
    {
        return view('website.cart');
    }

        public function checkout()
    {
        return view('website.checkout');
    }

    
        public function wishlist()
    {
        return view('website.wishlist');
    }


         public function orders()
    {
        return view('website.orders');
    }

       public function contact()
    {
        return view('website.contact');
    }



      public function myaccount()
    {
        return view('website.myaccount');
    }


       public function login()
    {
        return view('website.login');
    }



       public function register()
    {
        return view('website.register');
    }


    
       public function blog_details()
    {
        return view('website.blog-details');
    }
    //    public function consultation()
    // {
    //     return view('website.consultation');
    // }


   
    //     public function offers()
    // {
    //     return view('website.offers');
    // }
}
