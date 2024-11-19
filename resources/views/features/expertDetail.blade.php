@extends('main')

@section('title', 'Expert Detail')

@section('content')
    <div class="container mt-5 pb-5 d-flex align-items-center" style="min-height: 680px;">
        <div class="row g-4 align-items-center">
            <!-- Image Section -->
            <div class="col-md-6 text-center">
                <img src="{{ $expert->image }}" alt="Image of {{ $expert->name }}" class="img-fluid rounded shadow"
                    style="max-height: 400px; object-fit: cover;">
            </div>

            <!-- Text Section -->
            <div class="col-md-6">
                <h1 class="mb-3">{{ $expert->name }}</h1>
                <p class="text-muted"><strong>Expertise:</strong> {{ $expert->expertise }}</p>
                <p><strong>Rating:</strong> {{ number_format($expert->rating, 1) }} / 5</p>
                <p><strong>About:</strong></p>
                <p>{{ $expert->bio }}</p>
                <p>Rp.{{ $expert->rate_price }}</p>

                <a href="{{ url('/experts') }}" class="btn btn-primary mt-3">
                    Back
                </a>
            </div>
        </div>
    </div>
@endsection
