<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Male-Fashion</title>

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}" defer></script> --}}
       <!-- Google Font -->
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
       rel="stylesheet">

   <!-- Css Styles -->
   <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
   <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" type="text/css">
   <link rel="stylesheet" href="{{ asset('css/elegant-icons.css') }}" type="text/css">
   <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}" type="text/css">
   <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}" type="text/css">
   <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" type="text/css">
   <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}" type="text/css">
   <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
   @stack('css')



</head>
<body>
    @include('proted.navber')
        <main class="py-4">

            @yield('content')
        </main>

    <!-- Search Begin -->
  <div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch">+</div>
        <form class="search-model-form" action="{{ asset('/scearch') }}" method="get">
            <input type="text" id="search-input" placeholder="Search here....." name="qurey">
        </form>
    </div>
</div>
<!-- Search End -->

<!-- Js Plugins -->
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('js/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('js/mixitup.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
@stack('js')


</body>

</html>
