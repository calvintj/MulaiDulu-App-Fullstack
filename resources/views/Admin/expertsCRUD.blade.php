@extends('admin.adminMain')

@section('content')
    <div class="container p-5">
        <h1>
            @if (isset($expert))
                Edit Expert
            @elseif (!empty($experts))
                Experts
            @else
                Create Expert
            @endif
        </h1>

        {{-- List all experts --}}
        @if (!isset($expert))
            @if ($experts->isNotEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Expertise</th>
                            <th>Price</th>
                            <th>Rating</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($experts as $exp)
                            <tr>
                                <td>{{ $exp->id }}</td>
                                <td>{{ $exp->name }}</td>
                                <td>{{ $exp->expertise }}</td>
                                <td>Rp {{ number_format($exp->rate_price, 2) }}</td>
                                <td>{{ $exp->rating }}</td>
                                <td>
                                    <a href="{{ route('admin.expertsCRUD.show', $exp->id) }}"
                                        class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('admin.expertsCRUD.edit', $exp->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.expertsCRUD.destroy', $exp->id) }}" method="POST"
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
                <p>No experts found.</p>
            @endif
        @endif

        {{-- Create/Edit Expert --}}
        @if (isset($expert) || !empty($experts))
            <form
                action="{{ isset($expert) ? route('admin.expertsCRUD.update', $expert->id) : route('admin.expertsCRUD.store') }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @if (isset($expert))
                    @method('PUT')
                @endif

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control"
                        value="{{ old('name', $expert->name ?? '') }}" required>
                </div>
                <div class="mb-3">
                    <label for="expertise" class="form-label">Expertise</label>
                    <input type="text" name="expertise" id="expertise" class="form-control"
                        value="{{ old('expertise', $expert->expertise ?? '') }}" required>
                </div>
                <div class="mb-3">
                    <label for="bio" class="form-label">Bio</label>
                    <textarea name="bio" id="bio" class="form-control" required>{{ old('bio', $expert->bio ?? '') }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="rate_price" class="form-label">Price</label>
                    <input type="number" name="rate_price" id="rate_price" class="form-control"
                        value="{{ old('rate_price', $expert->rate_price ?? '') }}" required>
                </div>
                <div class="mb-3">
                    <label for="rating" class="form-label">Rating</label>
                    <input type="number" step="0.1" name="rating" id="rating" class="form-control"
                        value="{{ old('rating', $expert->rating ?? '') }}" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    @if (isset($expert) && $expert->image)
                        <img src="{{ asset('storage/' . $expert->image) }}" alt="Current Image" class="img-fluid mb-3">
                    @endif
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">{{ isset($expert) ? 'Update' : 'Submit' }}</button>
                <a href="{{ route('admin.expertsCRUD.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        @endif
    </div>
@endsection
