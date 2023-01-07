<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('title' , config('app.name'))</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('siteassets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('siteassets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('siteassets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('siteassets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('siteassets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('siteassets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('siteassets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('siteassets/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Sailor - v4.9.1
  * Template URL: https://bootstrapmade.com/sailor-free-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  @yield('styles')
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div style="padding: 10px">
      <div class="contact-number">
          <a href="tel:+9720592121453">
          <span>+9720592121453</span></a>
      </div>
  </div>
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="{{ route('site.index') }}">{{ __('site.Mushtaha Furniture') }}</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      {{-- navbar (about,categories,product,posts,contact) --}}
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="{{ route('site.index') }}" class="active">Home</a></li>

          <li><a href="{{ route('site.category') }}">Categories</a></li>
          <li><a href="{{ route('site.product') }}">Products</a></li>
          <li><a href="blog.html">Posts</a></li>

          <li><a href="contact.html">Contact</a></li>

          <!-- Languages -->
		  <li class="commonSelect" style="margin-left: 8px ">
              <select class="form-control"  onchange="window.location.href =  this.value">
                  @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <option {{ app()->currentLocale() == $localeCode  ? 'selected' : '' }}
                        value="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                          {{ $properties['native'] }}
                    </option>
                  @endforeach
              </select>
          </li>
          <!-- / Languages -->

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">


      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

       {{-- الصور الي في الهيدر --}}
      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url({{ asset('siteassets/img/35970b95-75ae-43b6-93b8-6a16d7e66227.jpg') }})">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">{{ __('site.Welcome to') }} <span>{{ __('site.Mushtaha Furniture') }}</span></h2>
              <p class="animate__animated animate__fadeInUp">{{ __('site.Mushtaha Furniture and General Trading Company') }}</p>
              <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">{{ __('site.Read More') }}</a>
            </div>
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item" style="background-image: url({{ asset('siteassets/img/fd3c2dff-265e-446d-b543-36a8900e4bfe.jpg') }})">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">{{ __('site.Abu Hamada Mushtaha') }}</h2>
              <p class="animate__animated animate__fadeInUp">{{ __('site.Abu Hamada Mushtaha, founder of Mushtaha Furniture and General Trading Company, died in 2021 due to infection with the Corona virus') }}</p>
              <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">{{ __('site.Read More') }}</a>
            </div>
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item" style="background-image: url({{ asset('siteassets/img/fecc17c1-36a7-40bf-bbf9-7efb4b2a7b8f.jpg') }})">
          <div class="carousel-container">
            <div class="container">
              <h2 class="animate__animated animate__fadeInDown">{{ __('site.Mushtaha Furniture Company Factory') }}</h2>
              <p class="animate__animated animate__fadeInUp">{{ __('site.The new factory was established in 2012 after the Furqan war and after a long struggle') }}</p>
              <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">{{ __('site.Read More') }}</a>
            </div>
          </div>
        </div>

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

    </div>
  </section><!-- End Hero -->


@yield('content')
  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>Sailor</h3>
              <p>
                A108 Adam Street <br>
                NY 535022, USA<br><br>
                <strong>Phone:</strong> +1 5589 55488 55<br>
                <strong>Email:</strong> info@example.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Sailor</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/sailor-free-bootstrap-theme/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('siteassets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('siteassets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('siteassets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('siteassets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('siteassets/vendor/waypoints/noframework.waypoints.js') }}"></script>
  <script src="{{ asset('siteassets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('siteassets/js/main.js') }}"></script>
@yield('scripts')
</body>

</html>
