@extends('frontend.layouts.app')
@section('content-site')

  <div class="header no-height">
      @include('frontend.layouts.parts.submenu')
  </div>

  <div class="container-404">
      <div class="content-404">
          <div class="title-404">UPS, Lá pagina que estas buscando no existe.</div>
      </div>
  </div>
@endsection

@section('custom-css')
  <link href="{{asset('client-front/styles/corral-home.css')}}" rel="stylesheet" type="text/css">
@endsection
