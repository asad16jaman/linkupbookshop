<!DOCTYPE html>
<html>

<head>
  <title>Book Shop</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="author" content="">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <link rel="icon" type="image/png" href="{{ asset('storage/') . '/' . optional($company)->logo }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/user/style.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
    rel="stylesheet">
</head>

<body>
  <!-- loader start  -->
  @include('user.layout.loader')
  <!-- loader start  -->

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
  @include('user.home.books',['books' => $books ])
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

  <footer id="footer" class="padding-large">
    <div class="container">
      <div class="row">
        <div class="footer-top-area">
          <div class="row d-flex flex-wrap justify-content-between">
            <div class="col-lg-3 col-sm-6 pb-3">
              <div class="footer-menu">
                <img src="{{ asset('storage/') . '/' . $company->logo }}" alt="logo" class="img-fluid mb-2">
                <p>{{ optional($company)->footer_text }}</p>
                <div class="social-links">
                  <ul class="d-flex list-unstyled">
                    <li>
                      <a target="_blank" href="{{ optional($company)->facebook }}">
                        <svg class="facebook">
                          <use xlink:href="#facebook" />
                        </svg>
                      </a>
                    </li>
                    <!-- <li>
                        <a href="#">
                          <svg class="instagram">
                            <use xlink:href="#instagram" />
                          </svg>
                        </a>
                      </li> -->
                    <!-- <li>
                        <a href="#">
                          <svg class="twitter">
                            <use xlink:href="#twitter" />
                          </svg>
                        </a>
                      </li> -->
                    <li>
                      <a target="_blank" href="{{ optional($company)->linkdin }}">
                        <svg class="linkedin">
                          <use href="#linkedin" />
                        </svg>
                      </a>
                    </li>
                    <!-- <li>
                        <a href="#">
                          <svg class="youtube">
                            <use xlink:href="#youtube" />
                          </svg>
                        </a>
                      </li> -->
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-sm-6">
              <div class="footer-menu text-capitalize">
                <h5 class="widget-title pb-2">Quick Links</h5>
                <ul class="menu-list list-unstyled text-capitalize">
                  <li class="menu-item mb-1">
                    <a href="#">Home</a>
                  </li>
                  <li class="menu-item mb-1">
                    <a href="#">About</a>
                  </li>
                  <li class="menu-item mb-1">
                    <a href="#">Shop</a>
                  </li>
                  <li class="menu-item mb-1">
                    <a href="#">Blogs</a>
                  </li>
                  <li class="menu-item mb-1">
                    <a href="#">Contact</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="footer-menu text-capitalize">
                <h5 class="widget-title pb-2">Help & Info Help</h5>
                <ul class="menu-list list-unstyled">
                  <li class="menu-item mb-1">
                    <a href="#">Track Your Order</a>
                  </li>
                  <li class="menu-item mb-1">
                    <a href="#">Returns Policies</a>
                  </li>
                  <li class="menu-item mb-1">
                    <a href="#">Shipping + Delivery</a>
                  </li>
                  <li class="menu-item mb-1">
                    <a href="#">Contact Us</a>
                  </li>
                  <li class="menu-item mb-1">
                    <a href="#">Faqs</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="footer-menu contact-item">
                <h5 class="widget-title text-capitalize pb-2">Contact Us</h5>
                <p>Do you have any queries or suggestions? <a href="mailto:"
                    class="text-decoration-underline">{{ optional($company)->email }}</a></p>
                <p>If you need support? Just give us a call. <a href="#"
                    class="text-decoration-underline">{{ optional($company)->phone2 }}</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <hr>
  <div id="footer-bottom" class="mb-2">
    <div class="container">
      <div class="d-flex flex-wrap justify-content-center">
        <div class="copyright">
          <p>© Copyright 2024 . HTML Template by {{ optional($company)->name }}
          </p>
        </div>
      </div>
    </div>
  </div>

  <script src="{{ asset('assets/user/js/jquery-1.11.0.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
  <script type="text/javascript" src="{{ asset('assets/user/js/script.js') }}"></script>
</body>

</html>