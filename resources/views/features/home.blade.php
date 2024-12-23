@extends('main')

@section('title', 'Home')

@section('content')

    <!-- Image with Text Overlay Section -->
    <div class="container-fluid position-relative text-center text-white" style="padding: 0;">
        <img src="{{ asset('image/home.jpg') }}" alt="Background Image" class="img-fluid w-100"
            style="width: 100%; height: 400px; object-fit: cover;">
        <div class="position-absolute top-50 start-50 translate-middle w-75">
            <h1 class="fw-bold">Empowering Your Business Journey</h1>
            <p class="fs-5">We are here to support your growth with expert advice, industry insights, and a dedicated team.
                Let’s achieve greatness together.</p>
            <a href="/aboutUs" class="btn btn-light btn-lg">Learn More</a>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row align-items-center">
            @if ($articles->isEmpty())
                <!-- No Articles Available Section -->
                <div class="col-md-12 text-center">
                    <h1 class="mb-3">No Articles Available</h1>
                    <p class="text-muted">Check back later for the latest articles.</p>
                </div>
            @else
                <!-- Text Section -->
                <div class="col-md-6">
                    <h1 class="mb-3">{{ $articles[1]->title }}</h1>
                    <p class="text-muted">By {{ $articles[1]->author }}</p>
                    <p>{{ Str::limit($articles[1]->isi_article, 200) }} {{-- Limit to 200 characters for summary --}}</p>
                    <a href="{{ url('articles') }}" class="btn btn-primary">More Articles</a>
                </div>

                <!-- Image Section -->
                <div class="col-md-6 text-center">
                    <img src="{{ Storage::url($articles[1]['image']) }}" alt="Image for {{ $articles[1]->title }}"
                        class="img-fluid rounded" style="width: 300px; height: 200px; object-fit: cover;">
                </div>
            @endif

        </div>
    </div>

    <!-- Carousel Section -->
    <div class="container">
        <div class="row align-items-center">
            <div class="container my-5 col-md-6">
                <div class="row justify-content-center">
                    <div class="col-md-15">
                        <div id="expertCarousel" class="carousel slide carousel-fade shadow-lg" data-bs-ride="carousel"
                            style="height: 400px; width: 400px">
                            {{-- Indicators --}}
                            @if ($experts->isNotEmpty())
                                <div class="carousel-indicators">
                                    @foreach ($experts as $key => $expert)
                                        <button type="button" data-bs-target="#expertCarousel"
                                            data-bs-slide-to="{{ $key }}"
                                            @if ($loop->first) class="active" aria-current="true" @endif
                                            aria-label="Slide {{ $key + 1 }}"></button>
                                    @endforeach
                                </div>
                            @endif

                            {{-- Carousel Items --}}
                            <div class="carousel-inner rounded h-100">
                                @forelse($experts as $expert)
                                    <div class="carousel-item {{ $loop->first ? 'active' : '' }} h-100">
                                        @if ($expert->image)
                                            <img src="{{ Storage::url($expert['image']) }}" class="d-block w-100 h-100"
                                                alt="{{ $expert->name }}" style="object-fit: cover;">
                                        @else
                                            <img src="{{ asset('images/default-expert.jpg') }}" class="d-block w-100 h-100"
                                                alt="Default Image" style="object-fit: cover;">
                                        @endif

                                        <div class="carousel-caption d-none d-md-block" style="bottom: 50px;">
                                            <h5 class="fw-bold fs-4 mb-3">{{ $expert->name }}</h5>
                                            <p class="mb-4">{{ Str::limit($expert->bio, 150, '...') }}</p>
                                            <a href="{{ url('expertDetail/' . $expert->id) }}" class="btn btn-light">
                                                View Profile
                                            </a>
                                        </div>
                                    </div>
                                @empty
                                    <div class="carousel-item active h-100">
                                        <div class="d-flex align-items-center justify-content-center bg-light h-100">
                                            <p class="text-muted">No experts available</p>
                                        </div>
                                    </div>
                                @endforelse
                            </div>

                            {{-- Controls --}}
                            @if ($experts->count() > 1)
                                <button class="carousel-control-prev" type="button" data-bs-target="#expertCarousel"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#expertCarousel"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            {{-- Text Section --}}
            @if ($experts->isNotEmpty())
                <div class="col-md-6">
                    <h1 class="mb-3">{{ $experts[0]->name }}</h1>
                    <p class="text-muted">{{ $experts[0]->expertise }}</p>
                    <p>{{ Str::limit($experts[0]->bio, 200) }}</p>
                    <a href="{{ url('experts') }}" class="btn btn-primary">More Experts</a>
                </div>
            @else
                <div class="col-md-6 text-center">
                    <h1 class="mb-3">No Experts Available</h1>
                    <p class="text-muted">Please check back later for updates on our experts.</p>
                </div>
            @endif
        </div>
    </div>


    <style>
        .carousel-item::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 60%;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.5), transparent);
        }

        .carousel-caption {
            z-index: 2;
        }
    </style>
@endsection
