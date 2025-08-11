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
  @include('user.layout.nav')
  <!-- navbar end hare  -->

  <div class="container-fluid bg-breadcrumb">
    <div class="bg-breadcrumb-single"></div>
    <div class="container text-center py-3" style="max-width: 900px;">
    <h1 class="text-white  mb-4 wow fadeInDown" data-wow-delay="0.1s"
      style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInDown;">Books</h1>
    <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s"
      style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInDown;">
      <li class="breadcrumb-item text-white"><a href="{{ route('home') }}">Home</a></li>

      <li class="breadcrumb-item active text-primary">Books</li>
    </ol>
    </div>
  </div>

  <div class="container">
    
  </div>
  @include('user.home.books', ['books' => $books, 'pageName' => 'book'])

  <div class="container">
    <div class="row">
    <div class="col-12 d-flex justify-content-end me-2">
      @if ($books->previousPageUrl())
      <a href="{{ $books->previousPageUrl() }}" class="btn btn-primary mx-2 p-1"><i
      class="fas fa-hand-point-left"></i></a>
    @endif

      @if ($books->nextPageUrl())
      <a href="{{ $books->nextPageUrl() }}" class="btn btn-primary mx-2 p-1"><i
      class="fas fa-hand-point-right "></i>
    </a>
    @endif

    </div>
    </div>
  </div>












@endsection