<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>{{ config('app.name', 'Rahal Designs') }}</title>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
		@vite(['resources/scss/public.scss','resources/js/app.js'])
	</head>
	<body>
		<header class="site-header">
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark m-0 p-0">
					<a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
						<img src="{{ asset('images/RahalDesignsLogo.png') }}" alt="Logo" width="40" class="me-1">
						<a href="{{ route('home') }}" class="brand">{{ config('app.name', 'Rahal Designs') }}</a>
					</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="mainNavbar">
						<ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-4">
							<li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
							<li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
							<li class="nav-item"><a class="nav-link" href="{{ route('projects') }}">Projects</a></li>
							<li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
						</ul>
					</div>
			</nav>
		</header>
		<main class="site-content p-0">
			@yield('content')
		</main>
		<footer class="site-footer">
			<div class="container">
				<div class="footer-links">
					<ul>
						<li><a href="{{ route('about') }}">About Us</a></li>
						<li><a href="{{ route('projects') }}">Our Projects</a></li>
						<li><a href="{{ route('contact') }}">Contact Us</a></li>
						<li><a href="{{ route('careers') }}">Careers</a></li>
						<li><a href="{{ route('design.process') }}">Design Process</a></li>
						<li><a href="{{ route('client.stories') }}">Client Stories</a></li>
						<li><a href="{{ route('branches') }}">Branches</a></li>
					</ul>
				</div>
				<div class="footer-copy">&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}</div>
			</div>
		</footer>
	</body>
</html>
