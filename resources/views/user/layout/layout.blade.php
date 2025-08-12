<!DOCTYPE html>
<html>

<head>
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="author" content="">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" type="image/png" href="{{ asset('storage/') . '/' . optional($company)->logo }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  @yield('csslink')
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/user/style.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
    rel="stylesheet">

    @yield('style')
    
   
</head>

<body>

 <!-- loader start  -->
  @include('user.layout.loader')
  <!-- loader start  -->


    @yield('content')

  @include('user.layout.footer')
  @include('user.layout.notify')
  <script src="{{ asset('assets/user/js/jquery-1.11.0.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
  <script type="text/javascript" src="{{ asset('assets/user/js/script.js') }}"></script>
  <script src="https://unpkg.com/axios@1.6.7/dist/axios.min.js"></script>

  <script>
document.addEventListener('DOMContentLoaded', function () {
    @if(session('success'))
        var el = document.getElementById('toastSuccess');
        if (el) {
            var toast = new bootstrap.Toast(el);
            toast.show();
        }
    @endif

    @if(session('error'))
        var elErr = document.getElementById('toastError');
        if (elErr) {
            var toastErr = new bootstrap.Toast(elErr);
            toastErr.show();
        }
    @endif
});
</script>

  @stack('script')
</body>

</html>