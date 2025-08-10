<section id="customers-reviews" class="position-relative padding-large"
      style="background-image: url({{ asset('assets/user/images/banner-image-bg.jpg') }}); background-size: cover; background-repeat: no-repeat; background-position: center; height: auto;">
      <div class="container offset-md-3 col-md-6 ">
        <div class="position-absolute top-50 end-0 pe-0 pe-xxl-5 me-0 me-xxl-5 swiper-next testimonial-button-next">
          <svg class="chevron-forward-circle d-flex justify-content-center align-items-center p-2" width="80" height="80">
            <use xlink:href="#alt-arrow-right-outline"></use>
          </svg>
        </div>
        <div class="position-absolute top-50 start-0 ps-0 ps-xxl-5 ms-0 ms-xxl-5 swiper-prev testimonial-button-prev">
          <svg class="chevron-back-circle d-flex justify-content-center align-items-center p-2" width="80" height="80">
            <use xlink:href="#alt-arrow-left-outline"></use>
          </svg>
        </div>
        <div class="section-title mb-4 text-center">
          <h3 class="mb-4">Customers reviews</h3>
        </div>
        <div class="swiper testimonial-swiper ">
          <div class="swiper-wrapper">

          @forelse($feedbacks as $feedback)
            <div class="swiper-slide">
              <div class="card position-relative text-left p-5 border rounded-3">
                <blockquote style="font-size:15px">{{ $feedback->note }}</blockquote>
                <div class="rating text-warning d-flex align-items-center">
                  <svg class="star star-fill">
                    <use xlink:href="#star-fill"></use>
                  </svg>
                  <svg class="star star-fill">
                    <use xlink:href="#star-fill"></use>
                  </svg>
                  <svg class="star star-fill">
                    <use xlink:href="#star-fill"></use>
                  </svg>
                  <svg class="star star-fill">
                    <use xlink:href="#star-fill"></use>
                  </svg>
                  <svg class="star star-fill">
                    <use xlink:href="#star-fill"></use>
                  </svg>
                </div>
                <h5 class="mt-1 fw-normal">{{  $feedback->user->username }}</h5>
              </div>
            </div>

          @empty

            <div class="swiper-slide">
              <div class="card position-relative text-left p-5 border rounded-3">
                <blockquote>No Feedback Yeat</blockquote>
                <div class="rating text-warning d-flex align-items-center">
                  <svg class="star star-fill">
                    <use xlink:href="#star-fill"></use>
                  </svg>
                  <svg class="star star-fill">
                    <use xlink:href="#star-fill"></use>
                  </svg>
                  <svg class="star star-fill">
                    <use xlink:href="#star-fill"></use>
                  </svg>
                  <svg class="star star-fill">
                    <use xlink:href="#star-fill"></use>
                  </svg>
                  <svg class="star star-fill">
                    <use xlink:href="#star-fill"></use>
                  </svg>
                </div>
                <h5 class="mt-1 fw-normal">No Users</h5>
              </div>
            </div>


          @endforelse
            

           


          </div>
        </div>
      </div>
    </section>