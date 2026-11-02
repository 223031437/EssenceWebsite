<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use App\Models\BusinessDetail;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function index()
    {
        $business = BusinessDetail::first();

        return view('contact', compact('business'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'nullable|string|max:30',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Inquiry::create($validated);

        return redirect()->route('contact.index')
                         ->with('success', 'Thank you! Your message has been sent.');
    }
}
