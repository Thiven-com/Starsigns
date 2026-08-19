<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Blog;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\Product;
use App\Models\Testimonial;
use App\Models\WishlistItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function home()
    {
        $banners = Banner::where('status', 'show')
            ->latest()
            ->get();
        $categories = Category::where('status', 'show')
            ->where('parent_id', 0)
            ->latest()
            ->get();
        $featuredProducts = Product::with(['variant'])
            ->where('status', 'show')
            ->where('is_feature', 'yes')
            ->latest()
            ->take(12)
            ->get();
        $blogs = Blog::where('status', 'show')
            ->latest()
            ->take(4)
            ->get();
        $testimonials = Testimonial::latest()
            ->take(8)
            ->get();

        return view('website.home', compact('banners', 'categories', 'featuredProducts', 'blogs', 'testimonials'));
    }

    public function shop(Request $request)
    {
        $query = Product::with(['category', 'variant'])->where('status', 'show');
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }
        if ($request->sort == 'low_high') {
            $query->join('product_variants', 'products.id', '=', 'product_variants.product_id')->orderBy('product_variants.price', 'asc')->select('products.*');
        } elseif ($request->sort == 'high_low') {
            $query->join('product_variants', 'products.id', '=', 'product_variants.product_id')->orderBy('product_variants.price', 'desc')->select('products.*');
        } else {
            $query->latest();
        }

        $products = $query->paginate(12)->withQueryString();
        $categories = Category::where('status', 'show')->where('parent_id', 0)->withCount('products')->get();
        return view('website.shop', compact('products', 'categories'));
    }


    public function about()
    {
        return view('website.about');
    }
    public function blog()
    {
        $blogs = Blog::with('category')
            ->where('status', 'show')
            ->latest()
            ->paginate(6);
        return view('website.blog', compact('blogs'));
    }
    public function blogDetails($slug)
    {
        $blog = Blog::with('category')
            ->where('slug', $slug)
            ->where('status', 'show')
            ->firstOrFail();

        return view('website.blog-details', compact('blog'));
    }
    public function terms()
    {
        return view('website.terms');
    }
    public function privacy_policy()
    {
        return view('website.privacy-policy');
    }

    // public function product()
    // {
    //     return view('website.product');
    // }
    public function productDetail($slug)
    {
        $product = Product::with([
            'category',
            'variants.media',
            'media'
        ])->where('slug', $slug)->where('status', 'show')->firstOrFail();

        $variant = $product->variant;

        $relatedProducts = Product::with(['category', 'variants'])
            ->where('status', 'show')
            ->where('is_feature', 'yes')
            ->latest()
            ->take(6)
            ->get();

        return view('website.product-detail', compact(
            'product',
            'variant',
            'relatedProducts'
        ));
    }

    public function cart(Request $request)
    {
        $query = CartItem::with([
            'variant.product'
        ]);

        if (Auth::check()) {
            $query->where('user_id', Auth::id());
        } else {
            $query->where('session_id', $request->session()->getId());
        }

        $cartItems = $query->get();

        $subtotal = 0;
        $originalTotal = 0;
        $totalQuantity = 0;

        foreach ($cartItems as $item) {

            $price = (float) $item->unit_price;

            $oldPrice = (float) (
                $item->variant->actual_price
                ?? $item->variant->seller_price
                ?? $price
            );

            $quantity = (int) $item->quantity;

            $subtotal += $price * $quantity;
            $originalTotal += $oldPrice * $quantity;
            $totalQuantity += $quantity;
        }

        $discount = $originalTotal - $subtotal;

        $shipping = $subtotal >= 999 ? 0 : 0;

        $total = $subtotal + $shipping;

        return view('website.cart', compact(
            'cartItems',
            'subtotal',
            'originalTotal',
            'discount',
            'shipping',
            'total',
            'totalQuantity'
        ));
    }

    public function checkout()
    {
        return view('website.checkout');
    }


    public function wishlist()
    {
        $customer = Auth::guard('customer')->user();

        if (!$customer) {
            return redirect()
                ->route('login')
                ->with('error', 'Please login first.');
        }

        $wishlistItems = WishlistItem::with([
            'variant.product'
        ])
            ->where('user_id', $customer->id)
            ->latest()
            ->get();

        return view('website.wishlist', compact('wishlistItems'));
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



    // public function blog_details()
    // {
    //     return view('website.blog-details');
    // }


    public function faq()
    {
        return view('website.faq');
    }

    public function shippolicy()
    {
        return view('website.shippolicy');
    }



    public function refundpolicy()
    {
        return view('website.refundpolicy');
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
