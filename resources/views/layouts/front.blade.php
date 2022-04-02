<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title') </title>

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('admin/css/nucleo-icons.css ')}}"  rel="stylesheet" />
    <link href="{{ asset('admin/css/nucleo-svg.css ')}}" rel="stylesheet" />
    
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap5.css')}}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css')}}">
    <style>
      a{
        text-decoration: none !important;
        
      }

      icon-shape {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            vertical-align: middle;
        }

        .icon-sm {
            width: 2rem;
            height: 2rem;
            
        }
    </style>
</head>

<body>
    @include('layouts.inc.frontnavbar')
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    
    <div class="content">
      @yield('content')
      
    </div>

  </main>
<!--   Core JS Files   -->
<!-- Font Awesome Icons -->
    <script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}"></script> 
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('frontend/js/custom.js') }}"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  @if((session('status'))){
    <script>
      swal("{{ session('status') }}")
    </script>
  @endif
  
  @yield('scripts')
  
 
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('admin/js/material-dashboard.min.js?v=3.0.0')}}"></script>
</body>

</html>