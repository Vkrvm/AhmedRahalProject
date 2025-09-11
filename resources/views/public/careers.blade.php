@extends('layouts.public')

@section('content')
	<section class="page page-careers">
		<h1 class="mt-4 text-center">Join Rahal Designs</h1>
		<p class="my-3 text-center">We design more than interiors — we craft environments that inspire. And it starts with the right people.</p>
        <h3 class="my-3 text-center">Why Rahal?</h3>
        <p class="my-3 text-center">Design across residential, retail, and commercial spaces</p>
        <p class="my-3 text-center">Collaborate with a creative, growth-driven team</p>
        <p class="my-3 text-center">Develop and innovate with real impact</p>
        <p class="my-3 text-center">Express your voice through every concept</p>
        <h3 class="my-3 text-center">Pitch Us</h3>
        <p class="my-3 text-center">Think you’re a good fit? Send your CV and portfolio to <a href="mailto:rahaldesigns.careers@gmail.com">rahaldesigns.careers@gmail.com</a></p>
        <form class="mt-5" action="">
            <h3 class="text-center">Apply Now</h3>
            <p class="text-center">Send us your information and portfolio below:</p>
            <input type="text" placeholder="Full Name">
			<input type="email" placeholder="Email">
			<input type="text" placeholder="Phone">
            <select class="my-select" name="design role" id="design role">
                <option data-display="Design role"></option>
                <option value="Interior Designer">Interior Designer</option>
                <option value="Visualizer">Visualizer</option>
                <option value="Shop Drawing">Shop Drawing</option>
                <option value="HR">HR</option>
                <option value="Graphic Designer">Graphic Designer</option>
                <option value="Marketing">Marketing</option>
                <option value="Project Manager">Project Manager</option>
                <option value="Receptionist & Secretary">Receptionist & Secretary</option>
                <option value="Data Entry">Data Entry</option>
                <option value="IT">IT</option>
            </select>
            <input type="url" id="portfolio" name="portfolio" placeholder="https://yourportfolio.com">
            <textarea placeholder="Tell us more about you"></textarea>
			<button type="submit">Submit Application</button>
        </form>
	</section>
@endsection



<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js" integrity="sha512-NqYds8su6jivy1/WLoW8x1tZMRD7/1ZfhWG/jcRQLOzV1k1rIODCpMgoBnar5QXshKJGV7vi0LXLNXPoFsM5Zg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(document).ready(function() {
        $('select.my-select').niceSelect();
        $('.my-select.nice-select .list').css('width', '300px');
    });
</script>