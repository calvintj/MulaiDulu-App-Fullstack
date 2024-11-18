@extends('main')

@section('title', 'Expert Detail')

@section('content')
    <div class="container mt-5 pb-5">
        <div class="row g-4 align-items-center">
            <!-- Image Section -->
            <div class="col-md-6 text-center">
                <img 
                    src="{{ $expert->image }}" 
                    alt="Image of {{ $expert->name }}" 
                    class="img-fluid rounded shadow"
                    style="max-height: 400px; object-fit: cover;">
            </div>

            <!-- Text Section -->
            <div class="col-md-6">
                <h1 class="mb-3">{{ $expert->name }}</h1>
                <p class="text-muted"><strong>Expertise:</strong> {{ $expert->expertise }}</p>
                <p><strong>Rating:</strong> {{ number_format($expert->rating, 1) }} / 5</p>
                <p><strong>About:</strong></p>
                <p>{{ $expert->bio }}</p>
                <a href="{{ url('/home') }}" class="btn btn-primary mt-3">
                    Back to Home
                </a>
            </div>
        </div>
    </div>
@endsection