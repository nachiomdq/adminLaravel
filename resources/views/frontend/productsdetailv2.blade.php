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
    					<a data-id="{{$category->id}}" href="{{url('productos/'.$category->friendly_url)}}" class="selectCategory <?php if ($category->id == $categoriesSelectedNames[0]->id) echo "active";?>"  >{{$category->name}}</a>
    				</li>
            <?php $i++;?>
          @endforeach
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
              @foreach($subcategories as $subcategory)
                <li>
    							<a href="#" class="active">{{$subcategory->name}}</a>
    						</li>
              @endforeach


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
              {{$categoriesNames->name}} @if ($categoriesNames != $categoriesSelectedNames->last() ) - @endif
  					@endforeach
            /
            @foreach($subCategoriesSelectedNames as $subCategoriesNames)
                {{$subCategoriesNames->name}} @if ($subCategoriesNames != $subCategoriesSelectedNames->last() ) - @endif
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
            		<div class="titulo">
        					<h4>Imágenes </h4>
        				</div>
  					<ul>
              @if($product[0]->medias)
                @foreach($product[0]->medias as $media)
                    <li>
                      <a class="img-link img-thumb" href="{{url('storage/products/'.$media->content)}}">
                        <img  src="{{url('storage/products/'.$media->content)}}" alt="p1">
                      </a>

        						</li>
                @endforeach


              @endif

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
  <script src="{{asset('theme/src/assets/js/plugins/magnific-popup/magnific-popup.min.js')}}"></script>
  <script>
  $(document).ready(function(){
      jQuery('.fotos').each(function(){
          jQuery(this).magnificPopup({
              delegate: 'a.img-link',
              type: 'image',
              gallery: {
                  enabled: true
              }
          });
      });
  });
  </script>

@endsection
@section('custom-css')
  <link rel="stylesheet" href="{{asset('theme/src/assets/js/plugins/magnific-popup/magnific-popup.min.css')}}">

  <link href="{{asset('client-front/styles/corral-productos-detalle-v2.css')}}" rel="stylesheet" type="text/css">
@endsection
