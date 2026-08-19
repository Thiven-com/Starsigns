<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $existing = Subscription::where('email', $request->email)->first();

        if ($existing) {

            if ($existing->status !== 'active') {
                $existing->update([
                    'status' => 'active',
                ]);
            }

            return back()->with('error', 'This email is already subscribed.');
        }

        Subscription::create([
            'email' => $request->email,
            'status' => 'active',
        ]);

        return back()->with('success', 'Subscribed successfully!');
    }


    public function index(Request $request)
    {
        $query = Subscription::query();

        if ($request->filled('search')) {
            $query->where('email', 'like', '%' . $request->search . '%');
        }

        $subscriptions = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.subscriptions.index', compact('subscriptions'));
    }


    public function destroy($id)
    {
        $subscription = Subscription::findOrFail($id);

        $subscription->delete();

        return back()->with('success', 'Subscription deleted successfully.');
    }
}