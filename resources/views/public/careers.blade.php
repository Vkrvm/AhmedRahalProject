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
        @if(session('success'))
            <div class="alert alert-success mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger mb-4">
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger mb-4">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="mt-5" action="{{ route('career.store') }}" method="POST">
            @csrf
            <h3 class="text-center">Apply Now</h3>
            <p class="text-center">Send us your information and portfolio below:</p>
            <input type="text" name="name" placeholder="Full Name" value="{{ old('name') }}" required>
			<input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
			<input type="text" name="phone" placeholder="Phone" value="{{ old('phone') }}" required>
            <select class="my-select" name="design_role" id="design_role" required>
                <option data-display="Design role" value=""></option>
                <option value="Interior Designer" {{ old('design_role') == 'Interior Designer' ? 'selected' : '' }}>Interior Designer</option>
                <option value="Visualizer" {{ old('design_role') == 'Visualizer' ? 'selected' : '' }}>Visualizer</option>
                <option value="Shop Drawing" {{ old('design_role') == 'Shop Drawing' ? 'selected' : '' }}>Shop Drawing</option>
                <option value="HR" {{ old('design_role') == 'HR' ? 'selected' : '' }}>HR</option>
                <option value="Graphic Designer" {{ old('design_role') == 'Graphic Designer' ? 'selected' : '' }}>Graphic Designer</option>
                <option value="Marketing" {{ old('design_role') == 'Marketing' ? 'selected' : '' }}>Marketing</option>
                <option value="Project Manager" {{ old('design_role') == 'Project Manager' ? 'selected' : '' }}>Project Manager</option>
                <option value="Receptionist & Secretary" {{ old('design_role') == 'Receptionist & Secretary' ? 'selected' : '' }}>Receptionist & Secretary</option>
                <option value="Data Entry" {{ old('design_role') == 'Data Entry' ? 'selected' : '' }}>Data Entry</option>
                <option value="IT" {{ old('design_role') == 'IT' ? 'selected' : '' }}>IT</option>
            </select>
            <input type="url" id="portfolio" name="portfolio" placeholder="https://yourportfolio.com" value="{{ old('portfolio') }}">
            <textarea name="message" placeholder="Tell us more about you" required>{{ old('message') }}</textarea>
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