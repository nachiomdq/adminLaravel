@extends('frontend.layouts.app')
@section('content-site')
  <div class="header">

      @include('frontend.layouts.parts.submenu')
  </div>


    <div class="filtros">

  		<div class="wp">
  			<h4>Contacto</h4>
  		</div>


  	</div>




  	<div class="cuerpo">
  		<div class="wp">
  			<div class="coli">
  				<div class="titulo">
  					<h2>Contacto</h2>
  				</div>
  				<div class="lista">
  					<p>
  Puede contactarnos llamando telefónicamente o por mail, o simplemente completando los datos del formulario.
  <br><br>
  					</p>
  					<div class="mapa">
  						<div id="map-canvas">
  						</div>
  					</div>
  					<p>
            <br><br>
            Casa Central<br>
            Av. Santa Fé 544<br>
            Acassuso - Buenos Aires<br><br>

            <b>0800 - 333 - 8929</b>
            <br>
            <a href="mailto:info@neumaticoscorral.com.ar">info@neumaticoscorral.com.ar</a>
            <br><br>

            Si desea contactarse con una de nuestras sucursales haga <a href="{{url('sucursales')}}">click aquí.</a>
  					</p>

  				</div>
  			</div>

  			<div class="cold">
  				<div class="titulo">
  					<h2>Complete el Formulario</h2>
  				</div>
  				<div class="lista">
  					<form action="#" id="formContact">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
  						<h3>Nombre</h3>
  						<input type="text" required class="input-texto" name="name" id="name">
  						<h3>Apellido</h3>
  						<input type="text" required class="input-texto" name="lastname" id="lastname">
  						<h3>Teléfono</h3>
  						<input type="text"  class="input-texto" name="tel" id="tel">
  						<h3>Correo Electrónico</h3>
  						<input type="email" required class="input-texto" name="email" id="email">
  						<h3>Asunto</h3>
  						<input type="text" required class="input-texto" name="subject" id="subject">
  						<h3>Consulta</h3>
  						<textarea  required name="query" id="query"  class="input-area"></textarea>
  						<button type="submit"class="boton-enviar">Enviar Consulta</button>
  					</form>
  				</div>
          <div class="envio-ok" style="display:none">
            <H3>Su consulta ha sido enviada correctamente</H3>
          </div>
          <div class="envio-fail" style="display:none">
            <H3>Ha habido un problema al enviar el email</H3>
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
    <script>
    var icono = '{{asset('client-front/images/icon-mapa.png')}}';
    var urlAPI = "{{url('api/frontend/contact')}}"
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <script src="{{asset('client-front/map/contacto.js')}}"></script>
    <script src="{{asset('client-front/scripts/contactAjax.js')}}"></script>
    <script src="{{asset('theme/src/assets/js/plugins/jquery-validation/jquery.validate.min.js')}}"></script>

    <script src=""
@endsection
@section('custom-css')
  <link href="{{asset('client-front/styles/corral-contacto.css')}}" rel="stylesheet" type="text/css">
@endsection
