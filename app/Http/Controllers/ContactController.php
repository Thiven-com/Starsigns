<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function index()
    {

        $contacts = Contact::all(); // Fetch data from database

        return view('admin.contacts.all', compact('contacts'));
    }

    public function destroy($id)
    {
        // Find contact or fail if not exists
        $contact = Contact::findOrFail($id);

        // Delete record
        $contact->delete();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Contact deleted successfully!');
    }

    public function store(Request $request)
    {
        // ✅ Validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'nullable'
        ]);

        // ✅ Store Data
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        // ✅ Redirect with success message
        return back()->with('success', 'Message sent successfully!');
    }


}
