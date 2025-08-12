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
      style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInDown;">Change Password</h1>
    <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s"
      style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInDown;">
      <li class="breadcrumb-item text-white"><a href="{{ route('home') }}">Home</a></li>
      <li class="breadcrumb-item active text-primary">Change Password</li>
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
                            <h2 class="h5 mb-0 pt-2 pb-2">Change Password</h2>
                        </div>
                        <div class="card-body p-4">
                            <div class="row">
                                <form action="" method="post" id="updatePassword">
                                    @csrf
                                        <div class="mb-3">               
                                            <label for="">Current Password</label>
                                            <input type="password"  name="c_password" id="c_password" placeholder="Enter Current Password" class="form-control p-2 @error('c_password') is-invalid
                                            @enderror" required>
                                            @error('c_password')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">               
                                            <label for="">New Password</label>
                                            <input type="password"  name="password" id="password" placeholder="Enter New Password" class="form-control p-2 @error('password') is-invalid
                                            @enderror" required>
                                            @error('password')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="mb-3">               
                                            <label for="">Confirm Password</label>
                                            <input type="password"  name="password_confirmation" id="password_confirmation" placeholder="Enter New Password Again" class="form-control p-2" required>
                                            
                                        </div>

                                        <div class="d-flex justify-content-end">
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