@extends('frontend.layouts.app')

@section('title', 'KIZ Law Consult Myanmar - Legal Services for Local & Foreign Clients')

@section('content')
<!-- Hero Section -->
<section class="hero-section bg-primary text-white py-5 mb-5" style="background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-12">
                <h1 class="display-4 font-weight-bold mb-4">KIZ Law Consult Myanmar</h1>
                <p class="lead mb-4">Professional legal services in Myanmar. We give services to the satisfaction of local & foreign clients in the specific fields of Intellectual Property, Civil & Litigation. With us, you can trustly build long-term relationships.</p>
                <div class="hero-buttons">
                    <a href="#contact" class="btn btn-light btn-lg mb-2 mr-md-3">Get Legal Consultation</a>
                    <a href="#services" class="btn btn-outline-light btn-lg mb-2">Our Services</a>
                </div>
            </div>
            <div class="col-lg-4 d-none d-lg-block text-center">
                <i class="fas fa-balance-scale" style="font-size: 8rem; opacity: 0.3;"></i>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="py-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="display-5 font-weight-bold">Our Legal Services</h2>
                <p class="lead text-muted">Comprehensive legal solutions for both local and international clients</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <i class="fas fa-lightbulb text-primary mb-3" style="font-size: 3rem;"></i>
                        <h5 class="card-title">Intellectual Property</h5>
                        <p class="card-text">Comprehensive IP protection including trademarks, patents, copyrights, and trade secrets. We help safeguard your intellectual assets.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <i class="fas fa-handshake text-primary mb-3" style="font-size: 3rem;"></i>
                        <h5 class="card-title">Civil Law</h5>
                        <p class="card-text">Expert handling of civil matters including contracts, property disputes, family law, and business transactions.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body text-center">
                        <i class="fas fa-gavel text-primary mb-3" style="font-size: 3rem;"></i>
                        <h5 class="card-title">Litigation</h5>
                        <p class="card-text">Professional representation in court proceedings, dispute resolution, and legal advocacy to protect your interests.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="bg-light py-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="display-5 font-weight-bold">Why Choose KIZ Law</h2>
                <p class="lead text-muted">Experience, expertise, and dedication to our clients</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12 mb-4">
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-globe text-primary" style="font-size: 2rem;"></i>
                    </div>
                    <div class="flex-grow-1 ml-3">
                        <h5>Local & International Expertise</h5>
                        <p>We serve both local and foreign clients with deep understanding of Myanmar's legal landscape and international law.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 mb-4">
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-users text-primary" style="font-size: 2rem;"></i>
                    </div>
                    <div class="flex-grow-1 ml-3">
                        <h5>Long-term Relationships</h5>
                        <p>We believe in building lasting partnerships with our clients based on trust, reliability, and exceptional service.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 mb-4">
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-award text-primary" style="font-size: 2rem;"></i>
                    </div>
                    <div class="flex-grow-1 ml-3">
                        <h5>Client Satisfaction</h5>
                        <p>Our commitment to excellence ensures that we deliver services to the complete satisfaction of our clients.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 mb-4">
                <div class="d-flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-clock text-primary" style="font-size: 2rem;"></i>
                    </div>
                    <div class="flex-grow-1 ml-3">
                        <h5>Timely Solutions</h5>
                        <p>We understand the importance of time in legal matters and provide prompt, efficient legal solutions.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="display-5 font-weight-bold">Contact Us</h2>
                <p class="lead text-muted">Ready to discuss your legal needs? Get in touch with our experienced team.</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <div class="card shadow">
                    <div class="card-body p-5">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 mb-4 contact-info">
                                <div class="text-center">
                                    <i class="fas fa-map-marker-alt text-primary mb-3" style="font-size: 2rem;"></i>
                                    <h5>Office Location</h5>
                                    <p class="text-muted">{{ config('appsetting.basic.address') }}<br>Myanmar</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 mb-4 contact-info">
                                <div class="text-center">
                                    <i class="fas fa-envelope text-primary mb-3" style="font-size: 2rem;"></i>
                                    <h5>Email Us</h5>
                                    <p class="text-muted">{{ config('appsetting.basic.email') }}<br>{{ config('appsetting.basic.phone') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <!-- <a href="{{route('frontend.contact')}}" class="btn btn-primary btn-lg">Send Message</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
