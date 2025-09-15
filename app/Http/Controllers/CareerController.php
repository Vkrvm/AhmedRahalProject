<?php

namespace App\Http\Controllers;

use App\Mail\CareerMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CareerController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'design_role' => 'required|string|max:255',
            'portfolio' => 'nullable|url|max:500',
            'message' => 'required|string|max:1000',
        ]);

        try {
            Mail::to('rahaldesigns.careers@gmail.com')->send(
                new CareerMail(
                    $validated['name'],
                    $validated['email'],
                    $validated['phone'],
                    $validated['design_role'],
                    $validated['portfolio'] ?? '',
                    $validated['message']
                )
            );

            return redirect()->back()->with('success', 'Thank you for your application! We will review it and get back to you soon.');
        } catch (\Exception $e) {
            \Log::error('Career form email failed', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return redirect()->back()->with('error', 'Sorry, there was an error submitting your application. Please try again later.');
        }
    }
}
