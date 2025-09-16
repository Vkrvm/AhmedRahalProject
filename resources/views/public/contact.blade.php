@extends('layouts.public')

@section('title', 'Contact Us | Rahal Designs')
@section('description', 'Get in touch with Rahal Designs for your interior design project. We\'d love to hear about your next project and help transform your space.')

@section('content')
	<section class="page page-contact">
		<h1>Contact Us</h1>
		<p>We'd love to hear about your next project!</p>
		
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

		<form action="{{ route('contact.store') }}" method="POST">
			@csrf
			<input type="text" name="name" placeholder="Name" value="{{ old('name') }}" required>
			<input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
			<input type="text" name="phone" placeholder="Phone" value="{{ old('phone') }}" required>
            <select class="my-select" name="branch" id="branch" required>
                <option data-display="Select Branch" value=""></option>
                <option value="Cairo" {{ old('branch') == 'Cairo' ? 'selected' : '' }}>Cairo</option>
                <option value="Dubai" {{ old('branch') == 'Dubai' ? 'selected' : '' }}>Dubai</option>
            </select>
			<textarea name="message" placeholder="Message" required>{{ old('message') }}</textarea>
			<button type="submit">Send</button>
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
    
