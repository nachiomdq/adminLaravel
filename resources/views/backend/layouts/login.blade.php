<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">

    <!-- Styles -->
    <link rel="stylesheet" id="css-main" href="{{asset('theme/src/assets/css/oneui.css')}}">
  


</head>
<body >

    @yield('content')
    <!-- Login Footer -->
    <div class="push-10-t text-center animated fadeInUp">
        <small class="text-muted font-w600"><span class="js-year-copy"></span> &copy; OneUI 1.0</small>
    </div>
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <!-- OneUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock, Appear, CountTo, Placeholder, Cookie and App.js -->
    <script src="{{asset('theme/src/assets/js/core/jquery.min.js')}}"></script>
    <script src="{{asset('theme/src/assets/js/core/bootstrap.min.js')}}"></script>
    <script src="{{asset('theme/src/assets/js/core/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('theme/src/assets/js/core/jquery.scrollLock.min.js')}}"></script>
    <script src="{{asset('theme/src/assets/js/core/jquery.appear.min.js')}}"></script>
    <script src="{{asset('theme/src/assets/js/core/jquery.countTo.min.js')}}"></script>
    <script src="{{asset('theme/src/assets/js/core/jquery.placeholder.min.js')}}"></script>
    <script src="{{asset('theme/src/assets/js/core/js.cookie.min.js')}}"></script>
    <script src="{{asset('theme/src/assets/js/app.js')}}"></script>
</body>
</html>
