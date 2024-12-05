@extends('main')

@section('title', 'Home')

@section('content')
    <div class="container mt-5 pb-5">
        <h1 class="text-center mb-4">Our Experts</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($experts as $expert)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <!-- Expert Image -->
                        <img src="{{ asset('storage/' . $expert['image']) }}" class="card-img-top"
                            alt="Image of {{ $expert->name }}" style="object-fit: cover; height: 200px;">

                        <!-- Expert Details -->
                        <div class="card-body">
                            <h5 class="card-title">{{ $expert->name }}</h5>
                            <p class="card-text">
                                <strong>Rating:</strong> {{ number_format($expert->rating, 1) }} / 5
                            </p>
                            <p class="card-text">
                                <strong>Bio:</strong> {{ Str::limit($expert->bio, 100, '...') }}
                            </p>
                            <p class="card-text text-success fw-bold">Rp {{ $expert->rate_price }}</p>

                            <a href="{{ url('expertDetail/' . $expert->id) }}" class="btn btn-primary mt-3">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
