   <!-- Header/Navigation -->
   <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
       <div class="container">
           <a class="navbar-brand d-flex align-items-center nav-link" href="{{ url('/') }}">
               <img src="{{ asset('images/logo.png') }}" alt="حماية/Protect Logo">
               <span>حماية</span>
           </a>
           <div class="d-flex">
               @auth
                   <a href="{{ url('/dashboard') }}" class="btn btn-outline-primary me-2">Dashboard</a>
               @else
                   <a href="{{ route('login') }}" class="btn btn-primary me-2">Login</a>
                   <a href="{{ route('register') }}" class="btn btn-outline-secondary">Register</a>
               @endauth
           </div>
           {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"> --}}
           {{-- <span class="navbar-toggler-icon"></span> --}}
           {{-- </button> --}}
           {{-- <div class="collapse navbar-collapse" id="navbarNav"> --}}
           {{-- <ul class="navbar-nav me-auto mb-2 mb-lg-0"> --}}
           {{-- <li class="nav-item"> --}}
           {{-- <a class="nav-link" href="#features">Features</a> --}}
           {{-- </li> --}}
           {{-- <li class="nav-item"> --}}
           {{-- <a class="nav-link" href="#how-it-works">How It Works</a> --}}
           {{-- </li> --}}
           {{-- <li class="nav-item"> --}}
           {{-- <a class="nav-link" href="#faq">FAQ</a> --}}
           {{-- </li> --}}
           {{-- </ul> --}}
           {{-- </div> --}}
       </div>
   </nav>
