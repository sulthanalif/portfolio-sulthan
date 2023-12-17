<!DOCTYPE html>
<html lang="en">
<head>

     <title>Portfolio - Sulthan</title>

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="Tooplate">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="{{ asset('assets') }}/css/bootstrap.min.css">
     <link rel="stylesheet" href="{{ asset('assets') }}/css/all.min.css">
     <link rel="stylesheet" href="{{ asset('assets') }}/css/owl.carousel.min.css">
     <link rel="stylesheet" href="{{ asset('assets') }}/css/owl.theme.default.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="{{ asset('assets') }}/css/tooplate-ben-resume-style.css">

     <!-- Tambahkan di bagian head HTML -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
    <!--
    Tooplate 2120 Ben Resume
    https://www.tooplate.com/view/2120-ben-resume
    -->
</head>

<body data-spy="scroll" data-target="#navbarNav" data-offset="50">

    <!-- MENU BAR -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">

            <a class="navbar-brand" href="#">
                Sulthan Portfolio
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a href="#intro" class="nav-link smoothScroll">Introduction</a>
                    </li>

                    <li class="nav-item">
                        <a href="#about" class="nav-link smoothScroll">About Me</a>
                    </li>

                    <li class="nav-item">
                        <a href="#portfolio" class="nav-link smoothScroll">Portfolio</a>
                    </li>

                    <li class="nav-item">
                        <a href="#contact" class="nav-link smoothScroll">Contact</a>
                    </li>
                </ul>

                <div class="mt-lg-0 mt-3 mb-4 mb-lg-0">
                    <a href="#" class="custom-btn btn" download>Download CV</a>
                </div>
            </div>

        </div>
    </nav>


    <!-- HERO -->
    <section class="hero d-flex flex-column justify-content-center align-items-center" id="intro">

         <div class="container">
            <div class="row">

                  <div class="mx-auto col-lg-5 col-md-5 col-10" >
                      <img src="{{ asset('assets') }}/images/{{ $getHeader->image }}" class="img-fluid" alt="Sulthan Resume HTML Template">
                  </div>

                   <div class="d-flex flex-column justify-content-center align-items-center col-lg-7 col-md-7 col-12">
                        <div class="hero-text">

                            <h1 class="hero-title">👋 {{ $getHeader->name }}, {{ $getHeader->as }}</h1>

                            <a href="#" class="email-link">
                                {{ $getHeader->email }}
                            </a>

                        </div>
                    </div>

            </div>
        </div>
    </section>


    <section class="about section-padding" id="about">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-md-6 col-12">
                    <h3 class="mb-4">{{ $getAbout->title }}</h3>

                    <p>
                        {{ $getAbout->description }}
                    </p>

                    <ul class="mt-4 mb-5 mb-lg-0 profile-list list-unstyled">
                        <li><strong>Full Name :</strong> {{ $getAbout->full_name }} </li>

                        <li><strong>Date of Birth:</strong> {{ $getAbout->birth }}</li>

                        {{-- <li><strong>Website :</strong> company.co</li> --}}

                        <li><strong>Email :</strong> {{ $getAbout->email }}</li>
                    </ul>
                </div>

                <div class="col-lg-5 mx-auto col-md-6 col-12">
                    <img src="{{ asset('assets') }}/images/{{ $getAbout->image }}" class="about-image img-fluid" alt="Ben's Resume HTML Template">
                </div>

            </div>
            <div class="row about-third">
            	<div class="col-lg-4 col-md-4 col-12">
                <h3>Integer volutpat</h3>
                <p>Sed eu risus tincidunt, finibus dolor non, gravida ex. Donec lacinia mi nec erat tempus, vel consectetur ante scelerisque. Ut blandit, risus in venenatis ultricies, lacus tellus fermentum.</p>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                <h3>Mauris semper</h3>
                <p>Cras et nisl vestibulum, accumsan elit sed, pretium enim. Vestibulum in condimentum magna. Maecenas quam magna, iaculis eu turpis et, commodo pulvinar leo.</p>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                <h3>Integer id neque</h3>
                <p>Duis at mollis leo, venenatis congue ex. Cras urna dui, gravida euismod lectus et, cursus tempor nulla. Praesent at turpis quis ex tristique gravida quis eget eros.</p>
                </div>
            </div>
        </div>
    </section>


    <!-- PORTFOLIO -->
    <section class="testimonials section-padding" id="portfolio">
        <div class="container">
            <div class="row">

                <div class="col-12">
                    <h3 class="mb-5 text-center">Portfolio</h3>

                    <div class="container mt-5">
                        <div class="row">
                            @foreach ($getPortfolio as $item)
                                <div class="col-md-4 mb-4">
                                    <div class="card h-100"> <!-- Menambahkan class h-100 untuk membuat card dengan tinggi tetap -->
                                        <a href="{{ asset('assets/images/' . $item->image) }}" class="portfolio-link">
                                            <img src="{{ asset('assets/images/' . $item->image) }}" class="card-img-top" alt="Portfolio Image">
                                        </a>
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $item->title }}</h5>
                                            <p class="card-text">{{ $item->description }}</p>
                                            <!-- Tambahkan kolom-kolom lain sesuai kebutuhan -->
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>





     <section class="contact section-padding pt-0" id="contact">
      <div class="container">
        <div class="row">

          <div class="col-lg-6 col-md-6 col-12">
            <form action="#" method="get" class="contact-form webform"  role="form">

                <div class="form-group d-flex flex-column-reverse">
                    <input type="text" class="form-control" name="cf-name" id="cf-name" placeholder="Your Name">

                    <label for="cf-name" class="webform-label">Full Name</label>
                </div>

                <div class="form-group d-flex flex-column-reverse">
                    <input type="email" class="form-control" name="cf-email" id="cf-email" placeholder="Your Email">

                    <label for="cf-email" class="webform-label">Your Email</label>
                </div>

                <div class="form-group d-flex flex-column-reverse">
                    <textarea class="form-control" rows="5" name="cf-message" id="cf-message" placeholder="Your Message"></textarea>

                    <label for="cf-message" class="webform-label">Message</label>
                </div>

                <button type="submit" class="form-control" id="submit-button" name="submit">Send</button>
            </form>
          </div>

            <div class="mx-auto col-lg-4 col-md-6 col-12">
                <h3 class="my-4 pt-4 pt-lg-0">{{ $getContact->title }}</h3>

                <p class="mb-1">{{ $getContact->number }}</p>

                <p>
                    <a href="mailto:{{ $getContact->email }}">
                        {{ $getContact->email }}
                    <i class="fas fa-arrow-right custom-icon"></i>
                    </a>
                </p>

                <ul class="social-links mt-2">
                    @if ($getContact->facebook != NULL)
                    <li><a href="{{ $getContact->facebook }}" target="blank" rel="noopener" class="fab fa-facebook"></a></li>
                    @endif
                    @if ($getContact->twitter != NULL)
                    <li><a href="{{ $getContact->twitter }}" target="blank" rel="noopener" class="fab fa-twitter"></a></li>
                    @endif
                    @if ($getContact->instagram != NULL)
                    <li><a href="{{ $getContact->instagram }}" target="blank" rel="noopener" class="fab fa-instagram"></a></li>
                    @endif
                    @if ($getContact->linkedin != NULL)
                    <li><a href="{{ $getContact->linkedin }}" target="blank" rel="noopener" class="fab fa-linkedin"></a></li>
                    @endif
                    @if ($getContact->youtube != NULL)
                    <li><a href="{{ $getContact->youtube }}" target="blank" rel="noopener" class="fab fa-youtube"></a></li>
                    @endif
                </ul>

              <p class="copyright-text mt-5 pt-3">Copyright &copy; {{ now()->format('Y') }} {{ $getContact->cr }}</p>


            </div>

        </div>
      </div>
    </section>
    <script>
    $(document).ready(function() {
        $('.portfolio-link').magnificPopup({
            type: 'image',
            gallery: { enabled: true },
            removalDelay: 300,
            mainClass: 'mfp-fade',
            callbacks: {
                beforeOpen: function() {
                    this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');
                    this.st.mainClass = this.st.el.attr('data-effect');
                }
            },
            closeOnContentClick: true,
            midClick: true
        });
    });
</script>

     <!-- SCRIPTS -->
     <script src="{{ asset('assets') }}/js/jquery.min.js"></script>
     <script src="{{ asset('assets') }}/js/bootstrap.min.js"></script>
     <script src="{{ asset('assets') }}/js/smoothscroll.js"></script>
     <script src="{{ asset('assets') }}/js/owl.carousel.min.js"></script>
     <script src="{{ asset('assets') }}/js/custom.js"></script>


    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script> --}}

</body>
</html>
