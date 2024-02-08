{{-- <x-layout-app> </x-layout-app> --}}


{{-- </x-components-layouts-app> --}}


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
	<meta name="description" content="This is meta description">
	<meta name="author" content="Themefisher">
	<link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">
	<link rel="shortcut icon" href="{{asset('images/Adnos-final-file.png')}}" type="image/x-icon">
	{{-- <link rel="icon" href="images/favicon.png" tlype="image/x-icon"> --}}


	<!-- # Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">

	<!-- # CSS Plugins -->
	<link rel="stylesheet" href="{{asset('plugins/slick/slick.css')}}">
	<link rel="stylesheet" href="{{asset('plugins/font-awesome/fontawesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('plugins/font-awesome/brands.css')}}">
	<link rel="stylesheet" href="{{asset('plugins/font-awesome/solid.css')}}">

	<!-- # Main Style Sheet -->
	<link rel="stylesheet" href="{{asset('css/style.css')}}">

    @livewireStyles()



        <title>{{ $title ?? 'Adons' }}</title>
    </head>
    <body>

        <header class="navigation bg-tertiary">
            <nav class="navbar navbar-expand-xl navbar-light text-center py-3">
                <div class="container">
                    <a class="navbar-brand" wire:navigate href="{{route('home')}}">
                        <img loading="prelaod" decoding="async" class="img-fluid" width="80" src="{{asset('images/Adnos-final-file.png')}}" alt="Wallet">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                            <li class="nav-item"> <a wire:navigate class="nav-link" href="{{route('home')}}">Home</a></li>
                            <li class="nav-item "> <a wire:navigate class="nav-link" href="{{route('about')}}">About Us</a></li>
                            <li class="nav-item "> <a wire:navigate class="nav-link" href="{{route('service')}}">Services</a></li>
                            <li class="nav-item "> <a wire:navigate class="nav-link" href="{{route('team')}}">Our Team</a></li>
                            <li class="nav-item "><a wire:navigate class="nav-link " href="{{route('blog')}}">Blog</a></li>
                            <li class="nav-item "><a wire:navigate class="nav-link " href="{{route('faq')}}">FAQ</a></li>
                        </ul>
                        <a wire:navigate href="{{route('contact')}}" class="btn btn-outline-primary">Contact Us</a>
                    </div>
                </div>
            </nav>
        </header>
        <!-- /navigation -->


        <div class="section">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-10">
                  <div class="mb-5">
                    <h2 class="mb-4" style="line-height:1.5">{{$blog->title}}</h2>
                    <span>{{ \Carbon\Carbon::parse($blog->created_at)->format('d M, Y') }}<span class="mx-2">/</span> </span>
                    {{-- <p class="list-inline-item">Category : <a href="#!" class="ml-1">{{$blog->category_id}} </a> <span class="mx-2">/</span>
                    </p> --}}
                    <p class="list-inline-item">Author : <a  class="ml-1">{{$blog->author}} </a>
                    </p>
                  </div>
                  <div class="mb-5 text-center">
                    <div class="post-slider rounded overflow-hidden">
                      <img loading="lazy" decoding="async" src="{{asset('storage/'.$blog->image)}}" alt="Post Thumbnail">

                    </div>
                  </div>
                  <div class="content">
                    {!! $blog->content !!}
                  </div>
                </div>
              </div>
            </div>
          </div>



        <footer class="section-sm bg-tertiary">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-lg-2 col-md-4 col-6 mb-4">
                        <div class="footer-widget">
                            <h5 class="mb-4 text-primary font-secondary">Service</h5>
                            <ul class="list-unstyled">
                                <li class="mb-2"><a href="service-details.html">Digital Marketing</a>
                                </li>
                                <li class="mb-2"><a href="service-details.html">Web Design</a>
                                </li>
                                <li class="mb-2"><a href="service-details.html">Logo Design</a>
                                </li>
                                <li class="mb-2"><a href="service-details.html">Graphic Design</a>
                                </li>
                                <li class="mb-2"><a href="service-details.html">SEO</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 mb-4">
                        <div class="footer-widget">
                            <h5 class="mb-4 text-primary font-secondary">Quick Links</h5>
                            <ul class="list-unstyled">
                                <li class="mb-2"><a wire:navigate href="{{route('about')}}">About Us</a>
                                </li>
                                <li class="mb-2"><a wire:navigate href="#">Contact Us</a>
                                </li>
                                <li class="mb-2"><a wire:navigate href="{{route('blog')}}">Blog</a>
                                </li>
                                <li class="mb-2"><a wire:navigate href="{{route('team')}}">Team</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6 mb-4">
                        <div class="footer-widget">
                            <h5 class="mb-4 text-primary font-secondary">Other Links</h5>
                            <ul class="list-unstyled">
                                <li class="list-inline-item me-4"><a class="text-black" href="privacy-policy.html">Privacy Policy</a>
                                </li>
                                <li class="list-inline-item me-4"><a class="text-black" href="terms.html">Terms &amp; Conditions</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </footer>

        @livewireScripts()

        <!-- # JS Plugins -->
        <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('plugins/bootstrap/bootstrap.min.js')}}"></script>

        <!-- Main Script -->
        <script src="{{asset('js/script.js')}}"></script>

    </body>
</html>



