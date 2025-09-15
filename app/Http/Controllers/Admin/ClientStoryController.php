<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClientStory;
use App\Rules\MaxFileSize;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClientStoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $clientStories = ClientStory::ordered()->paginate(9);
        return view('admin.client-stories.index', compact('clientStories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.client-stories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', new MaxFileSize(10240)],
            'project_link' => 'nullable|url',
            'is_active' => 'boolean',
            'sort_order' => 'integer|min:0',
        ]);

        $photoPath = $request->file('photo')->store('images/client-stories', 'public');

        ClientStory::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'photo_path' => $photoPath,
            'project_link' => $validated['project_link'],
            'is_active' => $validated['is_active'] ?? true,
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        return redirect()->route('admin.client-stories.index')->with('success', 'Client story created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ClientStory $clientStory): View
    {
        return view('admin.client-stories.show', compact('clientStory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClientStory $clientStory): View
    {
        return view('admin.client-stories.edit', compact('clientStory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClientStory $clientStory): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', new MaxFileSize(10240)],
            'project_link' => 'nullable|url',
            'is_active' => 'boolean',
            'sort_order' => 'integer|min:0',
        ]);

        $updateData = [
            'name' => $validated['name'],
            'description' => $validated['description'],
            'project_link' => $validated['project_link'],
            'is_active' => $validated['is_active'] ?? true,
            'sort_order' => $validated['sort_order'] ?? 0,
        ];

        if ($request->hasFile('photo')) {
            $updateData['photo_path'] = $request->file('photo')->store('images/client-stories', 'public');
        }

        $clientStory->update($updateData);

        return redirect()->route('admin.client-stories.index')->with('success', 'Client story updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClientStory $clientStory): RedirectResponse
    {
        $clientStory->delete();
        return redirect()->route('admin.client-stories.index')->with('success', 'Client story deleted successfully.');
    }

    /**
     * Toggle the active status of a client story.
     */
    public function toggleActive(ClientStory $clientStory): RedirectResponse
    {
        $clientStory->update(['is_active' => !$clientStory->is_active]);
        
        $status = $clientStory->is_active ? 'activated' : 'deactivated';
        return redirect()->back()->with('success', "Client story {$status} successfully.");
    }
}
