<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Testimonial::paginate(10);

        return view('admin.testimonials.all', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'message' => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'date' => 'required|date',
        ]);

        Testimonial::create([
            'name' => $request->name,
            'image' => $request->hasFile('image') ? $request->file('image')->store('testimonials', 'public') : null,
            'rating' => $request->rating,
            'date' => $request->date,
            'message' => $request->message,
            
        ]);

        return redirect()->route('admin.testimonial.index')
            ->with('success', 'Testimonial added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = Testimonial::where('id', $id)->first();

        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'rating' => 'required|integer|min:1|max:5',
            'date' => 'required|date',
            'message' => 'required|string',
            'status' => 'nullable|in:"pending","approved","rejected"',
        ]);

        $testimonial = Testimonial::findOrFail($id);

        $imagePath = $testimonial->image;

        // Upload New Image
        if ($request->hasFile('image')) {

            // Delete old image
            if (
                $testimonial->image &&
                Storage::disk('public')->exists($testimonial->image)
            ) {

                Storage::disk('public')->delete($testimonial->image);
            }

            // Store new image
            $imagePath = $request->file('image')
                ->store('testimonials', 'public');
        }

        // Update
        $testimonial->update([
            'name' => $request->name,
            'image' => $imagePath,
            'rating' => $request->rating,
            'date' => $request->date,
            'message' => $request->message,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('admin.testimonial.index')
            ->with('success', 'Testimonial updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        // Delete image if exists
        if ($testimonial->image && file_exists(public_path($testimonial->image))) {
            unlink(public_path($testimonial->image));
        }

        // Delete record
        $testimonial->delete();

        return response()->json([
            'success' => true,
            'message' => 'Testimonial deleted successfully'
        ]);
    }
    public function approve($id)
    {
        Testimonial::where('id', $id)->update(['status' => "approved"]);

        return back()->with('success', 'Testimonial approved successfully');
    }

    public function reject($id)
    {
        Testimonial::where('id', $id)->update(['status' => "rejected"]);

        return back()->with('error', 'Testimonial rejected');
    }
}
