<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Rules\MaxFileSize;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProjectController extends Controller
{
	public function index(): View
	{
		$projects = Project::with('images')->latest()->paginate(9);
		return view('admin.projects.index', compact('projects'));
	}

	public function create(): View
	{
		return view('admin.projects.create');
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
		while (Project::where('slug', $slug)->exists()) {
			$slug = Str::slug($validated['title']) . '-' . $counter++;
		}

		$thumbnailPath = $request->file('thumbnail')->store('images/projects', 'public');

		$project = Project::create([
			'slug' => $slug,
			'title' => $validated['title'],
			'description' => $validated['description'],
			'thumbnail_path' => $thumbnailPath,
		]);

		foreach ($request->file('gallery_images') as $index => $image) {
			$imagePath = $image->store('images/projects/gallery', 'public');
			ProjectImage::create([
				'project_id' => $project->id,
				'image_path' => $imagePath,
				'sort_order' => $index + 1,
			]);
		}

		return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
	}

	public function show(Project $project): View
	{
		$images = $project->images()->paginate(9);
		return view('admin.projects.show', compact('project', 'images'));
	}

	public function edit(Project $project): View
	{
		$project->load('images');
		return view('admin.projects.edit', compact('project'));
	}

	public function update(Request $request, Project $project): RedirectResponse
	{
		// Debug: Log the request
		\Log::info('Update request received', ['project_id' => $project->id, 'request_data' => $request->all()]);
		
		$validated = $request->validate([
			'title' => 'required|string|max:255',
			'description' => 'nullable|string',
			'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
			'gallery_images' => 'nullable|array',
			'gallery_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:10240',
		]);

		$slug = Str::slug($validated['title']);
		if ($slug !== $project->slug) {
			$counter = 1;
			while (Project::where('slug', $slug)->where('id', '!=', $project->id)->exists()) {
				$slug = Str::slug($validated['title']) . '-' . $counter++;
			}
		}

		$updateData = [
			'slug' => $slug,
			'title' => $validated['title'],
			'description' => $validated['description'],
		];

		if ($request->hasFile('thumbnail')) {
			$updateData['thumbnail_path'] = $request->file('thumbnail')->store('images/projects', 'public');
		}

		$project->update($updateData);

		if ($request->hasFile('gallery_images')) {
			// Get the current highest sort order
			$currentMaxOrder = $project->images()->max('sort_order') ?? 0;
			
			// Add new images with proper sort order
			foreach ($request->file('gallery_images') as $index => $image) {
				$imagePath = $image->store('images/projects/gallery', 'public');
				ProjectImage::create([
					'project_id' => $project->id,
					'image_path' => $imagePath,
					'sort_order' => $currentMaxOrder + $index + 1,
				]);
			}
		}

		\Log::info('Project updated successfully', ['project_id' => $project->id]);
		return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
	}

	public function deleteImage(ProjectImage $image): RedirectResponse
	{
		$project = $image->project;
		$image->delete();
		return redirect()->route('admin.projects.edit', $project)->with('success', 'Image deleted successfully.');
	}

	public function destroy(Project $project): RedirectResponse
	{
		$project->images()->delete();
		$project->delete();
		return redirect()->route('admin.projects.index')->with('success', 'Project deleted successfully.');
	}
}
