@extends('main')

@section('title', 'Our Works')

<h1 class="text-center mt-4 mb-4">Your Daily Business Articles</h1>
<div class="container">
    <ul class="list-group">
        @foreach ($articles as $article)
            <li class="list-group-item d-flex align-items-start">
                <img src="{{ $article->image }}" alt="Image for {{ $article->judul }}" class="img-thumbnail me-3"
                    style="width: 100px; height: auto;">
                <div>
                    <h5 class="mb-1">{{ $article->judul }}</h5>
                    <p class="mb-1 text-muted">By {{ $article->penulis }}</p>
                    <a href="{{ url('articleDetail/' . $article->id) }}" class="btn btn-sm btn-primary mt-1">
                        View Details
                    </a>
                </div>
            </li>
        @endforeach
    </ul>
</div>


@section('content')

@endsection
