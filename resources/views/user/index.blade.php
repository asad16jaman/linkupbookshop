@extends('user.layout.layout')

@section('title')
    Home Page
@endsection

@section('content')
  
  <!-- navbar start hare  -->
  @include('user.layout.nav',['page'=>'home'])
  <!-- navbar end hare  -->

  <!-- slider section start hare  -->
  @include('user.home.slider', ['sliders' => $sliders])
  <!-- slider section end hare  -->


  <!-- <section id="company-services" class="padding-large pb-0">
    <div class="container pt-5">
      <div class="row">
        <div class="col-lg-3 col-md-6 pb-3 pb-lg-0">
          <div class="icon-box d-flex">
            <div class="icon-box-icon pe-3 pb-3">
              <svg class="cart-outline">
                <use xlink:href="#cart-outline" />
              </svg>
            </div>
            <div class="icon-box-content">
              <h4 class="card-title mb-1 text-capitalize text-dark">Free delivery</h4>
              <p>Discover exciting daily offers and exclusive deals that make your shopping experience more affordable, fun, and rewarding every day.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 pb-3 pb-lg-0">
          <div class="icon-box d-flex">
            <div class="icon-box-icon pe-3 pb-3">
              <svg class="quality">
                <use xlink:href="#quality" />
              </svg>
            </div>
            <div class="icon-box-content">
              <h4 class="card-title mb-1 text-capitalize text-dark">Quality guarantee</h4>
              <p>We guarantee top-quality products that meet the highest standards, ensuring your complete satisfaction with every purchase you make.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 pb-3 pb-lg-0">
          <div class="icon-box d-flex">
            <div class="icon-box-icon pe-3 pb-3">
              <svg class="price-tag">
                <use xlink:href="#price-tag" />
              </svg>
            </div>
            <div class="icon-box-content">
              <h4 class="card-title mb-1 text-capitalize text-dark">Daily offers</h4>
              <p>Discover exciting daily offers and exclusive deals that make your shopping experience more affordable, fun, and rewarding every day.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 pb-3 pb-lg-0">
          <div class="icon-box d-flex">
            <div class="icon-box-icon pe-3 pb-3">
              <svg class="shield-plus">
                <use xlink:href="#shield-plus" />
              </svg>
            </div>
            <div class="icon-box-content">
              <h4 class="card-title mb-1 text-capitalize text-dark">100% secure payment</h4>
              <p>Your payments are fully protected with our 100% secure payment system, ensuring safe and worry-free transactions every time.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->

  <!-- category section start hare    -->
  @include('user.home.category', ['categories' => $categories])
  <!-- category section end hare    -->


  <!-- bestselling section start -->
  @include('user.home.bestselling', ['bestsells' => $bestsells])
  <!-- bestselling section end -->


   <!-- include('user.home.offer') -->

  <!-- book start hare -->
  @include('user.home.books',['books' => $books,'pageName' => 'home' ])
<!-- book end hare -->

  <!-- customer review Section start  -->
  @include('user.home.review', ['feedbacks' => $feedbacks])
  <!-- customer review Section End  -->


 @endsection