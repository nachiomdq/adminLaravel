<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Neumáticos Corral</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,300">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
  <link href="{{asset('client-front/styles/corral-common.css')}}" rel="stylesheet" type="text/css">

  @yield('custom-css')

</head>

<body>
  @include('frontend.layouts.parts.menu-top')


  @yield('content-site')




	@include('frontend.layouts.parts.footer')
  <script src="{{asset('theme/src/assets/js/core/jquery.min.js')}}"></script>
  <script src="{{asset('client-front/scripts/jquery.cycle.all.js')}}"></script>
  <script src="{{asset('client-front/scripts/jquery.easing.js')}}"></script>

  <script type="text/javascript">

  $(document).ready(function() {
  	$("#menu-top").css("top", "-110px" );
  	$(window).scroll(function() {
  	if ($(window).scrollTop() >= 150){
  				$("#menu-top").css("top", "0px" );
  	    } else {
  				$("#menu-top").css("top", "-110px" );
  	    }
  	});
  });
  </script>
  @yield('custom-scripts')

</body>
</html>
