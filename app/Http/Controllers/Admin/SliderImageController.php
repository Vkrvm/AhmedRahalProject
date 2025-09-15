<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SliderImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class SliderImageController extends Controller
{
	public function index(): View
	{
		$items = SliderImage::orderBy('sort_order')->paginate(50);
		return view('admin.slider-images.index', compact('items'));
	}

	public function create(): View
	{
		return view('admin.slider-images.create');
	}

	public function store(Request $request): RedirectResponse
	{
		$data = $request->validate([
			'title' => ['nullable','string','max:255'],
			'image' => ['required','image','mimes:jpg,jpeg,png,webp','max:4096'],
			'is_active' => ['nullable','boolean'],
			'sort_order' => ['nullable','integer','min:0'],
		]);

		$uploaded = $request->file('image');
		$path = $uploaded->store('images/slider', 'public');

		SliderImage::create([
			'title' => $data['title'] ?? null,
			'image_path' => $path,
			'is_active' => (bool)($data['is_active'] ?? true),
			'sort_order' => (int)($data['sort_order'] ?? 0),
		]);

		return redirect()->route('admin.slider-images.index')->with('status', 'Created');
	}

	public function edit(SliderImage $slider_image): View
	{
		return view('admin.slider-images.edit', ['item' => $slider_image]);
	}

	public function update(Request $request, SliderImage $slider_image): RedirectResponse
	{
		$data = $request->validate([
			'title' => ['nullable','string','max:255'],
			'image' => ['nullable','image','mimes:jpg,jpeg,png,webp','max:4096'],
			'is_active' => ['nullable','boolean'],
			'sort_order' => ['nullable','integer','min:0'],
		]);

		if ($request->hasFile('image')) {
			$uploaded = $request->file('image');
			$slider_image->image_path = $uploaded->store('images/slider', 'public');
		}

		$slider_image->title = $data['title'] ?? $slider_image->title;
		$slider_image->is_active = array_key_exists('is_active', $data) ? (bool)$data['is_active'] : $slider_image->is_active;
		$slider_image->sort_order = array_key_exists('sort_order', $data) ? (int)$data['sort_order'] : $slider_image->sort_order;
		$slider_image->save();

		return redirect()->route('admin.slider-images.index')->with('status', 'Updated');
	}

	public function destroy(SliderImage $slider_image): RedirectResponse
	{
		$slider_image->delete();
		return back()->with('status', 'Deleted');
	}

	public function toggleActive(Request $request, SliderImage $slider_image): RedirectResponse
	{
		$slider_image->is_active = ! $slider_image->is_active;
		$slider_image->save();
		return back()->with('status', 'Toggled');
	}

	public function reorder(Request $request): RedirectResponse
	{
		$ids = $request->input('order', []);
		foreach ($ids as $index => $id) {
			SliderImage::whereKey($id)->update(['sort_order' => $index]);
		}
		return back()->with('status', 'Reordered');
	}
}


