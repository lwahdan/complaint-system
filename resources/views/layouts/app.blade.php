<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>حماية/Protect - Secure Complaint Management System</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    @yield('content')
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Add this JavaScript to enhance the landing page with basic animations 
    // and improve user experience

    document.addEventListener('DOMContentLoaded', function() {
        // Add fade-in class to elements for animation
        const sections = document.querySelectorAll('section');
        sections.forEach(section => {
            const elements = section.querySelectorAll('h2, .row > div');
            elements.forEach((el, index) => {
                el.classList.add('fade-in');
                // Stagger the animations
                el.style.transitionDelay = `${index * 0.1}s`;
            });
        });

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                const targetId = this.getAttribute('href');
                if (targetId === '#') return;

                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80, // Account for fixed header
                        behavior: 'smooth'
                    });

                    // Update active state in navigation
                    document.querySelectorAll('.nav-link').forEach(navLink => {
                        navLink.classList.remove('active');
                    });
                    this.classList.add('active');
                }
            });
        });

        // Add active class to navigation based on scroll position
        window.addEventListener('scroll', function() {
            const scrollPosition = window.scrollY;

            document.querySelectorAll('section[id]').forEach(section => {
                const sectionTop = section.offsetTop - 100;
                const sectionHeight = section.offsetHeight;
                const sectionId = section.getAttribute('id');

                if (scrollPosition >= sectionTop && scrollPosition < sectionTop +
                    sectionHeight) {
                    document.querySelector(`.nav-link[href="#${sectionId}"]`)?.classList.add(
                        'active');
                } else {
                    document.querySelector(`.nav-link[href="#${sectionId}"]`)?.classList.remove(
                        'active');
                }
            });
        });

        // Initialize intersection observer for animation triggers
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.fade-in').forEach(element => {
            observer.observe(element);
        });

        // Add subtle hover effects to buttons
        document.querySelectorAll('.btn').forEach(button => {
            button.addEventListener('mouseover', function() {
                this.style.transform = 'translateY(-2px)';
                this.style.transition = 'all 0.3s ease';
            });

            button.addEventListener('mouseout', function() {
                this.style.transform = 'translateY(0)';
            });
        });

        // Add active class to feature boxes on hover
        document.querySelectorAll('.feature-box').forEach(box => {
            box.addEventListener('mouseover', function() {
                document.querySelectorAll('.feature-box').forEach(b => {
                    b.classList.remove('active-feature');
                });
                this.classList.add('active-feature');
            });
        });
    });
</script>

</html>
