<div class="search-popup">
  <div class="search-popup-container">

    <form role="search" method="get" class="search-form" action="">
      <input type="search" id="search-form" class="search-field" placeholder="Type and press enter" value="" name="s" />
      <button type="submit" class="search-submit"><svg class="search">
          <use xlink:href="#search"></use>
        </svg></button>
    </form>

    <h5 class="cat-list-title">Browse Categories</h5>

    <ul class="cat-list">

      <li class="cat-list-item">
        <a href="#" title="Romance">Romance</a>
      </li>
      <!-- <li class="cat-list-item">
            <a href="#" title="Thriller">Thriller</a>
          </li>
          <li class="cat-list-item">
            <a href="#" title="Sci-fi">Sci-fi</a>
          </li>
          <li class="cat-list-item">
            <a href="#" title="Cooking">Cooking</a>
          </li>
          <li class="cat-list-item">
            <a href="#" title="Health">Health</a>
          </li>
          <li class="cat-list-item">
            <a href="#" title="Lifestyle">Lifestyle</a>
          </li>
          <li class="cat-list-item">
            <a href="#" title="Fiction">Fiction</a>
          </li> -->
    </ul>

  </div>
</div>

<header id="header" class="site-header">
  <div class="top-info border-bottom d-none d-md-block ">
    <div class="container-fluid">
      <div class="row g-0">
        <div class="col-md-4">
          <p class="fs-6 my-2 text-center">Need any help? Call us <a href="#">{{ optional($company)->phone }}</a></p>
        </div>
        <div class="col-md-4 border-start border-end">
          <p class="fs-6 my-2 text-center">{{ optional($company)->notice1 }}
        </div>
        <div class="col-md-4">
          <p class="fs-6 my-2 text-center">{{ optional($company)->notice2 }}</p>
        </div>
      </div>
    </div>
  </div>

  <nav id="header-nav" class="navbar navbar-expand-lg" style="padding:0px">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home') }}">
        <img style="width: 100px;" src="{{ asset('storage/') . '/' . optional($company)->logo }}" class="logo">
      </a>
      <button class="navbar-toggler d-flex d-lg-none order-3 p-2" type="button" data-bs-toggle="offcanvas"
        data-bs-target="#bdNavbar" aria-controls="bdNavbar" aria-expanded="false" aria-label="Toggle navigation">
        <svg class="navbar-icon">
          <use xlink:href="#navbar-icon"></use>
        </svg>
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="bdNavbar" aria-labelledby="bdNavbarOffcanvasLabel">
        <div class="offcanvas-header px-4 pb-0">
          <a class="navbar-brand" href="index.html">
            <img src="{{ asset('storage/') . '/' . optional($company)->logo }}" class="logo">
          </a>
          <button type="button" class="btn-close btn-close-black" data-bs-dismiss="offcanvas" aria-label="Close"
            data-bs-target="#bdNavbar"></button>
        </div>
        <div class="offcanvas-body">
          <ul id="navbar"
            class="navbar-nav text-uppercase justify-content-start justify-content-lg-center align-items-start align-items-lg-center flex-grow-1">
            <li class="nav-item">
              <a class="nav-link me-4 active" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link me-4" href="{{ route('about') }}">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link me-4" href="index.html">Shop</a>
            </li>
            <li class="nav-item">
              <a class="nav-link me-4" href="index.html">Blogs</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link me-4 dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                aria-expanded="false">Pages</a>
              <ul class="dropdown-menu animate slide border">
                <li>
                  <a href="index.html" class="dropdown-item fw-light">About</a>
                </li>
                <li>
                  <a href="index.html" class="dropdown-item fw-light">Shop</a>
                </li>
                <li>
                  <a href="index.html" class="dropdown-item fw-light">Single Product</a>
                </li>
                <li>
                  <a href="index.html" class="dropdown-item fw-light">Cart</a>
                </li>
                <li>
                  <a href="index.html" class="dropdown-item fw-light">Checkout</a>
                </li>
                <li>
                  <a href="index.html" class="dropdown-item fw-light">Blog</a>
                </li>
                <li>
                  <a href="index.html" class="dropdown-item fw-light">Single Post</a>
                </li>
                <li>
                  <a href="index.html" class="dropdown-item fw-light">Contact</a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link me-4" href="index.html">Contact</a>
            </li>
          </ul>
          <div class="user-items d-flex">
            <ul class="d-flex justify-content-end list-unstyled mb-0">
              <li class="search-item pe-3">
                <a href="#" class="search-button">
                  <svg class="search">
                    <use xlink:href="#search"></use>
                  </svg>
                </a>
              </li>

              @if(!Auth::user())
          <li class="pe-3">
          <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <svg class="user">
            <use xlink:href="#user"></use>
            </svg>
          </a>
          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header border-bottom-0">
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              <div class="tabs-listing">
                <nav>
                <div class="nav nav-tabs d-flex justify-content-center" id="nav-tab" role="tablist">
                  <button class="nav-link text-capitalize active" id="nav-sign-in-tab" data-bs-toggle="tab"
                  data-bs-target="#nav-sign-in" type="button" role="tab" aria-controls="nav-sign-in"
                  aria-selected="true">Sign In</button>
                  <button class="nav-link text-capitalize" id="nav-register-tab" data-bs-toggle="tab"
                  data-bs-target="#nav-register" type="button" role="tab" aria-controls="nav-register"
                  aria-selected="false">Register</button>
                </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                <!--======================= Sign In modal is start  ==========================-->
                <div class="tab-pane fade active show" id="nav-sign-in" role="tabpanel"
                  aria-labelledby="nav-sign-in-tab">
                  <p id="loginError" style="text-align:center;color:red"></p>
                  <form action="" id="UserLoginForm">
                  <div class="form-group py-3">
                    <label class="mb-2" for="loginUername">Username *</label>
                    <input type="text" minlength="2" id="logUername" name="username"
                    placeholder="Your Username" class="form-control w-100 rounded-3 p-2">

                  </div>
                  <div class="form-group pb-3">
                    <label class="mb-2" for="logpassword">Password *</label>
                    <input type="password" minlength="2" id="logpassword" name="password"
                    placeholder="Your Password" class="form-control w-100 rounded-3 p-2">
                  </div>
                  <label class="py-3">
                    <input type="checkbox" class="d-inline">
                    <span class="label-body">Remember me</span>
                    <span class="label-body"><a href="#" class="fw-bold">Forgot Password</a></span>
                  </label>
                  <button type="submit" name="submit" class="btn btn-dark w-100 my-3">Login</button>
                  </form>
                </div>
                <!--======================= registration modal is start  ==========================-->
                <div class="tab-pane fade" id="nav-register" role="tabpanel"
                  aria-labelledby="nav-register-tab" style="font-size:15px">
                  <form method="post" id="registerForm">

                  <div class="form-group py-3">
                    <label class="mb-2" for="username">Your Username *</label>
                    <input type="text" minlength="2" id="username" name="username"
                    placeholder="Your Username" class="form-control w-100 rounded-3 p-2">
                    <p class="text-danger" id="nameError"></p>
                  </div>
                  <div class="form-group pb-3">
                    <label class="mb-2" for="password">Password *</label>
                    <input type="password" minlength="2" id="password" name="password"
                    placeholder="Your Password" class="form-control w-100 rounded-3 p-2">
                    <p class="text-danger" id="passwordError"></p>
                  </div>
                  <div class="form-group pb-3">
                    <label class="mb-2" for="sign-in">Confirm Password *</label>
                    <input type="password" minlength="2" name="password_confirmation"
                    placeholder="Confirm Password" class="form-control w-100 rounded-3 p-2">
                  </div>
                  <label class="py-3">
                    <input type="checkbox" required class="d-inline">
                    <span class="label-body">I agree to the <a href="#" class="fw-bold">Privacy
                      Policy</a></span>
                  </label>
                  <button type="submit" name="submit" class="btn btn-dark w-100 my-3">Register</button>
                  </form>
                </div>
                <!--======================= registration modal is end  ==========================-->
                </div>
              </div>
              </div>
            </div>
            </div>
          </div>
          </li>
        @endif

              @if(Auth::check())

              <li class="nav-item dropdown">
              <a class="nav-link me-4 dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                aria-expanded="false">{{ Auth::user()->username }}</a>
              <ul class="dropdown-menu animate slide border">
                 <li>
                  <a href="" class="dropdown-item fw-light">Profile</a>
                </li>
                 
                <li>
                  <form action="{{ route('user.logout') }}" method="post">
                    @csrf
                    <input type="submit" value="Logout" class="dropdown-item fw-light">
                  </form>
                  <!-- <a href="index.html" class="">Logout</a> -->
                </li>
                
              </ul>
            </li>


              <li class="wishlist-dropdown dropdown pe-3">
              <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" role="button" aria-expanded="false">
                <svg class="wishlist">
                <use xlink:href="#heart"></use>
                </svg>
              </a>
              <div class="dropdown-menu animate slide dropdown-menu-start dropdown-menu-lg-end p-3">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-primary">Your wishlist</span>
                <span class="badge bg-primary rounded-pill">{{ $wish['count'] }}</span>
                </h4>
                <ul class="list-group mb-3">
                  @forelse($wish['products'] as $wish)
                    <li class="list-group-item bg-transparent d-flex justify-content-between lh-sm">
                    <div>
                    <h5 style="font-size:16px">
                      <a href="index.html">{{ $wish->book->name }}</a>
                    </h5>
                    <small>{{ $wish->book->author }}<small>
                      <div class="d-flex justify-content-between">
                        <form action="{{ route('updateWishList',['id'=>$wish->id]) }}" method="post">
                          @csrf
                          <input type="submit" value="Remove" class="fw-medium text-capitalize mt-2" style="bckground:red">
                        </form>
                        
                        <a href="#" class="d-block fw-medium text-capitalize mt-2">Add to cart</a>
                      </div>
                      
                    </div>
                    <span class="text-primary">${{ $wish->book->price }}</span>
                  </li>

                  @empty

                    <li class="list-group-item bg-transparent d-flex justify-content-between lh-sm">
                    <div>
                    <h5 style="font-size:16px">
                      <a type="p">No Product Found</a>
                    </h5>
                    
                  </li>

                  @endforelse
                
                
                <!-- <li class="list-group-item bg-transparent d-flex justify-content-between">
            <span class="text-capitalize"><b>Total (USD)</b></span>
            <strong>$1470</strong>
            </li> -->
                </ul>
                @if($wish['count'] != '0')
                <div class="d-flex flex-wrap justify-content-center">
                <a href="#" class="w-100 btn btn-dark mb-1" type="submit">Add all to cart</a>
                <a href="index.html" class="w-100 btn btn-primary" type="submit">View cart</a>
                </div>
                @endif
              </div>
              </li>

              <li class="cart-dropdown dropdown">
              <a href="index.html" class="dropdown-toggle" data-bs-toggle="dropdown" role="button"
                aria-expanded="false">
                <svg class="cart">
                <use xlink:href="#cart"></use>
                </svg><span class="fs-6 fw-light">(02)</span>
              </a>
              <div class="dropdown-menu animate slide dropdown-menu-start dropdown-menu-lg-end p-3">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-primary">Your cart</span>
                <span class="badge bg-primary rounded-pill">2</span>
                </h4>
                <ul class="list-group mb-3">
                <li class="list-group-item bg-transparent d-flex justify-content-between lh-sm">
                  <div>
                  <h5>
                    <a href="index.html">Secrets of the Alchemist</a>
                  </h5>
                  <small>High quality in good price.</small>
                  </div>
                  <span class="text-primary">$870</span>
                </li>
                <li class="list-group-item bg-transparent d-flex justify-content-between lh-sm">
                  <div>
                  <h5>
                    <a href="index.html">Quest for the Lost City</a>
                  </h5>
                  <small>Professional Quest for the Lost City.</small>
                  </div>
                  <span class="text-primary">$600</span>
                </li>
                <li class="list-group-item bg-transparent d-flex justify-content-between">
                  <span class="text-capitalize"><b>Total (USD)</b></span>
                  <strong>$1470</strong>
                </li>
                </ul>
                <div class="d-flex flex-wrap justify-content-center">
                <a href="index.html" class="w-100 btn btn-dark mb-1" type="submit">View Cart</a>
                <a href="index.html" class="w-100 btn btn-primary" type="submit">Go to checkout</a>
                </div>
              </div>
              </li>
            @endif


            </ul>
          </div>
        </div>
      </div>
    </div>
  </nav>

