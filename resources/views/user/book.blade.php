@extends('user.layout.layout')

@section('title')
  Home Page
@endsection

@section('style')
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

    .bookPicture {
    width: 100%;
    max-height: 500px;
    object-fit: contain;
    background: #b3b0b0f5;
    }
    .iconstyle{
          width: 50px;
    height: 30px;
    color: #fff;
    }
    .bookbtn{
          border: none;
    background: #f86d72;
    /* color: #fff !important; */
    padding: 5px 21px;
    border-radius: 5px;
    }
  </style>
@endsection

@section('content')

  <!-- navbar start hare  -->
  @include('user.layout.nav')
  <!-- navbar end hare  -->

  <div class="container py-5">
    <div class="row">
    <div class="col-12 col-md-6">
      <img src="{{ $book->picture ? asset('storage').'/'.$book->picture : asset('assets/user/images/banner-image1.png') }}" alt="book Image Not Found" class="bookPicture">
    </div>
    <div class="col-12 col-md-6 mt-2 mt-md-0">
      <h3>{{ $book->name }}</h3>
      <p>{{ $book->author }}</p>
      <div>
      <h4>Book Detail</h4>
      <table>
        <tbody>
        <tr>
          <td>Author </td>
          <td>: </td>
          <td>{{ $book->author }}</td>
        </tr>
        <tr>
          <td>Category </td>
          <td>: </td>
          <td>{{ $book->category->name }}</td>
        </tr>
        <tr>
          <td>Language</td>
          <td>: </td>
          <td>{{ $book->language ?? "Bangla" }}</td>
        </tr>
        <tr>
          <td>Total Page </td>
          <td>: </td>
          <td>{{ $book->totalPage ?? "Not Mention" }}</td>
        </tr>

        <tr>
          <td>Price </td>
          <td>: </td>
          <td>{{ $book->price  }}</td>
        </tr>
        </tbody>
      </table>
      </div>
      <div>
      <h3>Description</h3>
      <p> {!! $book->long_description ?? "Not Found" !!}
      </p>
      </div>

    </div>
    </div>
    <div class="d-flex justify-content-end">
        <button onclick="addToCard({{ $book->id }})" class="bookbtn">
          <svg class="cart iconstyle" >
                <use xlink:href="#cart"></use>
              </svg>
        </button>
        <button class="bookbtn" style="margin-left:10px">
          <svg class="wishlist iconstyle" >
                  <use xlink:href="#heart"></use>
                </svg>
        </button>
    </div>
  </div>


@endsection

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