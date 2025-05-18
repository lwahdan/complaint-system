@extends('layouts.app')

@section('content')

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content">
                    <h1>Secure Complaint Management With حماية/Protect</h1>
                    <p class="lead mb-4">Empower your organization with a secure, private, and efficient system for managing
                        internal complaints and concerns.</p>
                    <div class="d-flex flex-wrap">
                        <a href="{{ route('register') }}" class="btn btn-light btn-lg me-3 mb-2">Get Started</a>
                        <a href="#features" class="btn btn-outline-light btn-lg mb-2">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-6 mt-4 mt-lg-0">
                    <img src="{{ asset('images/hero-secure-complaints.jpg') }}" alt="Secure Complaint System"
                        class="hero-image"
                        onerror="this.src='https://via.placeholder.com/600x400?text=Secure+Complaint+System'">
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="how-it-works" id="how-it-works">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">How It Works</h2>
                <p class="text-muted">Simple, secure, and effective complaint management in just a few steps</p>
            </div>
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="step-box text-center">
                        <div class="step-number mx-auto">1</div>
                        <h4>Register</h4>
                        <p>Create your secure account with two-factor authentication protection.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="step-box text-center">
                        <div class="step-number mx-auto">2</div>
                        <h4>Submit</h4>
                        <p>File your complaint privately with end-to-end encryption.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="step-box text-center">
                        <div class="step-number mx-auto">3</div>
                        <h4>Track</h4>
                        <p>Monitor the status of your complaint in real-time.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="step-box text-center">
                        <div class="step-number mx-auto">4</div>
                        <h4>Resolve</h4>
                        <p>Get timely updates as your complaint is processed to resolution.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="features">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Security-First Features</h2>
                <p class="text-muted">Designed with security and privacy at its core</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-box">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h4>Two-Factor Authentication</h4>
                        <p>Enhanced account security with 2FA protection for all user accounts, preventing unauthorized
                            access.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <div class="feature-icon">
                            <i class="fas fa-lock"></i>
                        </div>
                        <h4>End-to-End Encryption</h4>
                        <p>All complaints are encrypted to ensure that only authorized personnel can access sensitive
                            information.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <div class="feature-icon">
                            <i class="fas fa-user-shield"></i>
                        </div>
                        <h4>Role-Based Access</h4>
                        <p>Strict permission controls ensure complaints are only visible to designated administrators.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <div class="feature-icon">
                            <i class="fas fa-history"></i>
                        </div>
                        <h4>Comprehensive Audit Logs</h4>
                        <p>Detailed activity tracking for security monitoring and compliance requirements.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <div class="feature-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h4>Status Tracking</h4>
                        <p>Real-time updates on complaint status: pending, in progress, or resolved.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <div class="feature-icon">
                            <i class="fas fa-tachometer-alt"></i>
                        </div>
                        <h4>User Dashboard</h4>
                        <p>Intuitive interface for users to monitor and manage their submitted complaints.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="statistics">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="stat-box">
                        <div class="stat-number">99.9%</div>
                        <h4>Uptime</h4>
                        <p>Ensuring your complaint system is always available when needed.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-box">
                        <div class="stat-number">256-bit</div>
                        <h4>Encryption</h4>
                        <p>Military-grade protection for all sensitive complaint data.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-box">
                        <div class="stat-number">24/7</div>
                        <h4>Security Monitoring</h4>
                        <p>Continuous system surveillance to detect and prevent threats.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Trusted By Organizations</h2>
                <p class="text-muted">See what security-conscious companies say about حماية/Protect</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="testimonial-card">
                        <p>"Implementing حماية/Protect has transformed our internal complaint management process. The
                            security features give our employees confidence that their concerns are handled privately."</p>
                        <div class="testimonial-author">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Testimonial Author">
                            <div>
                                <h5 class="mb-0">Ahmed Hassan</h5>
                                <p class="small text-muted mb-0">Chief Security Officer</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="testimonial-card">
                        <p>"The 2FA and audit logs have been crucial for our compliance requirements. حماية/Protect provided
                            exactly what we needed to securely manage internal feedback."</p>
                        <div class="testimonial-author">
                            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Testimonial Author">
                            <div>
                                <h5 class="mb-0">Layla Ibrahim</h5>
                                <p class="small text-muted mb-0">IT Director</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq" id="faq">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Frequently Asked Questions</h2>
                <p class="text-muted">Everything you need to know about حماية/Protect</p>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    How secure is the complaint data?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    All complaint data is encrypted using 256-bit encryption. Only authorized administrators
                                    can access the information, and every access is logged for security audit purposes.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    How does two-factor authentication work?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Our 2FA system requires users to verify their identity using two separate methods: their
                                    password and a time-based code sent to their mobile device, significantly enhancing
                                    account security.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Can administrators edit or delete complaints?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Administrators can only change the status of complaints (pending, in progress, resolved)
                                    but cannot edit or delete the content to maintain integrity. All status changes are
                                    recorded in the audit logs.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Can the system be customized for our organization?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Yes, حماية/Protect can be tailored to your specific organizational needs while
                                    maintaining its core security features. Contact us for customization options.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Trust Section -->
    <section class="trust">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Why Trust حماية/Protect?</h2>
                <p class="text-muted">Built with security at its foundation</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="trust-box">
                        <h4><i class="fas fa-shield-alt me-2 text-primary"></i> Security Compliance</h4>
                        <p>حماية/Protect is designed to meet stringent security standards, with regular security audits and
                            penetration testing to ensure your complaint data remains protected.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="trust-box">
                        <h4><i class="fas fa-lock me-2 text-primary"></i> Data Privacy</h4>
                        <p>We implement strict data privacy measures to ensure that sensitive information is accessible only
                            to authorized personnel and protected from unauthorized access.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta">
        <div class="container">
            <h2>Ready to Secure Your Complaint Management?</h2>
            <p class="lead mb-4">Join organizations that trust حماية/Protect for secure complaint handling</p>
            <div class="d-flex justify-content-center flex-wrap">
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-light btn-lg me-3 mb-2">Go to Dashboard</a>
                @else
                    <a href="{{ route('register') }}" class="btn btn-light btn-lg me-3 mb-2">Get Started</a>
                    <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg mb-2">Sign In</a>
                @endauth
            </div>
        </div>
    </section>
@endsection
