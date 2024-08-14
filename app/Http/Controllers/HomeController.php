<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $title = $request->input('title');

        $contacts = Contact::where('name', 'LIKE', "%$title%")
            ->orWhere('email', 'LIKE', "%$title%")
            ->orWhere('phone', 'LIKE', "%$title%")
            ->paginate(40);

        return view('home', [
            'contacts' => $contacts
        ]);
    }

}
