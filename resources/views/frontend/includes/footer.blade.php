<footer class="bg-dark text-light py-5 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <h5 class="text-uppercase mb-3">KIZ Law Consult Myanmar</h5>
                <p class="mb-3">Professional legal services for local and foreign clients specializing in Intellectual Property, Civil Law, and Litigation.</p>
            </div>

            <div class="col-lg-2 col-md-6 mb-4">
                <h6 class="text-uppercase mb-3">Services</h6>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-light text-decoration-none">Intellectual Property</a></li>
                    <li><a href="#" class="text-light text-decoration-none">Civil Law</a></li>
                    <li><a href="#" class="text-light text-decoration-none">Litigation</a></li>
                    <li><a href="#" class="text-light text-decoration-none">Corporate Law</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-6 mb-4">
                <h6 class="text-uppercase mb-3">Quick Links</h6>
                <ul class="list-unstyled">
                    <li><a href="{{ route('frontend.index') }}" class="text-light text-decoration-none">Home</a></li>
                    <li><a href="#" class="text-light text-decoration-none">About</a></li>
                    <li><a href="#" class="text-light text-decoration-none">Contact</a></li>
                    <li><a href="#" class="text-light text-decoration-none">Blog</a></li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                <h6 class="text-uppercase mb-3">Contact Info</h6>
                @if(env('APP_ADDRESS'))
                    <p class="mb-2"><i class="fas fa-map-marker-alt me-2"></i>{{ env('APP_ADDRESS') }}</p>
                @endif
                @if(env('APP_PHONE'))
                    <p class="mb-2"><i class="fas fa-phone me-2"></i>{{ env('APP_PHONE') }}</p>
                @endif
                @if(env('APP_EMAIL'))
                    <p class="mb-2"><i class="fas fa-envelope me-2"></i>{{ env('APP_EMAIL') }}</p>
                @endif
                <div class="mt-3">
                    @if(env('FACEBOOK'))
                        <a href="{{ env('FACEBOOK') }}" class="text-light me-3" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    @endif
                    @if(env('YOUTUBE'))
                        <a href="{{ env('YOUTUBE') }}" class="text-light me-3" target="_blank"><i class="fab fa-youtube"></i></a>
                    @endif
                    @if(env('GOOGLEPLUS'))
                        <a href="{{ env('GOOGLEPLUS') }}" class="text-light me-3" target="_blank"><i class="fab fa-google-plus-g"></i></a>
                    @endif
                </div>
            </div>
        </div>

        <hr class="my-4">

        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="mb-0">&copy; {{ date('Y') }} KIZ Law Consult Myanmar. All rights reserved.</p>
            </div>
            <div class="col-md-6 text-md-end">
                <a href="#" class="text-light text-decoration-none me-3">Privacy Policy</a>
                <a href="#" class="text-light text-decoration-none">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>