</header>

@push('script')

  <script>
    @if(!Auth::check())
    document.getElementById('registerForm').addEventListener('submit', function (e) {
    e.preventDefault();
    let form = e.target;
    let formData = new FormData(form);
    let posturl = "{{ route('user.register') }}";

    axios.post(posturl, formData)
      .then(function (response) {

      let res = response.data;
      if (!res.status) {
        if (res.error.username) {
        document.getElementById('username').classList.add('is-invalid');
        document.getElementById('nameError').innerHTML = res.error.username[0]
        console.log(res.error.username)
        } else {
        document.getElementById('username').classList.remove('is-invalid');
        document.getElementById('nameError').innerHTML = '';
        }
        if (res.error.password) {
        document.getElementById('password').classList.add('is-invalid');
        document.getElementById('passwordError').innerHTML = res.error.password[0]
        } else {
        document.getElementById('password').classList.remove('is-invalid');
        document.getElementById('passwordError').innerHTML = '';
        }

      } else {
        window.location.href = "{{ route('home') }}"
      }

      })
      .catch(function (error) {
      if (error.response) {
        console.error('Error:', error.response.data);
        alert('Error: ' + (error.response.data.message || 'Something went wrong!'));
      } else {
        console.error('Error:', error.message);
      }
      });
    })

    document.getElementById('UserLoginForm').addEventListener('submit', function (e) {
    e.preventDefault();

    let form = e.target;
    let formData = new FormData(form);
    let posturl = "{{ route('user.login') }}";

    axios.post(posturl, formData, {
      headers: {
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
      }
    })
      .then(function (response) {
      let res = response.data;
      if (!res.status) {
        document.getElementById('loginError').innerHTML = "Invalid Cradential!";
      } else {
        window.location.href = "{{ route('home') }}"
      }
      })
      .catch(function (error) {
      if (error.response) {
        console.error('Error:', error.response.data);
        alert('Error: ' + (error.response.data.message || 'Something went wrong!'));
      } else {
        console.error('Error:', error.message);
      }
      });

    })

    @endif



  </script>
@endpush