@extends('frontend.layouts.app')
@section('content-site')
  <div class="header">

      @include('frontend.layouts.parts.submenu')
  </div>


    <div class="filtros">

  		<div id="menu-categories" class="wp">
  			<ul >
         <li><a href="{{url('productos')}}">Volver</a></li>
		    </ul>
  		</div>
    </div>
    <div class="titular" style="">
  		<div class="wp">
  			<div class="titulo">
  				<h1>{{$product[0]->name}}</h1>
  				<h3>{{$product[0]->subtitle}}</h3>
  			</div>
  		</div>
  	</div>

  	<div class="cuerpo">
  		<div class="wp">
  			<div class="col">
  				<div class="descripcion">
          {!!html_entity_decode($product[0]->description)!!}
  				</div>

  			</div>


        <div class="coli">
  				<div class="titulo">
  					<h2>Características</h2>
  				</div>
          <p class="texto">
              {!!html_entity_decode($product[0]->characteristics)!!}
          </p>
  			</div>

  			<div class="cold">
  				<div class="titulo">
  					<h2>Medidas Disponibles</h2>
  				</div>
          <div class="tabla">
            {!!html_entity_decode($product[0]->table_of_sizes)!!}

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
  <link href="{{asset('client-front/styles/corral-productos-detalle.css')}}" rel="stylesheet" type="text/css">
@endsection
