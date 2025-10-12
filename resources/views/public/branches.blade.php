@extends('layouts.public')

@section('title', 'Our Branches | Rahal Designs')
@section('description', 'Contact Rahal Designs through our branches in Cairo, Egypt and Dubai, UAE. We are pleased to serve you through the nearest branch.')

@section('content')
	<section class="page page-branches">
		<h1>Select the branch to contact us</h1>
		<p>We are pleased to serve you through the nearest branch</p>
        <div class="branches-grid">
            <div class="branch-btn">
                <a href="https://wa.me/201030015161">🇪🇬 Cairo Branch</a>
            </div>
            <div class="branch-btn">
                <a href="https://wa.me/9710522953036">🇦🇪 Dubai Branch</a>
            </div>
        </div>
        <div class="contact-info">
            <h5>Contact Information</h3>
            <p>Cairo: +20 103 001 5161</p>
            <p>Dubai: +971 052 295 3036</p>
        </div>
	</section>
@endsection
