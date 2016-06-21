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
    <div class="cuerpo">
  		<div class="wp">

  			<div class="coli">
  				<div class="titulo">
  					<h2>Líneas de esta Categoría</h2>
  				</div>
  				<div class="lista">
  					<ul>
  						<li>
  							<a href="#" class="active">Todos</a>
  						</li>
  						<li>
  							<a href="#">Convencional</a>
  						</li>
  						<li>
  							<a href="#">Radial</a>
  						</li>
  						<li>
  							<a href="#">Otros Productos</a>
  						</li>
  					</ul>
  				</div>

  				<div class="titulo" style="margin-top:80px;">
  					<h2>Productos de esta Línea</h2>
  				</div>
  				<div class="lista">
  					<ul>
              @foreach($productForThisCategories as $productsCategories)
              	<li>
    						 <a <?php if($productsCategories->id == $product[0]->id) echo "class='active'"; ?> href="{{url('producto2/'.$productsCategories->friendly_url)}}">{{$productsCategories->name}}</a>
    						</li>
              @endforeach


  					</ul>
  				</div>


  			</div>


  			<div class="cold">


  				<div class="titulo">
  					<h4>
            @foreach($categoriesSelectedNames as $categoriesNames)
              {{$categoriesNames->name}} -
  					@endforeach
            /
            @foreach($subCategoriesSelectedNames as $subCategoriesNames)
                {{$subCategoriesNames->name}} -
    				@endforeach
            / {{$product[0]->name}}</h4>

  				</div>



  				<div class="descripcion">

  					<div class="tl">
  						<h1>{{$product[0]->name}}</h1>
  						<h2>{{$product[0]->subtitle}}</h2>
  					</div>

  					<div class="tr">
  						<div class="foto">
                @if($product[0]->cover_image)
  							  <img src="{{asset('storage/products/'.$product[0]->cover_image)}}" alt="Imagen de portada">
                @else
                  <img src="{{asset('client-front/productos/pzero-nero-top.jpg')}}" alt="Imagen de portada">
                @endif
  						</div>
  					</div>

            <div class="texto">

                {!!html_entity_decode($product[0]->description)!!}
            </div>


  				</div>

  				<div class="fotos">
  					<ul>
  						<li>
  							<img src="productos/p1.png" alt="p1">
  						</li>
  						<li>
  							<img src="productos/p1.png" alt="p1">
  						</li>
  						<li>
  							<img src="productos/p1.png" alt="p1">
  						</li>
  						<li>
  							<img src="productos/p1.png" alt="p1">
  						</li>
  					</ul>
  				</div>


  				<div class="titulo">
  					<h4>Características</h4>
  				</div>
  				<div class="lista">
  					{!!html_entity_decode($product[0]->characteristics)!!}
  				</div>
  				<div class="titulo">
  					<h4>Medidas Disponibles</h4>
  				</div>

  				<div class="tabla">
  					{!!html_entity_decode($product[0]->table_of_sizes)!!}
  				</div>

  			</div>

  		</div>
  	</div>




@endsection
@section('custom-scripts')
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
  <script src="{{asset('client-front/map/caba.js')}}"></script>

@endsection
@section('custom-css')
  <link href="{{asset('client-front/styles/corral-productos-detalle-v2.css')}}" rel="stylesheet" type="text/css">
@endsection
