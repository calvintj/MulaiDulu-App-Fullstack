@extends('main')

@section('title', 'Contact Us')

@section('content')

    <section class="contact section container py-5" data-aos="fade-up">
        <div class="row g-4">
            <!-- Contact Features -->
            <div class="col-md-6 col-lg-3">
                <div class="card shadow-sm h-100 text-center">
                    <div class="card-body">

                        {{-- for icon --}}
                        <div class="iconBox mb-3 text-success">
                            <i class="fab fa-whatsapp fs-2"></i>
                        </div>

                        <h5 class="card-title">Chat with us</h5>
                        <p class="card-text">Speak to our friendly team</p>
                        <a href="https://wa.me/6281265571198" target="_blank" class="btn btn-outline-success">
                            +6281265571198
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card shadow-sm h-100 text-center">
                    <div class="card-body">

                        {{-- for icon --}}
                        <div class="iconBox mb-3 text-danger">
                            <i class="far fa-envelope fs-2"></i>
                        </div>

                        <h5 class="card-title">Email us your experience</h5>
                        <p class="card-text">Email our friendly team</p>
                        <a href="mailto:contact@example.com" target="_blank" class="btn btn-outline-danger">
                            contact@example.com
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card shadow-sm h-100 text-center">
                    <div class="card-body">

                        {{-- for icon --}}
                        <div class="iconBox mb-3 text-danger">
                            <i class="far fa-envelope fs-2"></i>
                        </div>

                        <h5 class="card-title">Email us your experience</h5>
                        <p class="card-text">Email our friendly team</p>
                        <a href="mailto:contact@example.com" target="_blank" class="btn btn-outline-danger">
                            contact@example.com
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card shadow-sm h-100 text-center">
                    <div class="card-body">

                        {{-- for icon --}}
                        <div class="iconBox mb-3 text-danger">
                            <i class="far fa-envelope fs-2"></i>
                        </div>

                        <h5 class="card-title">Email us your experience</h5>
                        <p class="card-text">Email our friendly team</p>
                        <a href="mailto:contact@example.com" target="_blank" class="btn btn-outline-danger">
                            contact@example.com
                        </a>
                    </div>
                </div>
            </div>
            <!-- Add more contact features here -->
        </div>

        <!-- FAQ Section -->
        @php
            $faqs = [
                [
                    'id' => 1,
                    'icon' => '<i class="fas fa-user-circle"></i>',
                    'question' => 'How do I create an account?',
                    'answer' =>
                        'You can create a free MAKANGAK account by downloading the app from the App Store or Google Play. Follow the prompts to sign up using your email or social media account.',
                ],
                [
                    'id' => 2,
                    'icon' => '<i class="fas fa-thumbs-up"></i>',
                    'question' => 'How does MAKANGAK personalize recommendations?',
                    'answer' =>
                        'MAKANGAK uses your saved preferences, past searches, and reviews to create tailored recommendations.',
                ],
                [
                    'id' => 3,
                    'icon' => '<i class="fas fa-mobile-alt"></i>',
                    'question' => 'Is MAKANGAK available for both iOS and Android devices?',
                    'answer' => 'Yes, MAKANGAK is available for download on both iOS and Android devices.',
                ],
                [
                    'id' => 4,
                    'icon' => '<i class="fas fa-mobile-alt"></i>',
                    'question' => 'Is MAKANGAK available for both iOS and Android devices?',
                    'answer' => 'Yes, MAKANGAK is available for download on both iOS and Android devices.',
                ],
                [
                    'id' => 5,
                    'icon' => '<i class="fas fa-mobile-alt"></i>',
                    'question' => 'Is MAKANGAK available for both iOS and Android devices?',
                    'answer' => 'Yes, MAKANGAK is available for download on both iOS and Android devices.',
                ],
            ];
        @endphp

        <div class="mt-5">
            <h1 class="text-center mb-4">Frequently Asked Questions</h1>
            <div class="accordion" id="faqAccordion">
                @foreach ($faqs as $faq)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading-{{ $faq['id'] }}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse-{{ $faq['id'] }}" aria-expanded="false"
                                aria-controls="collapse-{{ $faq['id'] }}">
                                {!! $faq['icon'] !!} <span class="ms-2">{{ $faq['question'] }}</span>
                            </button>
                        </h2>
                        <div id="collapse-{{ $faq['id'] }}" class="accordion-collapse collapse"
                            aria-labelledby="heading-{{ $faq['id'] }}" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                {{ $faq['answer'] }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection

@push('styles')
    <!-- Add Bootstrap and AOS CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
@endpush

@push('scripts')
    <!-- Add Bootstrap and AOS JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        // Initialize AOS
        AOS.init({
            duration: 2000
        });
    </script>
@endpush
