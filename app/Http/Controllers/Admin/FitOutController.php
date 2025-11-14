<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FitOut;
use App\Models\FitOutImage;
use App\Rules\MaxFileSize;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class FitOutController extends Controller
{
	public function index(): View
	{
		$fitOuts = FitOut::with('images')->latest()->paginate(9);
		return view('admin.fit-outs.index', compact('fitOuts'));
	}

	public function create(): View
	{
		return view('admin.fit-outs.create');
	}

	public function store(Request $request): RedirectResponse
	{
		$validated = $request->validate([
			'title' => 'required|string|max:255',
			'description' => 'nullable|string',
			'thumbnail' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', new MaxFileSize(10240)],
			'gallery_images' => 'required|array|min:1',
			'gallery_images.*' => ['image', 'mimes:jpeg,png,jpg,gif', new MaxFileSize(10240)],
		]);

		$slug = Str::slug($validated['title']);
		$counter = 1;
		while (FitOut::where('slug', $slug)->exists()) {
			$slug = Str::slug($validated['title']) . '-' . $counter++;
		}

		$thumbnailPath = $request->file('thumbnail')->store('images/fit-outs', 'public');

		$fitOut = FitOut::create([
			'slug' => $slug,
			'title' => $validated['title'],
			'description' => $validated['description'],
			'thumbnail_path' => $thumbnailPath,
		]);

		foreach ($request->file('gallery_images') as $index => $image) {
			$imagePath = $image->store('images/fit-outs/gallery', 'public');
			FitOutImage::create([
				'fit_out_id' => $fitOut->id,
				'image_path' => $imagePath,
				'sort_order' => $index + 1,
			]);
		}

		return redirect()->route('admin.fit-outs.index')->with('success', 'Fit-out created successfully.');
	}

	public function show(FitOut $fitOut): View
	{
		$images = $fitOut->images()->paginate(9);
		return view('admin.fit-outs.show', compact('fitOut', 'images'));
	}

	public function edit(FitOut $fitOut): View
	{
		$fitOut->load('images');
		return view('admin.fit-outs.edit', compact('fitOut'));
	}

	public function update(Request $request, FitOut $fitOut): RedirectResponse
	{
		$validated = $request->validate([
			'title' => 'required|string|max:255',
			'description' => 'nullable|string',
			'thumbnail' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', new MaxFileSize(10240)],
			'gallery_images' => 'nullable|array',
			'gallery_images.*' => ['image', 'mimes:jpeg,png,jpg,gif', new MaxFileSize(10240)],
		]);

		$slug = Str::slug($validated['title']);
		if ($slug !== $fitOut->slug) {
			$counter = 1;
			while (FitOut::where('slug', $slug)->where('id', '!=', $fitOut->id)->exists()) {
				$slug = Str::slug($validated['title']) . '-' . $counter++;
			}
		}

		$updateData = [
			'slug' => $slug,
			'title' => $validated['title'],
			'description' => $validated['description'],
		];

		if ($request->hasFile('thumbnail')) {
			$updateData['thumbnail_path'] = $request->file('thumbnail')->store('images/fit-outs', 'public');
		}

		$fitOut->update($updateData);

		if ($request->hasFile('gallery_images')) {
			// Get the current highest sort order
			$currentMaxOrder = $fitOut->images()->max('sort_order') ?? 0;

			// Add new images with proper sort order
			foreach ($request->file('gallery_images') as $index => $image) {
				$imagePath = $image->store('images/fit-outs/gallery', 'public');
				FitOutImage::create([
					'fit_out_id' => $fitOut->id,
					'image_path' => $imagePath,
					'sort_order' => $currentMaxOrder + $index + 1,
				]);
			}
		}

		return redirect()->route('admin.fit-outs.index')->with('success', 'Fit-out updated successfully.');
	}

	public function deleteImage(FitOutImage $image): RedirectResponse
	{
		$fitOut = $image->fitOut;
		$image->delete();
		return redirect()->route('admin.fit-outs.edit', $fitOut)->with('success', 'Image deleted successfully.');
	}

	public function deleteMultipleImages(Request $request): RedirectResponse
	{
		$validated = $request->validate([
			'image_ids' => 'required|array',
			'image_ids.*' => 'exists:fit_out_images,id',
		]);

		$images = FitOutImage::whereIn('id', $validated['image_ids'])->get();

		if ($images->isEmpty()) {
			return redirect()->back()->with('error', 'No images found to delete.');
		}

		$fitOut = $images->first()->fitOut;
		$count = $images->count();

		FitOutImage::whereIn('id', $validated['image_ids'])->delete();

		return redirect()->route('admin.fit-outs.edit', $fitOut)->with('success', "{$count} image(s) deleted successfully.");
	}

	public function destroy(FitOut $fitOut): RedirectResponse
	{
		$fitOut->images()->delete();
		$fitOut->delete();
		return redirect()->route('admin.fit-outs.index')->with('success', 'Fit-out deleted successfully.');
	}
}

