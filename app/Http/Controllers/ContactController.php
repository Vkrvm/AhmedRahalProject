<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'branch' => 'required|string|in:Cairo,Dubai',
            'message' => 'required|string|max:1000',
        ]);

        try {
            Mail::to('rahaldesigns.info@gmail.com')->send(
                new ContactMail(
                    $validated['name'],
                    $validated['email'],
                    $validated['phone'],
                    $validated['branch'],
                    $validated['message']
                )
            );

            return redirect()->back()->with('success', 'Thank you for your message! We will get back to you soon.');
        } catch (\Exception $e) {
            \Log::error('Contact form email failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return redirect()->back()->with('error', 'Sorry, there was an error sending your message. Please try again later.');
        }
    }
}
