<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $subscribers = Subscriber::latest()->paginate(10);
        return view('admin.subscribers.index', compact('subscribers'));
    }

    /**
     * Export all subscribers as CSV
     */
    public function export(): \Symfony\Component\HttpFoundation\StreamedResponse
    {
        $fileName = 'subscribers_'.now()->format('Y_m_d_His').'.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="'.$fileName.'"',
        ];

        $callback = function () {
            $handle = fopen('php://output', 'w');
            // Header row
            fputcsv($handle, ['ID', 'Email', 'Subscribed At']);

            Subscriber::orderBy('id')
                ->chunk(1000, function ($chunk) use ($handle) {
                    foreach ($chunk as $subscriber) {
                        fputcsv($handle, [
                            $subscriber->id,
                            $subscriber->email,
                            optional($subscriber->created_at)->format('Y-m-d H:i:s'),
                        ]);
                    }
                });

            fclose($handle);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subscriber $subscriber): RedirectResponse
    {
        $subscriber->delete();
        return redirect()->route('admin.subscribers.index')->with('success', 'Subscriber deleted successfully.');
    }
}
