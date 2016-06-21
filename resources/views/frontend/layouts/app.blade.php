<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="title" content="{!!html_entity_decode(Meta::getTitle())!!}">
<meta name="keywords" content="{!!html_entity_decode(Meta::getKeywords())!!}">
<meta name="description" content="{!!html_entity_decode(Meta::getDescription())!!}">
<meta name="robots" content="all">
<meta name="revisit" content="7 days">

<title>Neumáticos Corral</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,300">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
  <link href="{{asset('client-front/styles/corral-common.css')}}" rel="stylesheet" type="text/css">

  @yield('custom-css')

</head>

<body>

  @if(Request::is('producto*/*') )
    @include('frontend.layouts.parts.menu-top-products')
  @else
    @include('frontend.layouts.parts.menu-top')
  @endif

  @yield('content-site')




	@include('frontend.layouts.parts.footer')
  <script src="{{asset('theme/src/assets/js/core/jquery.min.js')}}"></script>
  <script src="{{asset('client-front/scripts/jquery.cycle.all.js')}}"></script>
  <script src="{{asset('client-front/scripts/jquery.easing.js')}}"></script>
  <script>
    urlLoadingGif = "{{url('client-front/scripts/jquery-loading-overlay-1.3/src/loading.gif')}}";
  </script>
  <script src="{{asset('client-front/scripts/jquery-loading-overlay-1.3/src/loadingoverlay.js')}}"></script>

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
