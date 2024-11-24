@extends('main')

@section('content')
    <div class="container p-5">
        <h1>
            @if (isset($course))
                Edit Course
            @elseif (!empty($courses))
                Courses
            @else
                Create Course
            @endif
        </h1>

        {{-- List all courses --}}
        @if (!isset($course))
            @if ($courses->isNotEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $c)
                            <tr>
                                <td>{{ $c->id }}</td>
                                <td>{{ $c->name }}</td>
                                <td>${{ number_format($c->price, 2) }}</td>
                                <td>
                                    <a href="{{ route('admin.coursesCRUD.show', $c->id) }}"
                                        class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('admin.coursesCRUD.edit', $c->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.coursesCRUD.destroy', $c->id) }}" method="POST"
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
                <p>No courses found.</p>
            @endif
        @endif

        {{-- Create/Edit Course --}}
        @if (isset($course) || !empty($courses))
            <form
                action="{{ isset($course) ? route('admin.coursesCRUD.update', $course->id) : route('admin.coursesCRUD.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($course))
                    @method('PUT')
                @endif

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control"
                        value="{{ old('name', $course->name ?? '') }}" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control">{{ old('description', $course->description ?? '') }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" step="0.01" name="price" id="price" class="form-control"
                        value="{{ old('price', $course->price ?? '') }}" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    @if (isset($course) && $course->image)
                        <img src="{{ asset('storage/' . $course->image) }}" alt="Current Image" class="img-fluid mb-3">
                    @endif
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">{{ isset($course) ? 'Update' : 'Submit' }}</button>
                <a href="{{ route('admin.coursesCRUD.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        @endif
    </div>
@endsection
