<?php

namespace App\Http\Controllers\Contact;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactsController extends Controller
{
    /**
     * Display a listing of the contacts.
     */
    public function index()
    {
        $contacts = Contact::all();
        return response()->json($contacts);
    }

    /**
     * Show the form for creating a new contact.
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created contact in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
        ]);

        $contact = Contact::create($validatedData);
        return redirect()->route('contacts.index')->with('success', 'Contact created successfully.');
    }

    /**
     * Display the specified contact.
     */
    public function show(Contact $contact)
    {
        return response()->json($contact);
    }

    /**
     * Show the form for editing the specified contact.
     */
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified contact in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
        ]);

        $contact->update($validatedData);
        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully.');
    }

    /**
     * Remove the specified contact from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');
    }
}
