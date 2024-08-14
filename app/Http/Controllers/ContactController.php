<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $title = $request->input('title');

        $contacts = Contact::where('user_id', Auth::id())
            ->where(function ($query) use ($title) {
                $query->where('name', 'LIKE', "%$title%")
                    ->orWhere('email', 'LIKE', "%$title%")
                    ->orWhere('phone', 'LIKE', "%$title%");
            })
            ->paginate(20);

        return view('contacts.index', [
            'contacts' => $contacts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate( [
            'name' => ['string', 'max:127'],
            'email' => ['email', 'max:255'],
            'phone' => ['string']
        ]);

        $request->user()->contacts()->create($validated);

        return redirect(route('contacts.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        Gate::authorize('update', $contact);

        return view('contacts.edit', [
            'contact' => $contact
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        Gate::authorize('update', $contact);

        $validated = $request->validate([
            'name' => ['string', 'max:127'],
            'email' => ['email', 'max:255'],
            'phone' => ['numeric']
        ]);

        $contact->update($validated);

        return redirect(route('contacts.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        Gate::authorize('delete', $contact);

        $contact->delete();

        return redirect(route('contacts.index'));
    }
}
