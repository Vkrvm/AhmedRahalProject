<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DesignComparison;
use App\Rules\MaxFileSize;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DesignComparisonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $designComparisons = DesignComparison::ordered()->paginate(9);
        return view('admin.design-comparisons.index', compact('designComparisons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.design-comparisons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'before' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', new MaxFileSize(10240)],
            'after' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', new MaxFileSize(10240)],
            'is_active' => 'boolean',
            'sort_order' => 'integer|min:0',
        ]);

        $beforePath = $request->file('before')->store('images/design-comparisons', 'public');
        $afterPath = $request->file('after')->store('images/design-comparisons', 'public');

        DesignComparison::create([
            'title' => $validated['title'] ?? null,
            'before_path' => $beforePath,
            'after_path' => $afterPath,
            'is_active' => $validated['is_active'] ?? true,
            'sort_order' => $validated['sort_order'] ?? 0,
        ]);

        return redirect()->route('admin.design-comparisons.index')->with('success', 'Design comparison created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DesignComparison $designComparison): View
    {
        return view('admin.design-comparisons.show', compact('designComparison'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DesignComparison $designComparison): View
    {
        return view('admin.design-comparisons.edit', compact('designComparison'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DesignComparison $designComparison): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'before' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', new MaxFileSize(10240)],
            'after' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', new MaxFileSize(10240)],
            'is_active' => 'boolean',
            'sort_order' => 'integer|min:0',
        ]);

        $updateData = [
            'title' => $validated['title'] ?? null,
            'is_active' => $validated['is_active'] ?? $designComparison->is_active,
            'sort_order' => $validated['sort_order'] ?? $designComparison->sort_order,
        ];

        if ($request->hasFile('before')) {
            $updateData['before_path'] = $request->file('before')->store('images/design-comparisons', 'public');
        }

        if ($request->hasFile('after')) {
            $updateData['after_path'] = $request->file('after')->store('images/design-comparisons', 'public');
        }

        $designComparison->update($updateData);

        return redirect()->route('admin.design-comparisons.index')->with('success', 'Design comparison updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DesignComparison $designComparison): RedirectResponse
    {
        $designComparison->delete();
        return redirect()->route('admin.design-comparisons.index')->with('success', 'Design comparison deleted successfully.');
    }

    /**
     * Toggle active status.
     */
    public function toggleActive(DesignComparison $designComparison): RedirectResponse
    {
        $designComparison->update(['is_active' => !$designComparison->is_active]);
        $status = $designComparison->is_active ? 'activated' : 'deactivated';
        return redirect()->back()->with('success', "Design comparison {$status} successfully.");
    }
}


