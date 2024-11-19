@extends('main')

@section('title', 'Our Works')

@section('content')
        <h1 class="text-center mt-4 mb-4">Customers Reviews</h1>
        <div class="container">
            <ul class="list-group">
                @foreach ($reviews as $review)
                    <li class="list-group-item d-flex align-items-start shadow-sm mb-3 p-3">
                        <img src="{{ $review->image }}" alt="Image for {{ $review->name }}" class="rounded-circle me-3"
                            style="width: 80px; height: 80px; object-fit: cover;">
                        <div>
                            <h5 class="mb-1">{{ $review->name }}</h5>
                            <p class="mb-1 text-muted fst-italic">"{{ $review->review }}"</p>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
@endsection
