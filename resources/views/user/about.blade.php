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
  </style>
@endsection

@section('content')

  <!-- navbar start hare  -->
  @include('user.layout.nav',['page'=>'about'])
  <!-- navbar end hare  -->

  <div class="container-fluid bg-breadcrumb">
    <div class="bg-breadcrumb-single"></div>
    <div class="container text-center py-3" style="max-width: 900px;">
    <h1 class="text-white  mb-4 wow fadeInDown" data-wow-delay="0.1s"
      style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInDown;">About</h1>
    <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s"
      style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInDown;">
      <li class="breadcrumb-item text-white"><a href="{{ route('home') }}">Home</a></li>
      <li class="breadcrumb-item active text-primary">About</li>
    </ol>
    </div>
  </div>

  <div class="container my-5">
            <div class="wrapper">
                <div class="content">
                    <div>
                        <img src="{{ asset('storage/').'/'.optional($about)->picture }}" style="width:600px;height:350px;object-fit:cover;margin-top:10px;float:left;padding:0px 20px 10px 0px"
                            alt="Cosmetics">
                         <h1 style="font-size:40px">{{ optional($about)->title  }}</h1>
                         <p class="" style="text-align:justify">
                            {!! optional($about)->about  !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>

  

  

@endsection