<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Customer;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    /**
     * Address listing page
     * Create + Edit are handled on this same page.
     */
    public function addresses(Request $request)
    {
        if (!Auth::guard('customer')->check()) {
            return redirect()
                ->route('login')
                ->with('error', 'Please login first.');
        }

        $userId = Auth::guard('customer')->id();

        $customer = Customer::findOrFail($userId);

        $addresses = Address::where(
            'customer_id',
            $userId
        )
        ->latest()
        ->get();

        return view(
            'website.addresses',
            compact(
                'customer',
                'addresses'
            )
        );
    }


    /**
     * Store new address
     */
    public function storeAddress(Request $request)
    {
        if (!Auth::guard('customer')->check()) {
            return redirect()
                ->route('login')
                ->with('error', 'Please login first.');
        }

        $userId = Auth::guard('customer')->id();

        $request->validate([
            'name' => 'required|string|max:255',

            'gst' => 'nullable|string|max:100',

            'mobile' => 'required|string|max:20',

            'alternate_mobile' => 'nullable|string|max:20',

            'email' => 'nullable|email|max:255',

            'pincode' => 'required|string|max:10',

            'city' => 'required|string|max:255',

            'landmark' => 'nullable|string|max:255',

            'state' => 'required|string|max:255',

            'address' => 'required|string|max:500',

            'address_2' => 'nullable|string|max:500',
        ]);


        Address::create([
            'name' => $request->name,

            'gst' => $request->gst,

            'mobile' => $request->mobile,

            'alternate_mobile' =>
                $request->alternate_mobile,

            'email' => $request->email,

            'pincode' => $request->pincode,

            'city' => $request->city,

            'landmark' => $request->landmark,

            'state' => $request->state,

            'address' => $request->address,

            'address_2' => $request->address_2,

            'customer_id' => $userId,
        ]);


        return redirect()
            ->route('customer.addresses')
            ->with(
                'success',
                'Address added successfully.'
            );
    }


    /**
     * Update existing address
     */
    public function addressupdate(
        Request $request,
        $id
    ) {
        if (!Auth::guard('customer')->check()) {
            return redirect()
                ->route('login')
                ->with('error', 'Please login first.');
        }

        $userId = Auth::guard('customer')->id();


        $request->validate([
            'name' => 'required|string|max:255',

            'gst' => 'nullable|string|max:100',

            'mobile' => 'required|string|max:20',

            'alternate_mobile' => 'nullable|string|max:20',

            'email' => 'nullable|email|max:255',

            'pincode' => 'required|string|max:10',

            'city' => 'required|string|max:255',

            'landmark' => 'nullable|string|max:255',

            'state' => 'required|string|max:255',

            'address' => 'required|string|max:500',

            'address_2' => 'nullable|string|max:500',
        ]);


        /*
        |--------------------------------------------------------------------------
        | Important:
        | Only allow the logged-in customer to update their own address.
        |--------------------------------------------------------------------------
        */

        $address = Address::where('id', $id)
            ->where(
                'customer_id',
                $userId
            )
            ->firstOrFail();


        $address->update([
            'name' => $request->name,

            'gst' => $request->gst,

            'mobile' => $request->mobile,

            'alternate_mobile' =>
                $request->alternate_mobile,

            'email' => $request->email,

            'pincode' => $request->pincode,

            'city' => $request->city,

            'landmark' => $request->landmark,

            'state' => $request->state,

            'address' => $request->address,

            'address_2' => $request->address_2,
        ]);


        return redirect()
            ->route('customer.addresses')
            ->with(
                'success',
                'Address updated successfully.'
            );
    }


    /**
     * Delete address
     */
    public function destroy($id)
    {
        if (!Auth::guard('customer')->check()) {
            return redirect()
                ->route('login')
                ->with('error', 'Please login first.');
        }


        $userId = Auth::guard('customer')->id();


        $address = Address::where(
            'id',
            $id
        )
        ->where(
            'customer_id',
            $userId
        )
        ->firstOrFail();


        $address->delete();


        return redirect()
            ->route('customer.addresses')
            ->with(
                'success',
                'Address deleted successfully.'
            );
    }


    /**
     * Store testimonial
     */
    public function storeTestimonial(Request $request)
    {
        if (!Auth::guard('customer')->check()) {
            return redirect()
                ->route('login')
                ->with('error', 'Please login first.');
        }


        $customerId =
            Auth::guard('customer')->id();


        $existingTestimonial =
            Testimonial::where(
                'customer_id',
                $customerId
            )->first();


        if ($existingTestimonial) {
            return back()->with(
                'error',
                'You have already submitted a testimonial.'
            );
        }


        $request->validate([
            'name' => 'required',

            'rating' =>
                'required|integer|min:1|max:5',

            'message' => 'required',
        ]);


        Testimonial::create([
            'customer_id' => $customerId,

            'name' => $request->name,

            'rating' => $request->rating,

            'message' => $request->message,

            'date' =>
                now()->format('Y-m-d'),

            'status' => 'pending',
        ]);


        return back()->with(
            'success',
            'Thank you! Your testimonial has been submitted for review.'
        );
    }
}