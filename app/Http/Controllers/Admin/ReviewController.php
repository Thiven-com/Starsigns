<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::latest()->get();

        return view('admin.reviews.all', compact('reviews'));
    }

    /**
     * Store new review
     */
    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'nullable',
            'product_id' => 'nullable',
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'rating' => 'required|in:1,2,3,4,5',
            'title' => 'required|string|max:255',
            'review' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imagePath = null;

        // Upload image
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('uploads/reviews'), $imageName);

            $imagePath = 'uploads/reviews/' . $imageName;
        }

        Review::create([
            'order_id' => $request->order_id,
            'product_id' => $request->product_id,
            'name' => $request->name,
            'email' => $request->email,
            'rating' => $request->rating,
            'title' => $request->title,
            'review' => $request->review,
            'image' => $imagePath,
        ]);

        return back()->with('success', 'Review submitted successfully!');
    }

    /**
     * Show single review
     */
    // public function show($id)
    // {
    //     $review = Review::findOrFail($id);

    //     return view('admin.reviews.show', compact('review'));
    // }

    /**
     * Delete review
     */
    public function destroy($id)
    {
        $review = Review::findOrFail($id);

        // Delete image if exists
        if ($review->image && file_exists(public_path($review->image))) {
            unlink(public_path($review->image));
        }

        $review->delete();

        return back()->with('success', 'Review deleted successfully!');
    }
}
