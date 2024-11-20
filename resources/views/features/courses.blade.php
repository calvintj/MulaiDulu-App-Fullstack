@extends('main')

@section('title', 'Courses and Experts')

@section('content')
    <div class="container mt-5 pb-5">
        <h1 class="text-center mb-4">Explore Our Offerings</h1>

        <!-- Tab Navigation -->
        <ul class="nav nav-tabs" id="contentTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="courses-tab" data-bs-toggle="tab" data-bs-target="#courses" type="button"
                    role="tab" aria-controls="courses" aria-selected="true">
                    Courses
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="experts-tab" data-bs-toggle="tab" data-bs-target="#experts" type="button"
                    role="tab" aria-controls="experts" aria-selected="false">
                    Experts
                </button>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content mt-4" id="contentTabsContent">
            <!-- Courses Tab -->
            <div class="tab-pane fade show active" id="courses" role="tabpanel" aria-labelledby="courses-tab">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach ($courses as $course)
                        <div class="col">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $course->name }}</h5>
                                    <p class="card-text">{{ Str::limit($course->description, 100, '...') }}</p>
                                    <p class="card-text text-success fw-bold">${{ $course->price }}</p>
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#courseModal{{ $course->id }}">
                                            Read More
                                        </button>
                                        <form action="{{ route('cart.add', $course) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-primary btn-sm">Add to Cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Course Modal -->
                        <div class="modal fade" id="courseModal{{ $course->id }}" tabindex="-1"
                            aria-labelledby="courseModalLabel{{ $course->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="courseModalLabel{{ $course->id }}">{{ $course->name }}
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        {{ $course->description }}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Experts Tab -->
            <div class="tab-pane fade" id="experts" role="tabpanel" aria-labelledby="experts-tab">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    @foreach ($experts as $expert)
                        <div class="col">
                            <div class="card h-100 shadow-sm">
                                <img src="{{ $expert->image }}" class="card-img-top" alt="{{ $expert->name }}"
                                    style="object-fit: cover; height: 200px;">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $expert->name }}</h5>
                                    <p class="card-text">
                                        <strong>Rating:</strong> {{ number_format($expert->rating, 1) }} / 5
                                    </p>
                                    <p class="card-text">
                                        <strong>Bio:</strong> {{ Str::limit($expert->bio, 100, '...') }}
                                    </p>
                                    <a href="{{ url('expertDetail/' . $expert->id) }}" class="btn btn-primary mt-3">View
                                        Details</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection