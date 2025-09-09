<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>{{ config('app.name', 'Laravel') }}</title>
		@vite(['resources/scss/public.scss','resources/js/app.js'])
	</head>
	<body>
		<header class="site-header">
			<nav class="navbar">
				<a href="{{ route('home') }}" class="brand">{{ config('app.name', 'Laravel') }}</a>
				<ul class="nav-links">
					<li><a href="{{ route('home') }}">Home</a></li>
					<li><a href="{{ route('about') }}">About</a></li>
					<li><a href="{{ route('projects') }}">Projects</a></li>
					<li><a href="{{ route('contact') }}">Contact</a></li>
				</ul>
			</nav>
		</header>
		<main class="site-content">
			@yield('content')
		</main>
		<footer class="site-footer">
			<div class="footer-links">
				<ul>
					<li><a href="{{ route('about.us') }}">About Us</a></li>
					<li><a href="{{ route('our.projects') }}">Our Projects</a></li>
					<li><a href="{{ route('contact.us') }}">Contact Us</a></li>
					<li><a href="{{ route('careers') }}">Careers</a></li>
					<li><a href="{{ route('design.process') }}">Design Process</a></li>
					<li><a href="{{ route('client.stories') }}">Client Stories</a></li>
					<li><a href="{{ route('branches') }}">Branches</a></li>
				</ul>
			</div>
			<div class="footer-copy">&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}</div>
		</footer>
	</body>
</html>
