<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\WishlistItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Log;
use RealRashid\SweetAlert\Facades\Alert;

class WishlistController extends Controller
{
    public function index()
    {
        $customer = Auth::guard('customer')->user();

        if (!$customer) {
            return redirect()->route('login');
        }

        $wishlistItems = WishlistItem::with([
            'variant.product'
        ])
            ->where('user_id', $customer->id)
            ->latest()
            ->get();

        return view('website.wishlist', compact('wishlistItems'));
    }
    public function add(Request $request)
    {

        try {

            Log::info('Wishlist request', [
                'data' => $request->all(),
                'customer_id' => Auth::guard('customer')->id(),
            ]);

            $customer = Auth::guard('customer')->user();

            if (!$customer) {
                return response()->json([
                    'status' => false,
                    'message' => 'Please login first.'
                ], 401);
            }

            $request->validate([
                'product_variant_id' => 'required|integer'
            ]);

            $wishlist = WishlistItem::where('user_id', $customer->id)
                ->where('product_variant_id', $request->product_variant_id)
                ->first();

            if ($wishlist) {
                return response()->json([
                    'status' => false,
                    'message' => 'Already added to wishlist.'
                ]);
            }

            WishlistItem::create([
                'user_id' => $customer->id,
                'product_variant_id' => $request->product_variant_id,
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Added to wishlist successfully.'
            ]);

        } catch (\Throwable $e) {

            Log::error('Wishlist Add Error', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function remove($id)
    {
        if (!Auth::guard('customer')->check()) {
            return response()->json([
                'status' => false,
                'message' => 'Please login first.'
            ], 401);
        }

        $customerId = Auth::guard('customer')->id();

        $wishlistItem = WishlistItem::where('user_id', $customerId)
            ->where('id', $id)
            ->first();

        if (!$wishlistItem) {
            return response()->json([
                'status' => false,
                'message' => 'Wishlist item not found.'
            ], 404);
        }

        $wishlistItem->delete();

        $count = WishlistItem::where('user_id', $customerId)->count();

        return response()->json([
            'status' => true,
            'message' => 'Removed from wishlist successfully.',
            'count' => $count
        ]);
    }

}
