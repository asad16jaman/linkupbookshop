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

    .section-11 .nav-item .nav-link {
    background-color: #001d3d;
    color: #FFF;
    margin-bottom: 5px;
}
.section-11 #account-panel i {
    width: 25px;
}

.btn-dark {
    padding: 10px 20px;
    background-color: #001d3d;
    border-radius: 0px;
}
main {
    background-color: #f1f1f1;
}

.sideactive{
        background: rebeccapurple!important;
}
  </style>
@endsection

@section('content')

  <!-- navbar start hare  -->
  @include('user.layout.nav',['page' => 'wishlist'])
  <!-- navbar end hare  -->

  <div class="container-fluid bg-breadcrumb">
    <div class="bg-breadcrumb-single"></div>
    <div class="container text-center py-3" style="max-width: 900px;">
    <h1 class="text-white  mb-4 wow fadeInDown" data-wow-delay="0.1s"
      style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInDown;">My Wish</h1>
    <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s"
      style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInDown;">
      <li class="breadcrumb-item text-white"><a href="{{ route('home') }}">Home</a></li>
      <li class="breadcrumb-item active text-primary">Wish List</li>
    </ol>
    </div>
  </div>


  <section class="section-11 bg-light py-5">
        <div class="container ">
            <div class="row">
                <div class="col-md-3">
                    @include("user.profile.sidebar")
                </div>
                <div class="col-md-9">
                <div class="card">
                        <div class="card-header">
                            <h2 class="h5 mb-0 pt-2 pb-2">My Wish</h2>
                        </div>
                        <div class="card-body px-4">
                            
                            @if($data->isNotEmpty())
                                @foreach ($data as $wish)
                                    <div class="d-sm-flex justify-content-between mt-lg-1 mb-1 pb-1 pb-sm-2 border-bottom">
                                    <div class="d-block d-sm-flex align-items-start text-center text-sm-start"><a class="d-block flex-shrink-0 mx-auto me-sm-4" href="" style="width: 10rem;">
                                    <img src="{{ asset('storage').'/'.$wish->book->picture}}" alt="Product" style="height:60px"></a>
                                        <div class="pt-2">
                                            <h3 class="product-title fs-base" style="font-size:20px;margin-bottom:0px!important"><a href="">{{ $wish->book->name }}</a></h3>                                        
                                            <div class="fs-lg text-accent pt-2">${{ $wish->book->price }}</div>
                                        </div>
                                    </div>
                                    <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center d-flex flex-column">
                                        <!-- <button class="btn text-center btn-sm" type="button" 
                                        onclick="">
                                        Remove
                                        -- <i class="fas fa-trash-alt me-2"></i> 
                                        </button> -->
                                        <form action="{{ route('updateWishList',['id'=>$wish->id]) }}" method="post">
                                            @csrf
                                            <input type="submit" value="Remove" class="btn text-center btn-sm" style="width:100%;padding: 1px 10px;">
                                            </form>
                                        <a type="button" onclick="addToCard({{ $wish->book->id }})" class="btn mt-1" style="width:100%;padding: 1px 10px;">Add to Cart</a>
                                    </div>
                                </div>  
                                @endforeach
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

 

  

  

@endsection