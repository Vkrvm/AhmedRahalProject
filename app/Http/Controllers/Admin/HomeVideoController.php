<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeVideo;
use App\Rules\MaxFileSize;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $homeVideos = HomeVideo::ordered()->paginate(10);
        return view('admin.home-videos.index', compact('homeVideos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.home-videos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'video' => ['required', 'file', 'mimes:mp4,avi,mov,wmv', new MaxFileSize(102400)], // 100MB max
            'is_active' => 'boolean',
            'sort_order' => 'integer|min:0',
        ]);

        $videoPath = $request->file('video')->store('videos/home', 'public');

        HomeVideo::create([
            'title' => $validated['title'],
            'video_path' => $videoPath,
            'is_active' => $validated['is_active'] ?? true,
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        return redirect()->route('admin.home-videos.index')->with('success', 'Home video created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(HomeVideo $homeVideo): View
    {
        return view('admin.home-videos.show', compact('homeVideo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HomeVideo $homeVideo): View
    {
        return view('admin.home-videos.edit', compact('homeVideo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HomeVideo $homeVideo): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'video' => ['nullable', 'file', 'mimes:mp4,avi,mov,wmv', new MaxFileSize(102400)], // 100MB max
            'is_active' => 'boolean',
            'sort_order' => 'integer|min:0',
        ]);

        $updateData = [
            'title' => $validated['title'],
            'is_active' => $validated['is_active'] ?? true,
            'sort_order' => $validated['sort_order'] ?? 0,
        ];

        if ($request->hasFile('video')) {
            $updateData['video_path'] = $request->file('video')->store('videos/home', 'public');
        }

        $homeVideo->update($updateData);

        return redirect()->route('admin.home-videos.index')->with('success', 'Home video updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HomeVideo $homeVideo): RedirectResponse
    {
        $homeVideo->delete();
        return redirect()->route('admin.home-videos.index')->with('success', 'Home video deleted successfully.');
    }

    /**
     * Toggle the active status of a home video.
     */
    public function toggleActive(HomeVideo $homeVideo): RedirectResponse
    {
        $homeVideo->update(['is_active' => !$homeVideo->is_active]);
        
        $status = $homeVideo->is_active ? 'activated' : 'deactivated';
        return redirect()->back()->with('success', "Home video {$status} successfully.");
    }
}
