<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>{{ config('app.name', 'Rahal Designs') }}</title>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
		@vite(['resources/scss/public.scss','resources/js/app.js'])
	</head>
	<body>
		<header class="site-header">
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark m-0 p-0">
					<a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
						<img src="{{ asset('images/RahalDesignsLogo.png') }}" alt="Logo" width="40" class="me-1">
						<span class="brand">{{ config('app.name', 'Rahal Designs') }}</span>
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
                <div class="row">
                    <div class="col-6 col-lg-3">
                        <h2>Rahal Designs</h2>
                        <ul class="p-0">
                            <li class="nav-item"><a href="{{ route('about') }}">About Us</a></li>
                            <li class="nav-item"><a href="{{ route('projects') }}">Our Projects</a></li>
                            <li class="nav-item"><a href="{{ route('contact') }}">Contact Us</a></li>
                            <li class="nav-item"><a href="{{ route('careers') }}">Careers</a></li>
                        </ul>




                    </div>
                    <div class="col-6 col-lg-3">
                        <h2>Explore</h2>
                        <ul class="p-0">
                            <li class="nav-item"><a href="{{ route('design.process') }}">Design Process</a></li>
                            <li class="nav-item"><a href="{{ route('client.stories') }}">Client Stories</a></li>
                            <li class="nav-item"><a href="{{ route('branches') }}">Branches</a></li>
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
                    </div>
                    <div class="col-12 col-lg-3">
                        <h2>Newsletter</h2>
                        <p>Stay updated with our latest designs</p>
                        <form action="">
                            <input type="email" placeholder="example@example.com" class="w-100"></input>
                            <button class="btn-subscribe w-100">Subscribe</button>
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
