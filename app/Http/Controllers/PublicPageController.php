<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class PublicPageController extends Controller
{
	public function home(): View { return view('public.home'); }
	public function about(): View { return view('public.about'); }
	public function projects(): View { return view('public.projects'); }
	public function contact(): View { return view('public.contact'); }
	public function aboutUs(): View { return view('public.about-us'); }
	public function ourProjects(): View { return view('public.our-projects'); }
	public function contactUs(): View { return view('public.contact-us'); }
	public function careers(): View { return view('public.careers'); }
	public function designProcess(): View { return view('public.design-process'); }
	public function clientStories(): View { return view('public.client-stories'); }
	public function branches(): View { return view('public.branches'); }
}
