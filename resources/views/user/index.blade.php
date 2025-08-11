@extends('user.layout.layout')

@section('title')
    Home Page
@endsection

@section('content')
  
  <!-- navbar start hare  -->
  @include('user.layout.nav')
  <!-- navbar end hare  -->

  <!-- slider section start hare  -->
  @include('user.home.slider', ['sliders' => $sliders])
  <!-- slider section end hare  -->


  <section id="company-services" class="padding-large pb-0">
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
  </section>

  <!-- category section start hare    -->
  @include('user.home.category', ['categories' => $categories])
  <!-- category section end hare    -->


  <!-- bestselling section start -->
  @include('user.home.bestselling', ['bestsells' => $bestsells])
  <!-- bestselling section end -->


   @include('user.home.offer')

  <!-- book start hare -->
  @include('user.home.books',['books' => $books,'pageName' => 'home' ])
<!-- book end hare -->

  <!-- customer review Section start  -->
  @include('user.home.review', ['feedbacks' => $feedbacks])
  <!-- customer review Section End  -->




  <!-- <section id="latest-posts" class="padding-large">
      <div class="container">
        <div class="section-title d-md-flex justify-content-between align-items-center mb-4">
          <h3 class="d-flex align-items-center">Latest posts</h3>
          <a href="index.html" class="btn">View All</a>
        </div>
        <div class="row">
          <div class="col-md-3 posts mb-4">
            <img src="images/post-item1.jpg" alt="post image" class="img-fluid rounded-3">
            <a href="blog.html" class="fs-6 text-primary">Books</a>
            <h4 class="card-title mb-2 text-capitalize text-dark"><a href="index.html">10 Must-Read Books of the Year: Our Top Picks!</a></h4>
            <p class="mb-2">Dive into the world of cutting-edge technology with our latest blog post, where we highlight
              five essential gadge. <span><a class="text-decoration-underline text-black-50" href="index.html">Read More</a></span>
            </p>
          </div>
          <div class="col-md-3 posts mb-4">
            <img src="images/post-item2.jpg" alt="post image" class="img-fluid rounded-3">
            <a href="blog.html" class="fs-6 text-primary">Books</a>
            <h4 class="card-title mb-2 text-capitalize text-dark"><a href="index.html">The Fascinating Realm of Science Fiction</a></h4>
            <p class="mb-2">Explore the intersection of technology and sustainability in our latest blog post. Learn about
              the innovative <span><a class="text-decoration-underline text-black-50" href="index.html">Read More</a></span> </p>
          </div>
          <div class="col-md-3 posts mb-4">
            <img src="images/post-item3.jpg" alt="post image" class="img-fluid rounded-3">
            <a href="blog.html" class="fs-6 text-primary">Books</a>
            <h4 class="card-title mb-2 text-capitalize text-dark"><a href="index.html">Finding Love in the Pages of a Book</a></h4>
            <p class="mb-2">Stay ahead of the curve with our insightful look into the rapidly evolving landscape of
              wearable technology. <span><a class="text-decoration-underline text-black-50" href="index.html">Read More</a></span>
            </p>
          </div>
          <div class="col-md-3 posts mb-4">
            <img src="images/post-item4.jpg" alt="post image" class="img-fluid rounded-3">
            <a href="blog.html" class="fs-6 text-primary">Books</a>
            <h4 class="card-title mb-2 text-capitalize text-dark"><a href="index.html">Reading for Mental Health: How Books Can Heal and Inspire</a></h4>
            <p class="mb-2">In today's remote work environment, productivity is key. Discover the top apps and tools that
              can help you stay <span><a class="text-decoration-underline text-black-50" href="index.html">Read More</a></span>
            </p>
          </div>
        </div>
      </div>
    </section> -->

  <!-- <section id="instagram">
      <div class="container">
        <div class="text-center mb-4">
          <h3>Instagram</h3>
        </div>
        <div class="row">
          <div class="col-md-2">
            <figure class="instagram-item position-relative rounded-3">
              <a href="https://templatesjungle.com/" class="image-link position-relative">
                <div class="icon-overlay position-absolute d-flex justify-content-center">
                  <svg class="instagram">
                    <use xlink:href="#instagram"></use>
                  </svg>
                </div>
                <img src="images/insta-item1.jpg" alt="instagram" class="img-fluid rounded-3 insta-image">
              </a>
            </figure>
          </div>
          <div class="col-md-2">
            <figure class="instagram-item position-relative rounded-3">
              <a href="https://templatesjungle.com/" class="image-link position-relative">
                <div class="icon-overlay position-absolute d-flex justify-content-center">
                  <svg class="instagram">
                    <use xlink:href="#instagram"></use>
                  </svg>
                </div>
                <img src="images/insta-item2.jpg" alt="instagram" class="img-fluid rounded-3 insta-image">
              </a>
            </figure>
          </div>
          <div class="col-md-2">
            <figure class="instagram-item position-relative rounded-3">
              <a href="https://templatesjungle.com/" class="image-link position-relative">
                <div class="icon-overlay position-absolute d-flex justify-content-center">
                  <svg class="instagram">
                    <use xlink:href="#instagram"></use>
                  </svg>
                </div>
                <img src="images/insta-item3.jpg" alt="instagram" class="img-fluid rounded-3 insta-image">
              </a>
            </figure>
          </div>
          <div class="col-md-2">
            <figure class="instagram-item position-relative rounded-3">
              <a href="https://templatesjungle.com/" class="image-link position-relative">
                <div class="icon-overlay position-absolute d-flex justify-content-center">
                  <svg class="instagram">
                    <use xlink:href="#instagram"></use>
                  </svg>
                </div>
                <img src="images/insta-item4.jpg" alt="instagram" class="img-fluid rounded-3 insta-image">
              </a>
            </figure>
          </div>
          <div class="col-md-2">
            <figure class="instagram-item position-relative rounded-3">
              <a href="https://templatesjungle.com/" class="image-link position-relative">
                <div class="icon-overlay position-absolute d-flex justify-content-center">
                  <svg class="instagram">
                    <use xlink:href="#instagram"></use>
                  </svg>
                </div>
                <img src="images/insta-item5.jpg" alt="instagram" class="img-fluid rounded-3 insta-image">
              </a>
            </figure>
          </div>
          <div class="col-md-2">
            <figure class="instagram-item position-relative rounded-3">
              <a href="https://templatesjungle.com/" class="image-link position-relative">
                <div class="icon-overlay position-absolute d-flex justify-content-center">
                  <svg class="instagram">
                    <use xlink:href="#instagram"></use>
                  </svg>
                </div>
                <img src="images/insta-item6.jpg" alt="instagram" class="img-fluid rounded-3 insta-image">
              </a>
            </figure>
          </div>
        </div>
      </div>
    </section> -->

 @endsection