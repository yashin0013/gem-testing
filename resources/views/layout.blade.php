<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Gem Testing India</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Dosis:300,400,500,,600,700,700i|Lato:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/custom.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top py-0">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="{{url('/')}}" class="logo"><img src="assets/img/gems-testing-india-logo.webp" alt="" class="img-fluid"></a>
      <!-- Uncomment below if you prefer to use text as a logo -->
      <!-- <h1 class="logo"><a href="index.html">Butterfly</a></h1> -->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active mx-3" href="/">Home</a></li>
          <li><a class="nav-link scrollto mx-3" href="/services">Services</a></li>
          <li><a class="nav-link scrollto mx-3" href="/contact-us">Contact Us</a></li>
          <li><a class="nav-link scrollto mx-3" href="/about-us">About Us</a></li>
          <li><a class="nav-link scrollto mx-3" href="/blog">BLOG</a></li>
          <li><a class="nav-link scrollto mx-3" href="/faq">FAQ</a></li>
          {{-- <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto mx-3" href="#team">Team</a></li> --}}
          <li>
            <a href="/verify-reports" class="btn btn-success _btn ms-4 rounded-pill px-3 text-light d-inline-block">VERIFY REPORTS</a>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->


  @section('container')
  @show


  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row justify-content-center">

          <div class="col-lg-4 col-md-6 footer-links mb-4 mb-lg-0">
            <div class="d-inline-block rounded-1 overflow-hidden px-3" style="background:#fff;width: 50%;height: 50px;">
              <img src="assets/img/gems-testing-india-logo.webp" alt="logo_img" class="img-fluid" style="transform:translateY(-15px);">
            </div>
            <h4 class="text-light mt-4">D-15, South Extension- 2, New Delhi-110049</h4>
            <h4 class="text-light mt-2"><a class="text-light" href="mailto:gemtestingindia@gmail.com"><i class="fa-regular fa-envelope me-2"></i> E-MAIL</a></h4>
            <!-- <p class="text-light">Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p> -->
            <!-- <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div> -->
          </div>

          <div class="col-lg-2 col-md-6 footer-links mb-4 mb-lg-0">
            <h4>Company</h4>
            <!-- <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br><br>
              <strong>Phone:</strong><a href="tel:1 5589 55488 55" class="text-dark"> +1 5589 55488 55</a><br>
              <strong>Email:</strong><a href="mailto:info@example.com" class="text-dark"> info@example.com</a><br>
            </p> -->
            <ul>
              <li>
                <i class="fa-solid fa-angle-right me-2"></i>
                <a href="/about-us">About us</a>
              </li>
              <li>
                <i class="fa-solid fa-angle-right me-2"></i>
                <a href="/contact-us">Contact Us</a>
              </li>
              <li>
                <i class="fa-solid fa-angle-right me-2"></i>
                <a href="/faq">FAQ</a>
              </li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-6 footer-links mb-4 mb-lg-0">
            <h4>Customer Service</h4>
            <ul>
              <li>
                <i class="fa-solid fa-angle-right me-2"></i>
                <a href="/privacy-policy">Privacy Policy</a>
              </li>
              <li>
                <i class="fa-solid fa-angle-right me-2"></i>
                <a href="/terms-conditions">Terms & Conditions</a>
              </li>
              <li>
                <i class="fa-solid fa-angle-right me-2"></i>
                <a href="/disclaimer">Disclaimer</a>
              </li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-6 footer-links mb-4 mb-lg-0">
            <h4>Services</h4>
            <ul>
              <li>
                <i class="fa-solid fa-angle-right me-2"></i>
                <a href="/services">Our Services</a>
              </li>
              <li>
                <i class="fa-solid fa-angle-right me-2"></i>
                <a href="/shop">Shop</a>
              </li>
              <li>
                <i class="fa-solid fa-angle-right me-2"></i>
                <a href="/blog">News & Blogs</a>
              </li>
            </ul>
          </div>


        </div>
      </div>
    </div>

    <div class="container pb-4">
      <div class="copyright text-light w-100 text-center fs-6">
        Copyrights © 2024 Gems Testing India. All Rights Reserved
      </div>

    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div class="notify"></div>
  <!-- Vendor JS Files -->

  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/script.js"></script>

</body>

</html>