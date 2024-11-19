@extends('main')

@section('title', 'Course')

@section('content')
    <h1>Available Courses</h1>
    <div class="row">
        @foreach ($courses as $course)
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $course->name }}</h5>
                        <p class="card-text">{{ $course->description }}</p>
                        <p class="card-text"><strong>${{ $course->price }}</strong></p>
                        <form action="{{ route('cart.add', $course) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
