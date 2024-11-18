@extends('main')

@section('title', 'Home')

@section('content')
    <h1 class="mt-4 mb-4 mx-auto">Articles List</h1>
    <div class="container">
        <!-- Filterable Images / Cards Section -->
        <div class="row px-2 mt-4 gap-2" id="filterable-cards">
            {{-- @foreach ($articles as $article) --}}
                <div class="card p-0">
                    <img src="{{ $articles[0]->image }}" alt="img">
                    <div class="card-body">
                        <h6 class="card-title">{{ $articles[0]->judul }}</h6>
                        <p class="card-text">by {{ $articles[0]->penulis }}</p>
                        {{-- <button><a href="{{ url('bookDetail/' . $article->id) }}">Detail</a></button> --}}
                    </div>
                </div>
            {{-- @endforeach --}}
        </div>
    </div>
@endsection
