@extends('layout')
@section('container')
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
    <div class="modal-content">

    </div>
  </div>
</div>

<!-- ======= Hero Section ======= -->



<section id="hero" class="d-flex align-items-center justify-content-between">
  <div class="container position-absolute start-50 translate-middle-x" style="top:186px;">
    <form id="ajax-form" action="{{route('getreport')}}" class="w-100">
      <div class="row gx-3">
        <div class="col-md-7">
          <div class="form-box w-100">
            @csrf
            <!-- <div class="input_wrap position-relative"> -->
            <input type="text" class="form-control h-auto bg-transparent text-light" onblur="hideLabel(this)" autocomplete="off" id="report_num" name="report" placeholder="Enter Your Report Number">

            <!-- <div class="error_msg">
                <p class="form-error-msg m-0 mb-2" id="form-error"></p>
              </div> -->
            <!-- <label for="report_num" class="position-absolute _label">Enter Your Report Number</label> -->
            <!-- <div class="animate_border position-absolute bg-warning"></div> -->
            <!-- </div> -->

            <!-- <div class="input-group mb-3">
            </div> -->
          </div>
        </div>
        <div class="col-md-5 mt-4 mt-md-0">
          <button class="btn _default_green text-light shadow-sm px-5 w-100" type="submit" id="button-addon2">Get Report</button>
        </div>
      </div>
    </form>
  </div>
  {{-- <form id="ajax-form" action="{{route('getreport')}}">
  @csrf
  <input type="text" id="report_num" name="report" placeholder="Please enter your report number"><input type="submit" value="Submit">
  </form>
  <p class="form-error-msg"></p> --}}

  <div class="hero-img d-none">
    <img src="assets/img/hero-image.png" class="img-fluid" alt="">
  </div>
</section><!-- End Hero -->

{{-- <main id="main">

  <!-- ======= About Section ======= -->
  <section id="about" class="about pt-5">
    <div class="container">

      {{-- <div class="row">

        <h2 class="text-center">India’s Best Gemological Lab</h2>

        <div>
          <img src="assets/img/about.png" class="img-fluid" alt="">
        </div>

        <div>

          <p>It is a long established fact that a reader will be distracted by the readable content of a page when
            looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of
            letters, as opposed to using 'Content here, content here', making it look like readable English. Many
            desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a
            search for 'lorem ipsum' will uncover many web sites still in their infancy.</p>

        </div>
      </div> 

      <div class="row align-items-stretch">

        <div class="col-12">
          <div class="section-title">
            <h2 class="text-center mb-3">India’s Best Gemological Lab</h2>
          </div>
        </div>


        <div class="col-md-6">
          <img src="assets/img/about.png" class="img-fluid" alt="">
        </div>

        <div class="col-md-6 d-flex justify-content-center flex-column">

          <p>It is a long established fact that a reader will be distracted by the readable content of a page when
            looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of
            letters, as opposed to using 'Content here, content here', making it look like readable English. Many
            desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a
            search for 'lorem ipsum' will uncover many web sites still in their infancy.</p>
          <button class="btn btn-warning me-auto px-5 text-light">Learn</button>

        </div>
      </div>
    </div>
  </section><!-- End About Section -->

  <section class="why_choose_us pt-5">
    <div class="container-fluid">
    <div class="row gx-2">
        <div class="col-12">
          <div class="section-title">
            <h2 class="text-center mb-3">Why Choose Us</h2>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-lg-0 mb-3">
          <div class="card p-4 border-0 bg_purple">
            <div class="img_wrap mb-3 mx-auto">
              <img src="{{url('assets/img/home_img/transparency.png')}}" alt="" class="img-fluid">
</div>
<div class="content_wrap">
  <h4 class="_title text-center">Transparency</h4>
</div>
</div>
</div>
<div class="col-lg-3 col-md-6 mb-lg-0 mb-3">
  <div class="card p-4 border-0 bg_blue">
    <div class="img_wrap mb-3 mx-auto">
      <img src="{{url('assets/img/home_img/same-day.png')}}" alt="" class="img-fluid">
    </div>
    <div class="content_wrap">
      <h4 class="_title text-center">Same Day Report</h4>
    </div>
  </div>
</div>
<div class="col-lg-3 col-md-6 mb-lg-0 mb-3">
  <div class="card p-4 border-0 bg_green">
    <div class="img_wrap mb-3 mx-auto">
      <img src="{{url('assets/img/home_img/authenticity.png')}}" alt="" class="img-fluid">
    </div>
    <div class="content_wrap">
      <h4 class="_title text-center">Authenticity</h4>
    </div>
  </div>
</div>
<div class="col-lg-3 col-md-6 mb-lg-0 mb-3">
  <div class="card p-4 border-0 bg_maroon">
    <div class="img_wrap mb-3 mx-auto">
      <img src="{{url('assets/img/home_img/collaboration.png')}}" alt="" class="img-fluid">
    </div>
    <div class="content_wrap">
      <h4 class="_title text-center">Collaboration</h4>
    </div>
  </div>
</div>
</div>
</div>
</section>

<section class="sample_report pt-5">
  <div class="container">
    <div class="row align-items-stretch">
      <div class="col-12">
        <div class="section-title">
          <h2 class="text-center mb-3">Sample Report</h2>
        </div>
      </div>
      <div class="col-lg-7">
        <img alt="" src="{{url('assets/img/home_img/Screenshot_2024-01-27-154906.png')}}" class="img-fluid h-100">
      </div>
      <div class="col-lg-5 p-3">
        <img src="{{url('assets/img/home_img/IGI-Sample-Hearts-Arrows-Report.png')}}" alt="" class="img-fluid h-100">
      </div>
    </div>
  </div>
</section>

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact pt-5">
  <div class="container">

    <div class="section-title">
      <h2>Contact</h2>
      <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
        consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit
        in iste officiis commodi quidem hic quas.</p>
    </div>

    <div class="row mt-5">

      <div class="col-lg-4">
        <div class="info">
          <div class="address">
            <i class="bi bi-geo-alt"></i>
            <h4>Location:</h4>
            <p>A108 Adam Street, New York, NY 535022</p>
          </div>

          <div class="email">
            <i class="bi bi-envelope"></i>
            <h4>Email:</h4>
            <p>info@example.com</p>
          </div>

          <div class="phone">
            <i class="bi bi-phone"></i>
            <h4>Call:</h4>
            <p>+1 5589 55488 55s</p>
          </div>

        </div>

      </div>

      <div class="col-lg-8 mt-5 mt-lg-0">

        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
          <div class="row">
            <div class="col-md-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
            </div>
          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
          </div>
          <div class="form-group mt-3">
            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
          </div>
          <div class="my-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your message has been sent. Thank you!</div>
          </div>
          <div class="text-center"><button type="submit">Send Message</button></div>
        </form>

      </div>

    </div>

    <div class="mt-3">
      <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" allowfullscreen></iframe>
    </div>

  </div>
</section><!-- End Contact Section -->

</main> --}}

@endsection