
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Yobalema</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">


    <!-- Favicon -->
    <link href="{{asset('asset1/img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@600;700&family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('asset1/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('asset1/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('asset1/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('asset1/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('asset1/css/style.css')}}" rel="stylesheet">

    {{-- asset2 --}}


	<!-- Stylesheets -->


	<!-- Main Stylesheets -->
	

    {{-- asset3 --}}
    <link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700,700i,900%7cRoboto:400,400i,500,500i,700,700i&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('asset3/css/style.css')}}"/>


    {{-- Utilisateur --}}

    {{-- <link rel="stylesheet" href="{{asset('asset4/css/core-style.css')}}"> --}}

    <link rel="stylesheet" href="{{asset('asset4/style.css')}}">

    <!-- Responsive CSS -->
    <link href="{{asset('asset4/css/responsive.css')}}" rel="stylesheet">




</head>

<body>

    <!-- Spinner Start -->
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner End -->
    @include('layouts._navbar')

    @include('layouts._sectionClient')




    @yield('content')



      <!-- JavaScript Libraries -->


  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('asset1/lib/wow/wow.min.js')}}"></script>
  <script src="{{asset('asset1/lib/easing/easing.min.js')}}"></script>
  <script src="{{asset('asset1/lib/waypoints/waypoints.min.js')}}"></script>
  <script src="{{asset('asset1/lib/counterup/counterup.min.js')}}"></script>
  <script src="{{asset('asset1/lib/owlcarousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('asset1/lib/tempusdominus/js/moment.min.js')}}"></script>
  <script src="{{asset('asset1/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
  <script src="{{asset('asset1/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>

  <!-- Template Javascript -->
  <script src="{{asset('asset1/js/main.js')}}"></script>
  {{-- asset4 --}}
    <script src="{{asset('asset4/js/jquery/jquery-2.2.4.min.js')}}"></script>
    <!-- Popper js -->
    <script src="{{asset('asset4/js/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('asset4/js/bootstrap.min.js')}}"></script>
    <!-- Plugins js -->
    <script src="{{asset('asset4/js/plugins.js')}}"></script>
    <!-- Active js -->
    <script src="{{asset('asset4/js/active.js')}}"></script>



	</body>
</html>

