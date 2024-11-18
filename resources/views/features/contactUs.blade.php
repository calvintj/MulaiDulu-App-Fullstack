@extends('main')

@section('title', 'Contact Us')

@section('content')
    <section class="contact section container py-5" data-aos="fade-up">
        <div class="contactContent row g-4">
            <!-- Contact Features -->
            <div class="col-md-6 col-lg-3">
                <div class="card shadow-sm h-100 text-center">
                    <div class="card-body">
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
            <!-- Repeat for other contact features -->
            <div class="col-md-6 col-lg-3">
                <div class="card shadow-sm h-100 text-center">
                    <div class="card-body">
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
            <!-- Add more cards as needed -->
        </div>

        <!-- FAQ Section -->
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
