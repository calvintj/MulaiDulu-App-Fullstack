@extends('admin.adminMain')

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
        @if (!isset($article) && !isset($view))
            @if ($articles->isNotEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Post Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $art)
                            <tr>
                                <td>{{ $art->id }}</td>
                                <td>{{ $art->title }}</td>
                                <td>{{ $art->author }}</td>
                                <td>{{ $art->post_date }}</td>
                                <td>

                                    <a href="{{ route('admin.articlesCRUD.edit', $art->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.articlesCRUD.destroy', $art->id) }}" method="POST"
                                        style="display:inline-block;">
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
        @if (isset($article) || !isset($view))
            <form
                action="{{ isset($article) ? route('admin.articlesCRUD.update', $article->id) : route('admin.articlesCRUD.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($article))
                    @method('PUT')
                @endif

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
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control"
                        value="{{ old('title', $article->title ?? '') }}" required>
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">Author</label>
                    <input type="text" name="author" id="author" class="form-control"
                        value="{{ old('author', $article->author ?? '') }}" required>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea name="content" id="content" class="form-control" required>{{ old('content', $article->content ?? '') }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="post_date" class="form-label">Post Date</label>
                    <input type="date" name="post_date" id="post_date" class="form-control"
                        value="{{ old('post_date', $article->post_date ?? '') }}" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    @if (isset($article) && $article->image)
                        <p>Current Image:</p>
                        <img src="{{ asset('storage/' . $article->image) }}" alt="Current Image"
                            class="img-fluid mb-3">
                    @endif
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">{{ isset($article) ? 'Update' : 'Submit' }}</button>
                <a href="{{ route('admin.articlesCRUD.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        @endif


    </div>
@endsection
