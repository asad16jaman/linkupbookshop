<div class="container py-5">
  @if($pageName != 'home')
  <div class="row pb-4">
      <div class="col-12">
        <div class="d-flex justify-content-end">
            <form action="">
                <input type="text" placeholder="Search By Book Name" value="{{ request()->query('search') }}" class="form-control p-1" name="search" id="">
            </form>
        </div>
      </div>
    </div>
    @endif

    <div class="row">
      @if($pageName == 'home')
      <div class="section-title overflow-hidden mb-4">
        <h3 class="text-center">Books</h3>
      </div>
      @endif

      @foreach ($books as $book)
      
      <div class="col-12 col-md-4 col-lg-3 mb-3">
        <div class="card position-relative p-4 border rounded-3">
          <div class="position-absolute">
            @if($book->discount)
                <p class="bg-primary py-1 px-3 fs-6 text-white rounded-2">{{ $book->discount }}% off</p>
            @endif
          </div>
          <img style="height:216px" src="{{ $book->picture ? asset('storage/').'/'.$book->picture : asset('assets/user/images/banner-image1.png') }}"
            class="img-fluid shadow-sm" alt="product item">
          <h6 class="mt-4 mb-0 fw-bold"><a href="{{ route('singlebook',['id'=>$book->uuid]) }}">{{ optional($book)->name }}</a></h6>
          <div class="review-content d-flex">
            <p class="my-2 me-2 fs-6 text-black-50">{{ optional($book)->author }}</p>

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
          </div>
          <span class="price text-primary fw-bold mb-2 fs-5"></span>
          <div class="card-concern position-absolute start-0 end-0 d-flex gap-2">
            <button type="button" onclick="addToCard({{ $book->id }})" class="btn btn-dark" data-bs-toggle="tooltip" data-bs-placement="top"
              data-bs-title="Tooltip on top">
              <svg class="cart">
                <use xlink:href="#cart"></use>
              </svg>
            </button>
            <form action="{{ route('storeInWishlist',['id'=> $book->id]) }}" method="post">
              @csrf
              <button type="submit" class="btn btn-dark">
                 <span>
                <svg class="wishlist">
                  <use xlink:href="#heart"></use>
                </svg>
              </span>
              </button>
            </form>
            <!-- <a href="" class="btn btn-dark">
              <span>
                <svg class="wishlist">
                  <use xlink:href="#heart"></use>
                </svg>
              </span>
            </a> -->
          </div>
        </div>
      </div>
      
    @endforeach

    </div>
    @if($pageName == 'home')
      <div class="row">
        <div class="col d-flex justify-content-center">
            <a href="{{ route('allbooks') }}" class="btn btn-primary mt-3 p-2">See All Books</a>
        </div>
    </div>

    @endif
    
  </div>

  @push('script')
  <script>

    function createCartLi(name,qty,price){
      return `<li class="list-group-item bg-transparent d-flex justify-content-between lh-sm">
                  <div>
                  <h5 style="font-size: 16px;margin-bottom: 0px;">
                    <a href="">${name}(${qty})</a>
                  </h5>
                  <small>ldsksd</small>
                  </div>
                  <span class="text-primary">${price}</span>
                </li>`
    }

    function addToCard(id){
      let url = "{{ route('user.addCart', ['id' => ':id']) }}";
      url = url.replace(':id', id);

      axios.get(url)
      .then(res=>{
        let response = res.data
        if(response.status){
            showToast("Successfully Added!", 'success');
            let cartbooks = Object.values(response.content);
            let allCart = cartbooks.map(ele=>{
              return createCartLi(ele.name,ele.qty,ele.price)
            })
            document.getElementById('navCart').innerHTML = allCart;
            document.getElementById('totalPrice').innerHTML = response.totalItem
            document.getElementById('totalItem').innerHTML = response.totalItem
            document.getElementById('totalItemCart').innerHTML = response.totalPrice

          }
      })
    }

  </script>

  @endpush