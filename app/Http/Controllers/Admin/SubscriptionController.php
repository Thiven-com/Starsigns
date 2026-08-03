<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index(Request $request)
    {
        $subscriptions = Subscription::query()
            ->when($request->search, function ($query) use ($request) {
                $query->where('email', 'like', '%' . $request->search . '%');
            })
            ->latest()
            ->paginate(10);

        return view('admin.subscriptions.all', compact('subscriptions'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscriptions,email',
        ]);

        Subscription::create([
            'email' => $request->email,
            'status' => 'active',
        ]);

        return back()->with('success', 'Thank you for subscribing!');
    }

    public function destroy($id)
    {
        Subscription::findOrFail($id)->delete();

        return back()->with('success', 'Subscription deleted successfully');
    }

}
