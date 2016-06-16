@extends('frontend.layouts.app')
@section('content-site')
  <div class="header">

      @include('frontend.layouts.parts.submenu')
  </div>


    <div class="filtros">

  		<div class="wp">
  			<ul>
          @foreach($states as $state)
            	<li>
      					<a data-id="{{$state->id}}" href="#" >{{$state->name}}</a>
      				</li>
          @endforeach

  			</ul>
  		</div>


  	</div>



  	<div class="cuerpo">
  		<div class="wp">
  			<div class="coli">
  				<div class="titulo">
  					<h2>Mapa</h2>
  				</div>
  				<div class="lista">
  					<div class="mapa">
  						<div id="map-canvas">
  						</div>
  					</div>
  				</div>
  			</div>

  			<div class="cold">
  				<div class="titulo">
  					<h2>Listado de Sucursales</h2>
  				</div>
  				<div class="lista">
  					<ul>
  						<li>
  							<h3>Sucursal Acassuso</h3>
  							<h4>Casa Central</h4>
  							<p>
  								Av. Santa Fé 544<br>
  								Acassuso - Buenos Aires<br>
  								Tel: (011) - 4755 - 2233<br>
  								<a href="#">acassuso@neumaticoscorral.com.ar</a>
  							</p>


  						</li>
  						<li>
  							<h3>Sucursal Pilar</h3>
  							<h4>Alineación / Balanceo / Tren Delantero</h4>
  							<p>
  								Las Magnolias 669, Barrio La Esmeralda<br>
  								Pilar - Buenos Aires<br>
  								Tel: (02322) - 471852<br>
  								<a href="#">pilar@neumaticoscorral.com.ar</a>
  							</p>

  						</li>
  						<li>
  							<h3>Novateck Buenos Aires</h3>
  							<h4>Planta de Precurado</h4>
  							<p>
  								Cruce de Rutas 24 y 25<br>
  								Parque Industrial Provado del Oeste<br>
  								Moreno<br>
  								<a href="#">novateck@neumaticoscorral.com.ar</a>
  							</p>

  						</li>
  					</ul>
  				</div>
  			</div>
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
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
  <script src="{{asset('client-front/map/caba.js')}}"></script>
@endsection
@section('custom-css')
  <link href="{{asset('client-front/styles/corral-sucursales.css')}}" rel="stylesheet" type="text/css">
@endsection
