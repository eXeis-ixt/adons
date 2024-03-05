<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
	<meta name="description" content="Innovate. Excel. Succeed!">
    <meta name="author" content="Adons">
    <meta name="keywords" content="Adons, Web design, Graphic design, Digital marketing, Bangladesh">
	<link rel="shortcut icon" href="{{asset('images/Adnos-final-file.png')}}" type="image/x-icon">
	<link rel="icon" href="images/favicon.png" type="image/x-icon">

    <meta property="og:title" content="Adons" />
<meta property="og:description" content="Innovate. Excel. Succeed!" />
<meta property="og:image" content="{{asset('images/Adnos-final-file.png')}}" />

    <script type='application/ld+json'>
        {
          "@context": "http://www.schema.org",
          "@type": "Organization",
          "name": "Adons",
          "url": "https://adons.org",
          "logo": "{{asset('images/Adnos-final-file.png')}}",
          "image": "{{asset('images/what-is-adons.webp')}}",
          "description": "Adons, your one-stop destination for cutting-edge solutions in web development, graphic design, and digital marketing. At Adons, we believe in the power of creativity, innovation, and technology to transform your digital presence and propel your business to new heights."
        }
         </script>


	<!-- # Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">

	<!-- # CSS Plugins -->
    @yield('css')
	<link rel="stylesheet" href="plugins/slick/slick.css">
	{{-- <link rel="stylesheet" href="plugins/font-awesome/fontawesome.min.css">
	<link rel="stylesheet" href="plugins/font-awesome/brands.css">
	<link rel="stylesheet" href="plugins/font-awesome/solid.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<!-- # Main Style Sheet -->
	<link rel="stylesheet" href="css/style.css">

    @livewireStyles()



        <title>{{ $title ?? 'Adons' }}</title>
    </head>
    <body>

        <header class="navigation bg-tertiary">
            <nav class="navbar navbar-expand-xl navbar-light text-center py-3">
                <div class="container">
                    <a class="navbar-brand" wire:navigate href="{{route('home')}}">
                        <img loading="prelaod" decoding="async" class="img-fluid" width="80" src="{{asset('images/Adnos-final-file.png')}}"  alt="Wallet">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                            <li class="nav-item"> <a wire:navigate class="nav-link" href="{{route('home')}}">Home</a></li>
                            <li class="nav-item "> <a wire:navigate class="nav-link" href="{{route('about')}}">About Us</a></li>
                            <li class="nav-item "> <a wire:navigate class="nav-link" href="{{route('service')}}">Services</a></li>
                            <li class="nav-item "> <a wire:navigate class="nav-link" href="{{route('portfolio')}}">Portfolio</a></li>
                            {{-- <li class="nav-item "> <a wire:navigate class="nav-link" href="{{route('team')}}">Our Team</a></li> --}}
                            <li class="nav-item "><a wire:navigate class="nav-link " href="{{route('blog')}}">Blog</a></li>
                            {{-- <li class="nav-item "><a wire:navigate class="nav-link " href="{{route('faq')}}">FAQ</a></li> --}}
                        </ul>
                        <a wire:navigate href="{{route('contact')}}" class="btn btn-outline-primary">BOOK OUR CONSULTATION</a>
                    </div>
                </div>
            </nav>
        </header>
        <!-- /navigation -->


        @yield('content')
        {{ $slot }}



        <footer class="section-sm bg-tertiary">
            <div class="container">
                <div class="row justify-content-between">
                    {{-- <div class="col-lg-2 col-md-4 col-6 mb-4">
                        <div class="footer-widget">
                            <h5 class="mb-4 text-primary font-secondary">Service</h5>
                            <ul class="list-unstyled">


                                <li class="mb-2"><a href="service-details.html">Digital Marketing</a>
                                </li>
                                <li class="mb-2"><a href="service-details.html"></a>
                                </li>
                                <li class="mb-2"><a href="service-details.html">Logo Design</a>
                                </li>
                                <li class="mb-2"><a href="service-details.html">Graphic Design</a>
                                </li>
                                <li class="mb-2"><a href="service-details.html">SEO</a>
                                </li>


                            </ul>
                        </div>
                    </div> --}}
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

                    <div class="col-lg-2 col-md-4 col-6 mb-4">
                        <div class="footer-widget">
                            <h5 class="mb-4 text-primary font-secondary">Social Media</h5>
                            <ul class="list-unstyled">
                                <li class="list-inline-item me-4"><a class="text-black" href="#">Facebook</a>
                                </li>
                                <li class="list-inline-item me-4"><a class="text-black" href="#">Insta</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            <br>
            <div style="text-align: center">
                All © Copyright reserved to <a href="{{route('home')}}">Adons</a> | 2023 - {{date('Y')}}
            </div>
        </footer>

        @livewireScripts()

        <!-- # JS Plugins -->
        @yield('js')
        <script src="plugins/jquery/jquery.min.js"></script>
        <script src="plugins/bootstrap/bootstrap.min.js"></script>

        <!-- Main Script -->

        <script src="js/script.js"></script>

    </body>
</html>



