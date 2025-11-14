<?php

namespace App\Http\Controllers;

use App\Models\FitOut;
use Illuminate\Contracts\View\View;

class FitOutController extends Controller
{
	public function index(): View
	{
		$fitOuts = FitOut::query()->latest()->paginate(9);
		return view('public.fit-outs', compact('fitOuts'));
	}

	public function show(string $slug): View
	{
		$fitOut = FitOut::where('slug', $slug)->firstOrFail();
		$images = $fitOut->images()->paginate(9);
		return view('public.fit-out-show', compact('fitOut', 'images'));
	}
}

