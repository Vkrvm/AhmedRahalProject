<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<!-- Page Title -->
		<title>@yield('title', 'Rahal Designs | Interior Design Studio')</title>

		<!-- Meta Description -->
		<meta name="description" content="@yield('description', 'Explore timeless, functional, and stylish interiors by Rahal Designs.')">

		<!-- Open Graph / Facebook -->
		<meta property="og:type" content="website">
		<meta property="og:url" content="{{ url()->current() }}">
		<meta property="og:title" content="@yield('title', 'Rahal Designs | Interior Design Studio')">
		<meta property="og:description" content="@yield('description', 'Explore timeless, functional, and stylish interiors by Rahal Designs.')">
		<meta property="og:image" content="@yield('og_image', asset('images/favicon_io/android-chrome-512x512.png'))">

		<!-- Twitter -->
		<meta property="twitter:card" content="summary_large_image">
		<meta property="twitter:url" content="{{ url()->current() }}">
		<meta property="twitter:title" content="@yield('title', 'Rahal Designs | Interior Design Studio')">
		<meta property="twitter:description" content="@yield('description', 'Explore timeless, functional, and stylish interiors by Rahal Designs.')">
		<meta property="twitter:image" content="@yield('og_image', asset('images/favicon_io/android-chrome-512x512.png'))">

		<!-- Favicon -->
		<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon_io/apple-touch-icon.png') }}">
		<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon_io/favicon-32x32.png') }}">
		<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon_io/favicon-16x16.png') }}">
		<link rel="manifest" href="{{ asset('images/favicon_io/site.webmanifest') }}">
		<link rel="shortcut icon" href="{{ asset('images/favicon_io/favicon.ico') }}">

		<!-- Preconnect -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

		<!-- Fonts -->
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

        <!-- Styles -->
		@vite(['resources/scss/public.scss','resources/js/app.js'])
	</head>
	<body>
		<header class="site-header" data-scroll-header>
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark m-0 p-0">
					<a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
						<img src="{{ asset('images/RahalDesignsLogo.png') }}" alt="Logo" width="40" class="me-1">
						<span class="brand">{{ config('app.name', 'Rahal Designs') }}</span>
					</a>
					<button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
						<span class="toggler-box" aria-hidden="true">
							<span class="toggler-line"></span>
							<span class="toggler-line"></span>
							<span class="toggler-line"></span>
						</span>
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
		<main class="site-content p-0 {{ request()->routeIs('home') ? '' : 'with-header-offset' }}">
			@yield('content')
		</main>
		<footer class="site-footer">
			<div class="container">
                <div class="row">
                    <div class="col-6 col-lg-3">
                        <h2>Rahal Designs</h2>
                        <ul class="p-0">
                            <li class="nav-item"><a href="{{ route('about') }}">About Us</a></li>
                            <li class="nav-item"><a href="{{ route('contact') }}">Contact Us</a></li>
                            <li class="nav-item"><a href="{{ route('careers') }}">Careers</a></li>
							<li class="nav-item"><a href="{{ route('branches') }}">Branches</a></li>
                        </ul>




                    </div>
                    <div class="col-6 col-lg-3">
                        <h2>Explore</h2>
                        <ul class="p-0">
						    <li class="nav-item"><a href="{{ route('projects') }}">Our Projects</a></li>
							<li class="nav-item"><a href="{{ route('fit-outs') }}">Fit-Outs</a></li>
                            <li class="nav-item"><a href="{{ route('design.process') }}">Before & After</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-lg-3">
                        <h2>Contact</h2>
                        <li class="nav-item">
                            <a href="mailto:rahaldesigns.info@gmail.com" class="nav-link">
                              <i class="fa-solid fa-envelope"></i> rahaldesigns.info@gmail.com
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="tel:+201030015161" class="nav-link">
                              <i class="fa-solid fa-phone"></i> +20 103 001 5161
                            </a>
                        </li>
						<li class="nav-item">
                            <a href="tel:+971 052 295 3036" class="nav-link">
                              <i class="fa-solid fa-phone"></i> +971 052 295 3036
                            </a>
                        </li>
                    </div>
                    <div class="col-12 col-lg-3">
                        <h2>Newsletter</h2>
                        <p>Stay updated with our latest designs</p>
                        @if(session('subscribe_success'))
                            <div class="alert alert-success my-2">{{ session('subscribe_success') }}</div>
                        @endif
                        @if($errors->has('newsletter_email'))
                            <div class="alert alert-danger my-2">{{ $errors->first('newsletter_email') }}</div>
                        @endif
                        <form action="{{ route('subscribe') }}" method="POST">
                            @csrf
                            <input type="email" name="newsletter_email" placeholder="example@example.com" class="w-100" required></input>
                            <button class="btn-subscribe w-100" type="submit">Subscribe</button>
                        </form>
                    </div>
                </div>

                <div class="footer-social d-flex justify-content-center align-items-center gap-3">
                    <a href="https://www.instagram.com/rahal.designs/" class="social-link instagram"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://www.tiktok.com/@rahal.designs?_t=ZS-8xqovIxoMps&_r=1" class="social-link tiktok"><i class="fa-brands fa-tiktok"></i></a>
                    <a href="https://www.linkedin.com/company/rahal-designs/" class="social-link linkidin"><i class="fa-brands fa-linkedin"></i></a>
                </div>
				<div class="footer-copy text-center">&copy; {{ date('Y') }} Rahal Designs. All rights reserved.</div>
			</div>
		</footer>
	</body>
</html>
