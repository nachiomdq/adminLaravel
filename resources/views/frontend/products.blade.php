@extends('frontend.layouts.app')
@section('content-site')
  <div class="header">

      @include('frontend.layouts.parts.submenu')
  </div>


    <div class="filtros">

  		<div id="menu-categories" class="wp">
  			<ul >
          <?php $i = 0;?>
          @foreach($categories as $category)

            <li>
    					<a data-id="{{$category->id}}" href="#" class="selectCategory <?php if ($i == 0) echo "active";?>"  >{{$category->name}}</a>
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
    <input type="hidden" id="categoryID" value="">


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
  <script>
    var urlList = "{{url('api/frontend/list-products-by-category')}}"

  </script>
  <script src="{{asset('client-front/scripts/productsAjax.js')}}"></script>
@endsection
@section('custom-css')
  <link href="{{asset('client-front/styles/corral-productos.css')}}" rel="stylesheet" type="text/css">
@endsection
