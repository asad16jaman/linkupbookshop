<section id="categories" class="padding-large pt-0 mt-5"
style="background-image: url({{  asset('assets/user/images/banner-image-bg-1.jpg') }}); background-size: cover; background-repeat: no-repeat; background-position: center; height: auto;"
>
      <div class="container">
        <div class="section-title overflow-hidden mb-4">
          <h3 class="mt-5 text-center">Categories</h3>
        </div>
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-md-4">
                    <div class="card mb-4 border-0 rounded-3 position-relative">
                    <a href="index.html">
                        <img style="height: 177px;width:100%;object-fit:cover" src="{{ asset('storage').'/'.$category->img }}" class="img-fluid rounded-3" alt="cart item">
                        <h6 class=" position-absolute bottom-0 bg-primary m-4 py-2 px-3 rounded-3"><a href="index.html"
                            class="text-white">{{ $category->name }}</a></h6>
                    </a>
                    </div>
                </div>
            @endforeach
          
        </div>
      </div>
    </section>
