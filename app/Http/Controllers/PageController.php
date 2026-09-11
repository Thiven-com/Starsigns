<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Blog;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Product;
use App\Models\Subscription;
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
        $query = Product::query()
            ->with([
                'category',
                'variant'
            ])
            ->where('status', 'show');


        /*
        |--------------------------------------------------------------------------
        | CATEGORY FILTER
        |--------------------------------------------------------------------------
        */

        if ($request->filled('category')) {

            $query->where(
                'category_id',
                $request->category
            );
        }
        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('title', 'like', '%' . $search . '%')

                    ->orWhere('description', 'like', '%' . $search . '%')

                    ->orWhereHas('category', function ($categoryQuery) use ($search) {

                        $categoryQuery->where(
                            'title',
                            'like',
                            '%' . $search . '%'
                        );

                    });

            });

        }


        /*
        |--------------------------------------------------------------------------
        | SORT FILTER
        |--------------------------------------------------------------------------
        */

        if ($request->sort === 'low_high') {

            $query->orderBy(
                \App\Models\ProductVariant::select('price')
                    ->whereColumn(
                        'product_variants.product_id',
                        'products.id'
                    )
                    ->orderBy('price', 'asc')
                    ->limit(1),
                'asc'
            );

        } elseif ($request->sort === 'high_low') {

            $query->orderBy(
                \App\Models\ProductVariant::select('price')
                    ->whereColumn(
                        'product_variants.product_id',
                        'products.id'
                    )
                    ->orderBy('price', 'desc')
                    ->limit(1),
                'desc'
            );

        } else {

            $query->latest();
        }


        $products = $query
            ->paginate(12)
            ->withQueryString();


        $categories = Category::where('status', 'show')
            ->where('parent_id', 0)
            ->withCount([
                'products' => function ($query) {
                    $query->where('status', 'show');
                }
            ])
            ->get();


        return view(
            'website.shop',
            compact(
                'products',
                'categories'
            )
        );
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

    public function checkout(Request $request)
    {
        $customer = Auth::guard('customer')->user();

        if (!$customer) {
            return redirect()
                ->route('customer.login')
                ->with('error', 'Please login to continue.');
        }

        $cartItems = CartItem::with([
            'variant.product'
        ])
            ->where('user_id', $customer->id)
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()
                ->route('cart')
                ->with('error', 'Your cart is empty.');
        }

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

        $discount = max(
            0,
            $originalTotal - $subtotal
        );

        // Free shipping
        $shipping = 0;

        $total = $subtotal + $shipping;

        $addresses = $customer->addresses()
            ->latest()
            ->get();

        return view('website.checkout', compact(
            'customer',
            'cartItems',
            'addresses',
            'subtotal',
            'originalTotal',
            'discount',
            'shipping',
            'total',
            'totalQuantity'
        ));
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
    public function storeAddress(Request $request)
    {
        $customer = Auth::guard('customer')->user();

        if (!$customer) {
            return response()->json([
                'success' => false,
                'message' => 'Please login first.'
            ], 401);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|digits:10',
            'address' => 'required|string',
            'address_2' => 'nullable|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'pincode' => 'required|digits:6',
            'country' => 'required|string|max:100',
        ]);

        $address = $customer->addresses()->create([
            'name' => $validated['name'],
            'mobile' => $validated['mobile'],
            'address' => $validated['address'],
            'address_2' => $validated['address_2'] ?? null,
            'city' => $validated['city'],
            'state' => $validated['state'],
            'pincode' => $validated['pincode'],
            'country' => $validated['country'],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Address added successfully.',
            'address' => $address,
        ], 200);
    }

    public function subscriptionStore(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make(
            $request->all(),
            [
                'email' => 'required|email|max:255',
            ]
        );

        if ($validator->fails()) {

            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first('email'),
            ], 422);
        }

        $email = strtolower(trim($request->email));

        $exists = Subscription::where('email', $email)->exists();

        if ($exists) {

            return response()->json([
                'status' => false,
                'message' => 'This email is already subscribed.'
            ], 422);
        }

        Subscription::create([
            'email' => $email,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Thank you for subscribing to our newsletter!'
        ], 200);
    }

    public function contactStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect()
            ->route('contact')
            ->with('success', 'Thank you! Your message has been sent successfully.');
    }
}
