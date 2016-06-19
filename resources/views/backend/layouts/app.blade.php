<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">

    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="{{asset('theme/src/assets/js/plugins/magnific-popup/magnific-popup.min.css')}}">
    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('theme/src/assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.css')}}">
    <link rel="stylesheet" id="css-main" href="{{asset('theme/src/assets/js/plugins/select2/select2.min.css')}}">
    <link rel="stylesheet" id="css-main" href="{{asset('theme/src/assets/js/plugins/select2/select2-bootstrap.css')}}">
    <link rel="stylesheet" id="css-main" href="{{asset('theme/src/assets/css/oneui.css')}}">
    <link rel="stylesheet" id="css-main" href="{{asset('theme/src/assets/css/themes/flat.min.css')}}">
    <link rel="stylesheet" id="css-main" href="{{asset('theme/src/assets/js/plugins/sweetalert/dist/sweetalert.css')}}">
    <link rel="stylesheet" id="css-main" href="{{asset('theme/src/assets/js/plugins/bootstrap-jasny/dist/css/jasny-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme/src/assets/js/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css')}}">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
    @yield('custom-css')



</head>
<body >
    <div id="page-container" class="sidebar-l sidebar-o side-scroll header-navbar-fixed">
      @include('backend.layouts.parts.sidebar')
      @include('backend.layouts.parts.header')
      @yield('main-content')
    </div>  <!-- Page container -->



    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <!-- OneUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock, Appear, CountTo, Placeholder, Cookie and App.js -->

    <script src="{{asset('theme/src/assets/js/core/jquery.min.js')}}"></script>
    <script src="{{asset('theme/src/assets/js/core/bootstrap.min.js')}}"></script>
    <script src="{{asset('theme/src/assets/js/core/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('theme/src/assets/js/core/jquery.scrollLock.min.js')}}"></script>
    <script src="{{asset('theme/src/assets/js/core/jquery.appear.min.js')}}"></script>
    <script src="{{asset('theme/src/assets/js/core/jquery.countTo.min.js')}}"></script>
    <script src="{{asset('theme/src/assets/js/core/jquery.placeholder.min.js')}}"></script>
    <script src="{{asset('theme/src/assets/js/plugins/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('theme/src/assets/js/core/js.cookie.min.js')}}"></script>
    <script src="{{asset('theme/src/assets/js/plugins/dropzonejs/dropzone.min.js')}}"></script>
    <script src="{{asset('theme/src/assets/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js')}}"></script>

<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.js"></script>
    <script src="{{asset('theme/src/assets/js/plugins/bootstrap-jasny/dist/js/jasny-bootstrap.min.js')}}"></script>
    <script src="{{asset('theme/src/assets/js/app.js')}}"></script>
    <script src="{{ asset('theme/src/assets/js/plugins/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('theme/src/assets/js/plugins/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('theme/src/assets/js/plugins/datatables-helper/js/datatables-helper.js') }}"></script>
    <script>
    $('.ui-datatable').dataTableHelper ()
    </script>
    @yield('custom-scripts')
    <!-- Page JS Plugins -->
    <script src="{{asset('theme/src/assets/js/plugins/magnific-popup/magnific-popup.min.js')}}"></script>
    <script src="{{asset('theme/src/assets/js/plugins/sweetalert/dist/sweetalert.min.js')}}"></script>

</body>
</html>
