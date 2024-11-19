@extends('main')

@section('title', 'Contact Us')

@section('content')

    <section class="contact section container py-5" data-aos="fade-up" style="min-height: 730px;">
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
                            whatsapp
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card shadow-sm h-100 text-center">
                    <div class="card-body">
            
                        {{-- for icon --}}
                        <div class="iconBox mb-3 text-danger">
                            <i class="fab fa-instagram fs-2"></i>
                        </div>
            
                        <h5 class="card-title">Follow us on Instagram</h5>
                        <p class="card-text">Check out our latest updates</p>
                        <a href="https://instagram.com/mulai_dulu.id" target="_blank" class="btn btn-outline-danger">
                            @mulai_dulu.id
                        </a>
                    </div>
                </div>
            </div>            
            <div class="col-md-6 col-lg-3">
                <div class="card shadow-sm h-100 text-center">
                    <div class="card-body">
            
                        {{-- for icon --}}
                        <div class="iconBox mb-3 text-primary">
                            <i class="fab fa-x-twitter fs-2"></i>
                        </div>
            
                        <h5 class="card-title">Follow us on Facebook</h5>
                        <p class="card-text">Stay updated with our latest news</p>
                        <a href="https://x.com/yourusername" target="_blank" class="btn btn-outline-primary">
                            @yourusername
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card shadow-sm h-100 text-center">
                    <div class="card-body">
            
                        {{-- for icon --}}
                        <div class="iconBox mb-3 text-danger">
                            <i class="fab fa-tiktok fs-2"></i>
                        </div>
            
                        <h5 class="card-title">Follow us on TikTok</h5>
                        <p class="card-text">Check out our latest videos</p>
                        <a href="https://tiktok.com/@mulaidulu.id" target="_blank" class="btn btn-outline-dark">
                            @mulaidulu.id
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
                    'question' => 'How do I start with MulaiDulu?',
                    'answer' =>
                        'You can sign up on our platform to explore coaching options, workshops, and resources to kickstart your journey.',
                ],
                [
                    'id' => 2,
                    'icon' => '<i class="fas fa-thumbs-up"></i>',
                    'question' => 'What services does MulaiDulu offer?',
                    'answer' =>
                        'We offer business coaching, mentorship programs, and community workshops tailored to your needs.',
                ],
                [
                    'id' => 3,
                    'icon' => '<i class="fas fa-shield-alt"></i>',
                    'question' => 'Is my data secure with MulaiDulu?',
                    'answer' => 'Yes, we prioritize your privacy and use state-of-the-art security measures to protect your data.',
                ],
                [
                    'id' => 4,
                    'icon' => '<i class="fas fa-calendar-check"></i>',
                    'question' => 'How do I schedule a coaching session?',
                    'answer' => 'Simply log in to your account, select a coach, and book a session at your preferred time.',
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
