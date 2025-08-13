@extends('user.layout.layout')

@section('title')
    Home Page
@endsection

@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <style>
        .bg-breadcrumb {
            position: relative;
            overflow: hidden;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url({{ asset('assets/user/images/banner-image-bg.jpg') }});
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
            padding: 20px 0 27px 0;
        }

        .acc-btn {
            padding: 0px 20px;
        }

        .contact .info-item i {
    color: #3fbbc0;
    width: 56px;
    height: 56px;
    font-size: 24px;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: all 0.3s ease-in-out;
    border-radius: 50%;
    border: 2px dotted #3fbbc0;
}
.contact .info-item h3 {
    font-size: 20px;
    color: #444444;
    font-size: 18px;
    font-weight: 700;
    margin: 10px 0;
}
        
    </style>
@endsection

@section('content')

    <!-- navbar start hare  -->
    @include('user.layout.nav')
    <!-- navbar end hare  -->

    <div class="container-fluid bg-breadcrumb">
        <div class="bg-breadcrumb-single"></div>
        <div class="container text-center py-3" style="max-width: 900px;">
            <h1 class="text-white  mb-4 wow fadeInDown" data-wow-delay="0.1s"
                style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInDown;">Contact</h1>
            <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s"
                style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInDown;">
                <li class="breadcrumb-item text-white"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active text-primary">Contact</li>
            </ol>
        </div>
    </div>



    <!-- Contact Section -->
    <section id="contact" class="contact section pt-5">
      <div class="container mb-5" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
          <div class="col-lg-6 ">
            <div class="row gy-4">
              <div class="col-lg-12 shadow py-4">
                <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="200">
                  <a href="{{ $company->facebook }}"><i class="bi bi-facebook"></i></a>
                  <h3>Facebook</h3>
                  
                </div>
              </div><!-- End Info Item -->
              <div class="col-md-6 shadow py-4">
                <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="300">
                  <i class="bi bi-telephone"></i>
                  <h3>Call Us</h3>
                  <p>{{ $company->phone ?? "+8801xxxxxxxxxx" }}</p>
                </div>
              </div><!-- End Info Item -->
              <div class="col-md-6 shadow py-4">
                <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="400">
                  <i class="bi bi-envelope"></i>
                  <h3>Email Us</h3>
                  <p>{{ $company->email ?? "demo@gmail.com" }}</p>
                </div>
              </div><!-- End Info Item -->
            </div>
          </div>
          <div class="col-lg-5 offset-lg-1 shadow p-4">
            <form action="" method="post" class="contact-from" >
              @csrf
              <div class="row gy-4 mt-2">
                <div class="col-md-6">
                  <input type="text" name="name" class="form-control py-2 @error('name') is-invalid @enderror" placeholder="Your Name">
                  @error('name')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
                <div class="col-md-6 ">
                  <input type="email" class="form-control py-2  @error('email') is-invalid @enderror" name="email" placeholder="Your Email">
                  @error('email')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
                <div class="col-md-12">
                  <input type="text" class="form-control py-2  @error('subject') is-invalid @enderror" name="subject" placeholder="Subject" >
                  @error('subject')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
                <div class="col-md-12">
                  <textarea class="form-control  @error('message') is-invalid @enderror" name="message" rows="4" placeholder="Message" ></textarea>
                </div>
                <div class="col-md-12 text-center">
                  <button type="submit" class="btn" style="background: #3fbbc0;color: #fff">Send Message</button>
                </div>
              </div>
            </form>
          </div><!-- End Contact Form -->
        </div>
      </div>
    </section><!-- /Contact Section -->



    <!-- Faq Section -->
    <div class="container">
        <div class="row py-5">
            <div class="col-12 col-lg-8 offset-lg-2">
                <div class="accordion" id="accordionExample">
                    @foreach ($faqs as $faq)
                    <div class="accordion-item">
                        <h2 class="accordion-header" style="line-height: 45px;">
                            <button class="accordion-button acc-btn" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne{{ $faq->id }}"  aria-controls="collapseOne{{ $faq->id }}">
                               {{ $faq->question }}
                            </button>
                        </h2>
                        <div id="collapseOne{{ $faq->id }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                            <div class="accordion-body">{{ $faq->answer }}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>




            </div>
        </div>
    </div>





@endsection