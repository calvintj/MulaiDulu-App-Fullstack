@extends('main')

@section('title', 'Detail Page')

@section('content')
    <h1 class="mt-4 mb-4 mx-auto">Book Detail</h1>
    <div class="container">
        <!-- Filterable Images / Cards Section -->
        <img src="{{ $article->image }}" alt="img">
        <h6 class="mt-4 text-start">Title: {{ $article->judul }}</h6>
        <p class="text-start">Author: {{ $article->penulis }}</p>
        <p class="text-start">Year: {{ $article->post_date }}</p>
        <p class="text-start">Synopsis: <br> {{ $article->isi_article }}</p>
    </div>
@stop
