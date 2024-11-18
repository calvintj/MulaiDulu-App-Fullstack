@extends('main')

@section('title', 'About Us')

@section('content')

<section class="aboutUs py-5">
    <div class="container">
        <!-- What is MulaiDulu Section -->
        <div class="row align-items-center mb-5 justify-content-center" data-aos="fade-right">
            <div class="col-md-6">
                <h2 class="fw-bold mb-3">What is MulaiDulu?</h2>
                <p class="text-muted">
                    MulaiDulu is an innovative platform designed to empower individuals and MSMEs (Micro, Small, and Medium Enterprises) by providing tailored business coaching and mentorship. Our goal is to guide and support you in taking the first step—*Mulai Dulu*—towards achieving your professional or entrepreneurial dreams. With a focus on actionable insights and personalized guidance, we are here to help you build confidence, sustainability, and success.
                </p>
            </div>
            <div class="col-md-4 text-center">
                <img src="{{ asset('image/logo.png') }}" alt="About Us" class="img-fluid rounded shadow-lg">
            </div>
        </div>

        <!-- Central Text Section -->
        <div class="text-center mb-5">
            <h1 class="display-5 fw-bold mb-3">Empowering Action: Building Your Path to Success</h1>
            <p class="lead text-muted">Take the first step. Let MulaiDulu guide you to growth and resilience.</p>
        </div>

        <!-- Cards Section -->
        <div class="row g-4">
            <!-- Card 1 -->
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <h3 class="card-title fw-bold">Our Approach</h3>
                        <p class="card-text text-muted">
                            We offer personalized coaching sessions, practical workshops, and a supportive community designed to equip you with the tools you need to succeed in your business journey.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <h3 class="card-title fw-bold">Our Vision</h3>
                        <p class="card-text text-muted">
                            To create a world where aspiring entrepreneurs and professionals are empowered to take meaningful steps toward growth and sustainability.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center">
                        <h3 class="card-title fw-bold">Join Us</h3>
                        <p class="card-text text-muted">
                            Become a part of MulaiDulu and take the first step towards achieving your dreams. Let us help you turn your vision into reality.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
