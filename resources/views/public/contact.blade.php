@extends('layouts.public')

@section('content')
	<section class="page page-contact">
		<h1>Contact Us</h1>
		<p>We’d love to hear about your next project!</p>
		<form>
			<input type="text" placeholder="Name">
			<input type="email" placeholder="Email">
			<input type="text" placeholder="Phone">
            <select class="my-select" name="branch" id="branch">
                <option data-display="Select Branch"></option>
                <option value="Cairo">Cairo</option>
                <option value="Dubai">Dubai</option>
            </select>
			<textarea placeholder="Message"></textarea>
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
    
