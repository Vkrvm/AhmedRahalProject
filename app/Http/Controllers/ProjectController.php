<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Contracts\View\View;

class ProjectController extends Controller
{
	public function index(): View
	{
		$projects = Project::query()->latest()->paginate(9);
		return view('public.projects', compact('projects'));
	}

	public function show(string $slug): View
	{
		$project = Project::where('slug', $slug)->firstOrFail();
		$images = $project->images()->paginate(9);
		return view('public.project-show', compact('project', 'images'));
	}
}


