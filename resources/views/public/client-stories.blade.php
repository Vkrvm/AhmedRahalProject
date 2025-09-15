@extends('layouts.public')

@section('content')
	<section class="page page-client-stories">
        <div class="container">
            <h1>Client Stories</h1>
            <p class="text-center">Discover what our clients have to say about their projects.</p>
            
            @if($clientStories->count() > 0)
                <div class="row">
                    @foreach($clientStories as $clientStory)
                        <div class="col-12 col-lg-4 mb-3">
                            <div class="card shadow p-3">
                                <div class="personal-data">
                                    <img src="{{ asset('storage/' . $clientStory->photo_path) }}" 
                                         alt="{{ $clientStory->name }}"
                                         onerror="this.src='https://img.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg?ga=GA1.1.102849408.1757898813&semt=ais_incoming&w=740&q=80'">
                                    <div class="name"> 
                                        <h4>{{ $clientStory->name }}</h4> 
                                    </div>
                                </div>
                                <div class="quote mt-3">
                                    <p>{{ $clientStory->description }}</p>
                                </div>
                                @if($clientStory->project_link)
                                    <div class="project-btn">
                                        <a class="btn" href="{{ $clientStory->project_link }}" target="_blank">See Project</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                @if($clientStories->hasPages())
                    <div class="mt-5">
                        @include('custom-pagination', ['paginator' => $clientStories])
                    </div>
                @endif
            @else
                <div class="text-center py-5">
                    <p class="text-muted">No client stories available at the moment. Please check back later.</p>
                </div>
            @endif
        </div>
	</section>
@endsection
