@extends('frontend.layouts.app')
@section('content-site')
  <div class="header">

      @include('frontend.layouts.parts.submenu')
  </div>


    <div class="filtros">

  		<div class="wp">
  			<ul>
          <?php $i = 0;?>
            <li>
              <a data-id="-1" href="#" class="selectState active">Todos</a>
            </li>
          @foreach($states as $state)
            	<li>
      					<a data-id="{{$state->id}}" href="#" class="selectState ">{{$state->name}}</a>
      				</li>
                <?php $i++;?>
          @endforeach

  			</ul>
  		</div>


  	</div>



  	<div class="cuerpo">
      {{-- AJAX RESPONSE FROM PRODUCTS FILTER CATEGORY --}}
      <div id="ajax-response">

      </div>

  	</div>



  	<div class="tip">
  		<div class="wp">
  			<div class="titulo">
  				<div class="icono">
  					<img src="{{asset('client-front/images/h2-icon-tip.jpg')}}" alt="h2-icon-star" width="45" height="45">
  				</div>
  				<h2>Sabías que</h2>
  			</div>
  			<h4>Los neumáticos tienen fecha de vencimiento...</h4>
  			<p>Luego de 5 años de fabricados, los neumáticos pierden propiedades fundamentales a la hora de brindar seguridad a tu vehículo, es por eso que
  recomendamos hacer una revisión en un taller especializado para chequear el estado de los mismos.</p>
  		</div>
  	</div>



@endsection
@section('custom-scripts')
  <script>
    var urlList = "{{url('api/frontend/list-branchs-by-state')}}"
    var icono = '{{asset('client-front/images/icon-mapa.png')}}';
    var latitude = "";
    var longitude = "";

  </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9vzgoYqniRXIIW6tEchX-ByFWSX1zNGU&v=3.exp"></script>
    <script src="{{asset('client-front/map/branchs.js')}}"></script>
    <script src="{{asset('client-front/scripts/branchsAjax.js')}}"></script>
@endsection
@section('custom-css')
  <link href="{{asset('client-front/styles/corral-sucursales.css')}}" rel="stylesheet" type="text/css">
@endsection
