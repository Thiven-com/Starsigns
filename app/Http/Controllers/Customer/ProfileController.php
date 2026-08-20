<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Order;
use App\Models\WishlistItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * My Account
     */
    public function myaccount()
    {
        /*
        |--------------------------------------------------------------------------
        | CUSTOMER AUTHENTICATION
        |--------------------------------------------------------------------------
        */

        if (!Auth::guard('customer')->check()) {

            return redirect()
                ->route('login')
                ->with(
                    'error',
                    'Please login to access your account.'
                );
        }


        $customer = Auth::guard('customer')->user();


        /*
        |--------------------------------------------------------------------------
        | ORDERS
        |--------------------------------------------------------------------------
        */

        $orders = Order::with([
            'items.productVariant.product'
        ])
            ->where(
                'customer_id',
                $customer->id
            )
            ->latest()
            ->get();


        /*
        |--------------------------------------------------------------------------
        | RECENT ORDERS
        |--------------------------------------------------------------------------
        */

        $recentOrders = $orders->take(3);


        /*
        |--------------------------------------------------------------------------
        | WISHLIST
        |--------------------------------------------------------------------------
        */

        $wishlistCount = WishlistItem::where(
            'user_id',
            $customer->id
        )->count();


        /*
        |--------------------------------------------------------------------------
        | ADDRESSES
        |--------------------------------------------------------------------------
        */

        $addresses = Address::where(
            'customer_id',
            $customer->id
        )
            ->latest()
            ->get();


        /*
        |--------------------------------------------------------------------------
        | STATS
        |--------------------------------------------------------------------------
        */

        $stats = [

            'orders' =>
                $orders->count(),

            'wishlist' =>
                $wishlistCount,

        ];


        /*
        |--------------------------------------------------------------------------
        | USER DATA
        |--------------------------------------------------------------------------
        |
        | Keep this structure because your existing Blade
        | uses $user['name'], $user['email'], etc.
        |
        */

        $user = [

            'id' =>
                $customer->id,

            'name' =>
                $customer->name,

            'email' =>
                $customer->email,

            'phone' =>
                $customer->mobile
                ?? $customer->phone
                ?? null,

        ];


        /*
        |--------------------------------------------------------------------------
        | RETURN VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            'website.myaccount',
            compact(
                'customer',
                'user',
                'stats',
                'orders',
                'recentOrders',
                'addresses'
            )
        );
    }

    public function edit()
    {
        if (!Auth::guard('customer')->check()) {
            return redirect()
                ->route('login')
                ->with('error', 'Please login first.');
        }

        $customer = Auth::guard('customer')->user();

        return view(
            'website.edit-profile',
            compact('customer')
        );
    }
    public function update(Request $request)
    {
        if (!Auth::guard('customer')->check()) {
            return redirect()
                ->route('login')
                ->with('error', 'Please login first.');
        }

        $customer = Auth::guard('customer')->user();


        $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                'unique:customers,email,' . $customer->id,
            ],

            'mobile' => [
                'nullable',
                'string',
                'max:20',
                'unique:customers,mobile,' . $customer->id,
            ],
        ]);


        $customer->name =
            $request->name;

        $customer->email =
            $request->email;

        $customer->mobile =
            $request->mobile;

        $customer->save();


        return redirect()
            ->route('myaccount')
            ->with(
                'success',
                'Profile updated successfully.'
            );
    }


}