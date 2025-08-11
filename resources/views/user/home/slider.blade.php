<section id="billboard" class="position-relative d-flex align-items-center bg-light-gray"
      style="background-image: url({{ asset('assets/user/images/banner-image-bg.jpg') }}); background-size: cover; background-repeat: no-repeat; background-position: center; height: auto!important;;">

      <div class="position-absolute end-0 pe-0 pe-xxl-5 me-0 me-xxl-5 swiper-next main-slider-button-next">
        <svg class="chevron-forward-circle d-flex justify-content-center align-items-center p-2" width="80" height="80">
          <use xlink:href="#alt-arrow-right-outline"></use>
        </svg>
      </div>
      <div class="position-absolute start-0 ps-0 ps-xxl-5 ms-0 ms-xxl-5 swiper-prev main-slider-button-prev">
        <svg class="chevron-back-circle d-flex justify-content-center align-items-center p-2" width="80" height="80">
          <use xlink:href="#alt-arrow-left-outline"></use>
        </svg>
      </div>
      <div class="swiper main-swiper">
        <div class="swiper-wrapper d-flex align-items-center">
          @foreach ($sliders as $slider)
          <div class="swiper-slide">
            <div class="container">
              <div class="row d-flex flex-column-reverse flex-md-row align-items-center">
                <div class="col-md-5 offset-md-1 mt-5 mt-md-0 text-center text-md-start">
                  <div class="banner-content">
                    <h2>{{ $slider->title }}</h2>
                    <p>{{ $slider->description }}</p>
                    <a href="#" class="btn mt-3">Shop Collection</a>
                  </div>
                </div>
                <div class="col-md-6 text-center">
                  <div class="image-holder">
                    <img src="{{ asset('storage').'/'.optional($slider)->img }}" class="img-fluid" alt="banner">
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>