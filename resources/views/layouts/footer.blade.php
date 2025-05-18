 <!-- Footer -->
 <footer class="footer">
     <div class="container">
         <div class="row">
             <div class="col-lg-4 mb-4 mb-lg-0">
                 <img src="{{ asset('images/logo.png') }}" alt="حماية/Protect Logo" class="footer-logo">
                 <p>Secure complaint management system designed for organizations that prioritize security and privacy.
                 </p>
                 <div class="social-icons mt-3">
                     <a href="#"><i class="fab fa-twitter"></i></a>
                     <a href="#"><i class="fab fa-linkedin"></i></a>
                     <a href="#"><i class="fab fa-facebook"></i></a>
                 </div>
             </div>
             <div class="col-lg-2 col-md-4 mb-4 mb-md-0">
                 <h5 class="mb-3">Product</h5>
                 <ul class="footer-links">
                     <li><a href="#features">Features</a></li>
                     <li><a href="#how-it-works">How It Works</a></li>
                     <li><a href="#faq">FAQ</a></li>
                     <li><a href="#">Security</a></li>
                 </ul>
             </div>
             <div class="col-lg-2 col-md-4 mb-4 mb-md-0">
                 <h5 class="mb-3">Pages</h5>
                 <ul class="footer-links">
                     <li><a href="{{ route('login') }}">Login</a></li>
                     <li><a href="{{ route('register') }}">Register</a></li>
                 </ul>
             </div>
             <div class="col-lg-4 col-md-4">
                 <h5 class="mb-3">Contact Us</h5>
                 <ul class="footer-links">
                     <li><i class="fas fa-envelope me-2"></i> info@himaya-protect.com</li>
                     <li><i class="fas fa-phone me-2"></i> 00692799999999</li>
                     <li><i class="fas fa-map-marker-alt me-2"></i> Amman, Jordan</li>
                 </ul>
             </div>
         </div>
         <div class="copyright text-center">
             <p>&copy; {{ date('Y') }} حماية/Protect. All rights reserved.</p>
         </div>
     </div>
 </footer>