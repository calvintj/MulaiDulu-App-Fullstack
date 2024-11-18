@extends('main')

@section('title', 'Home')

@section('content')
    <div class="container mt-5 pb-5">
        <div class="row align-items-center">
            <!-- Text Section -->
            <div class="col-md-6">
                <h1 class="mb-3">{{ $articles[0]->judul }}</h1>
                <p class="text-muted">By {{ $articles[0]->penulis }}</p>
                <p>{{ Str::limit($articles[0]->isi_article, 200) }} {{-- Limit to 200 characters for summary --}}
                </p>
                <a href="{{ url('articles') }}" class="btn btn-primary">More Articles</a>
                {{-- <a href="{{ url('articles/' . $articles[0]->id) }}" class="btn btn-primary">More Articles</a> --}}
            </div>

            <!-- Image Section -->
            <div class="col-md-6 text-center">
                <img src="{{ $articles[0]->image }}" alt="Image for {{ $articles[0]->judul }}" class="img-fluid rounded">
            </div>
        </div>
    </div>

    <div class="container mt-5 pb-5">
        <div class="row align-items-center">


            <!-- Image Section -->
            <div class="col-md-6 text-center">
                <img src="{{ $experts[0]->image }}" alt="Image for {{ $experts[0]->name }}" class="img-fluid rounded">
            </div>

            <!-- Text Section -->
            <div class="col-md-6">
                <h1 class="mb-3">{{ $experts[0]->name }}</h1>
                <p class="text-muted">By {{ $experts[0]->expertise }}</p>
                <p>{{ Str::limit($experts[0]->bio, 200) }} {{-- Limit to 200 characters for summary --}}
                </p>
                <a href="{{ url('experts') }}" class="btn btn-primary">More Experts</a>
            </div>
        </div>
    </div>
@endsection
