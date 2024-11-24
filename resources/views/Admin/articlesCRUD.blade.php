@extends('main')

@section('content')
    <div class="container p-5">
        <h1>
            @if (isset($article))
                Edit Article
            @elseif (isset($view))
                View Article
            @else
                Articles
            @endif
        </h1>

        {{-- List all articles --}}
        @if(!isset($article) && !isset($view))
            @if ($articles->isNotEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Post Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $art)
                            <tr>
                                <td>{{ $art->id }}</td>
                                <td>{{ $art->judul }}</td>
                                <td>{{ $art->penulis }}</td>
                                <td>{{ $art->post_date }}</td>
                                <td>
                                    <a href="{{ route('admin.articlesCRUD.show', $art->id) }}" class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('admin.articlesCRUD.edit', $art->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.articlesCRUD.destroy', $art->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No articles found.</p>
            @endif
        @endif

        {{-- Create/Edit Article --}}
        @if(isset($article) || !isset($view))
            <form action="{{ isset($article) ? route('admin.articlesCRUD.update', $article->id) : route('admin.articlesCRUD.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($article)) @method('PUT') @endif

                {{-- Validation Errors --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" name="judul" id="judul" class="form-control"
                           value="{{ old('judul', $article->judul ?? '') }}" required>
                </div>
                <div class="mb-3">
                    <label for="penulis" class="form-label">Penulis</label>
                    <input type="text" name="penulis" id="penulis" class="form-control"
                           value="{{ old('penulis', $article->penulis ?? '') }}" required>
                </div>
                <div class="mb-3">
                    <label for="isi_article" class="form-label">Isi Article</label>
                    <textarea name="isi_article" id="isi_article" class="form-control" required>{{ old('isi_article', $article->isi_article ?? '') }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="post_date" class="form-label">Post Date</label>
                    <input type="date" name="post_date" id="post_date" class="form-control"
                           value="{{ old('post_date', $article->post_date ?? '') }}" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    @if(isset($article) && $article->image)
                        <p>Current Image:</p>
                        <img src="{{ asset('storage/' . $article->image) }}" alt="Current Image" class="img-fluid mb-3">
                    @endif
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">{{ isset($article) ? 'Update' : 'Submit' }}</button>
                <a href="{{ route('admin.articlesCRUD.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        @endif

        {{-- View Article --}}
        @if(isset($view))
            <div class="card mt-3">
                <div class="card-body">
                    <h2>{{ $view->judul }}</h2>
                    <p><strong>Penulis:</strong> {{ $view->penulis }}</p>
                    <p><strong>Isi Article:</strong> {{ $view->isi_article }}</p>
                    <p><strong>Post Date:</strong> {{ $view->post_date }}</p>
                    @if ($view->image)
                        <img src="{{ asset('storage/' . $view->image) }}" alt="Article Image" class="img-fluid">
                    @endif
                    <a href="{{ route('admin.articlesCRUD.index') }}" class="btn btn-secondary mt-3">Back</a>
                </div>
            </div>
        @endif
    </div>
@endsection
