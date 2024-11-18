@extends('main')

@section('title', 'Detail Page')

@section('content')
    <div class="container mt-5 pb-5">
        <div class="row g-4 align-items-center">
            <!-- Image Section -->
            <div class="col-md-6 text-center">
                <img src="{{ $article->image }}" alt="Image for {{ $article->judul }}" class="img-fluid rounded shadow">
            </div>

            <!-- Text Section -->
            <div class="col-md-6">
                <h1 class="mb-3">{{ $article->judul }}</h1>
                <p class="text-muted">By <strong>{{ $article->penulis }}</strong></p>
                <p><strong>Year:</strong> {{ $article->post_date }}</p>
                <p><strong>Synopsis:</strong></p>
                <p>{{ $article->isi_article }}</p>
                <a href="{{ url('/home') }}" class="btn btn-primary mt-3">Back to Home</a>
            </div>
        </div>
    </div>
@endsection
