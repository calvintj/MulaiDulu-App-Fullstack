@extends('main')

@section('title', 'Home')

@section('content')
    <h1 class="text-center mt-4 mb-4">Your Daily Business Articles</h1>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4 pb-5">
            @foreach ($articles as $article)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('storage/' . $article['image']) }}" class="card-img-top"
                            alt="Image for {{ $article->judul }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->judul }}</h5>
                            <p class="card-text text-muted">By {{ $article->penulis }}</p>
                            <a href="{{ url('articleDetail/' . $article->id) }}" class="btn btn-primary">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Pagination Links -->
    <div class="container d-flex flex-column align-items-center">
        <div>Showing {{ $articles->firstItem() }} to {{ $articles->lastItem() }} of {{ $articles->total() }} results</div>
        <div>
            {{ $articles->links('pagination::bootstrap-4') }}
        </div>
    </div>

@endsection
