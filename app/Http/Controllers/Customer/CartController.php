<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Add product to cart using AJAX
     */
    public function index()
    {
        if (!Auth::guard('customer')->check()) {
            return redirect()->route('login');
        }

        $customerId = Auth::guard('customer')->id();

        $cartItems = CartItem::where('user_id', $customerId)
            ->with([
                'variant.product'
            ])
            ->get();

        return view('website.cart', compact('cartItems'));
    }
    public function add(Request $request)
    {
        // Customer must be logged in
        if (!Auth::guard('customer')->check()) {
            return response()->json([
                'status' => false,
                'message' => 'Please login first.'
            ], 401);
        }

        // Validate request
        $request->validate([
            'product_variant_id' => 'required|exists:product_variants,id',
            'quantity' => 'nullable|integer|min:1'
        ]);

        $customerId = Auth::guard('customer')->id();
        $quantity = $request->quantity ?? 1;

        // Get variant
        $variant = ProductVariant::findOrFail(
            $request->product_variant_id
        );

        // Check stock
        if ($variant->stock <= 0) {
            return response()->json([
                'status' => false,
                'message' => 'Product is out of stock.'
            ]);
        }

        // Find existing cart item for this customer
        $cartItem = CartItem::where('user_id', $customerId)
            ->where('product_variant_id', $variant->id)
            ->first();

        $currentQuantity = $cartItem
            ? $cartItem->quantity
            : 0;

        $finalQuantity = $currentQuantity + $quantity;

        // Stock check
        if ($finalQuantity > $variant->stock) {
            return response()->json([
                'status' => false,
                'message' => 'Only ' . $variant->stock . ' items available.'
            ]);
        }

        // Update existing cart item
        if ($cartItem) {

            $cartItem->quantity = $finalQuantity;
            $cartItem->unit_price = $variant->price;
            $cartItem->save();

        } else {

            // Create new cart item
            CartItem::create([
                'user_id' => $customerId,
                'session_id' => null,
                'product_variant_id' => $variant->id,
                'quantity' => $quantity,
                'unit_price' => $variant->price
            ]);
        }

        // Total cart quantity
        $count = CartItem::where('user_id', $customerId)
            ->sum('quantity');

        return response()->json([
            'status' => true,
            'message' => 'Product added to cart.',
            'count' => $count
        ]);
    }


    /**
     * Update cart quantity
     */
    public function update(Request $request)
    {
        if (!Auth::guard('customer')->check()) {
            return response()->json([
                'success' => false,
                'message' => 'Please login first.'
            ], 401);
        }

        $request->validate([
            'id' => 'required|exists:cart_items,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $customerId = Auth::guard('customer')->id();

        $cartItem = CartItem::where('id', $request->id)
            ->where('user_id', $customerId)
            ->firstOrFail();

        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        return response()->json([
            'success' => true,
            'message' => 'Cart updated successfully.'
        ]);
    }


    /**
     * Remove cart item
     */
    public function remove($id)
    {
        if (!Auth::guard('customer')->check()) {
            return response()->json([
                'success' => false,
                'message' => 'Please login first.'
            ], 401);
        }

        $customerId = Auth::guard('customer')->id();

        $cartItem = CartItem::where('id', $id)
            ->where('user_id', $customerId)
            ->first();

        if (!$cartItem) {
            return response()->json([
                'success' => false,
                'message' => 'Cart item not found.'
            ], 404);
        }

        $cartItem->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product removed from cart.'
        ]);
    }


    /**
     * Cart count
     */
    public function count()
    {
        if (!Auth::guard('customer')->check()) {
            return response()->json([
                'count' => 0
            ]);
        }

        $customerId = Auth::guard('customer')->id();

        $count = CartItem::where('user_id', $customerId)
            ->sum('quantity');

        return response()->json([
            'count' => $count
        ]);
    }
}