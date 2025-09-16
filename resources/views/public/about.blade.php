@extends('layouts.public')

@section('title', 'About Us | Rahal Designs')
@section('description', 'Learn about Rahal Designs, a creative interior design office that transforms spaces into stunning environments. Meet Ahmed Rahal, Founder & Lead Designer.')

@section('content')
	<section class="page page-about">
        <div class="container mt-4">
            <h1>About Rahal Designs</h1>
            <p class="mb-3">Rahal Designs is a creative interior design office that transforms spaces into stunning environments that reflect your personality and vision. With years of experience in residential and commercial projects, we blend aesthetics with functionality to create timeless interiors.</p>
            <p class="mb-3">Our team of passionate designers believes in details, materials, and balance. Every corner is an opportunity for creativity and expression.</p>
            <div class="row p-5 m-0 shadow info-card">
                <div class="col-12 col-lg-4 p-0">
                    <img src="{{ asset('images/about/AhmedRahal.jpg') }}" alt="About Rahal Designs" class="img-fluid">
                </div>
                <div class="col-12 col-lg-8 p-0 ps-5">
                    <div class="name">Ahmed Rahal</div>
                    <div class="title">Founder & Lead Designer</div>
                    <div class="description">
                        <p>With a deep passion for creating elegant and functional interiors, Ahmed Rahal founded Rahal Designs to bring timeless beauty into everyday spaces. His work blends artistic vision with practical design, delivering environments that inspire comfort, luxury, and identity.</p>
                        <p>Ahmed has led projects across residential, retail, and corporate sectors, ensuring client satisfaction through attention to detail, material selection, and spatial harmony. His philosophy centers on understanding lifestyle needs and translating them into immersive spaces.</p>
                    </div>
                    <div class="social-links">
                        <a href="https://www.instagram.com/rahal.designs/" class="social-link instagram"><i class="fa-brands fa-instagram"></i></a>
                        <a href="https://www.tiktok.com/@rahal.designs?_t=ZS-8xqovIxoMps&_r=1" class="social-link tiktok"><i class="fa-brands fa-tiktok"></i></a>
                        <a href="https://www.linkedin.com/company/rahal-designs/" class="social-link linkidin"><i class="fa-brands fa-linkedin"></i></a>
                        <a href="https://www.youtube.com/@ahmedrahal7290" class="social-link youtube"><i class="fa-brands fa-youtube"></i></a>
                        <a href="https://www.threads.com/@ahmedrahal.official" class="social-link threads"><i class="fa-brands fa-threads"></i></a>
                        <a href="https://www.behance.net/" class="social-link behance"><i class="fa-brands fa-behance"></i></a>
                    </div>
                </div>
            </div>
        </div>
	</section>
@endsection
