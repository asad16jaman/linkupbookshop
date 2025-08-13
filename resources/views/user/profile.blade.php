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
  @include('user.layout.nav',['page'=>'profile'])
  <!-- navbar end hare  -->

  <div class="container-fluid bg-breadcrumb">
    <div class="bg-breadcrumb-single"></div>
    <div class="container text-center py-3" style="max-width: 900px;">
    <h1 class="text-white  mb-4 wow fadeInDown" data-wow-delay="0.1s"
      style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInDown;">Profile</h1>
    <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s"
      style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInDown;">
      <li class="breadcrumb-item text-white"><a href="{{ route('home') }}">Home</a></li>
      <li class="breadcrumb-item active text-primary">Profile</li>
    </ol>
    </div>
  </div>


  <section class="section-11 bg-light py-5">
        <div class="container ">
            <div class="row">
                <div class="col-md-3">
                    @include("user.profile.sidebar",['page'=>'profile'])
                </div>
                <div class="col-md-9">
                    <div class="card shadow">
                        <div class="card-header">
                            <h2 class="h5 mb-0 pt-2 pb-2">Personal Information</h2>
                        </div>
                        <div class="card-body p-4" style="color: #001d3d;">
                            <div class="row">
                                <form action="" method="post" id="userProfileForm">
                                    @csrf
                                        <div class="mb-3">               
                                            <label for="name">Full Name</label>
                                            <input type="text" value="{{ old('fullname',Auth::user()->fullname) }}" name="fullname" id="name" placeholder="Enter Your Full Name" class="form-control p-2 @error('fullname') is-invalid
                                            @enderror" required>
                                            @error('fullname')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3">            
                                            <label for="email">Email</label>
                                            <input type="text" value="{{ old('email',Auth::user()->email) }}" name="email" id="email" placeholder="Enter Your Email" class="form-control p-2 @error('email') is-invalid
                                            @enderror" required>
                                            @error('email')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="mb-3">                                    
                                            <label for="phone">Phone</label>
                                            <input type="text" value="{{ old('phone',Auth::user()->phone) }}" name="phone" id="phone" placeholder="Enter Your Phone" class="form-control p-2 @error('phone') is-invalid
                                            @enderror" required>
                                            @error('phone')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">                                    
                                            <label for="phone">Address</label>
                                            <textarea name="address" id="" class="form-control p-2 @error('address') is-invalid @enderror" placeholder="Your Delivery Address" required>{{ old('address',Auth::user()->address) }}</textarea>
                                            @error('address')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="d-flex">
                                            <button class="btn btn-dark">Update</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

 

  

  

@endsection