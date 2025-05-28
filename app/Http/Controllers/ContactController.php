<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display the contact form.
     */
    public function show()
    {
        return view('contact.form');
    }

    /**
     * Handle the contact form submission.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:2000',
        ]);

        // In a real application, you would save the contact form data 
        // or send an email here. For now, we'll just show a success message.

        return redirect()->route('contact.form')->with('success', 'お問い合わせを受け付けました');
    }
}