@extends('frontend.layouts.app')
@section('content-site')
  <div class="header">
    <div class="slider">
      @foreach($sliders as $slider)
        <div class="item" style="background-image: url({{asset('storage/sliders/'.$slider->image)}});">
          <div class="wp">
            <div class="titulo">
              <h3>{{$slider->title}}</h3>
            </div>
            <div class="copete">
              <p>{{$slider->subtitle}}</p>
            </div>
            <div class="boton">
              <a href="{{$slider->href}}">{{$slider->button_text}}</a>
            </div>
          </div>
        </div>
      @endforeach


    </div>
    <div class="wp">
      <div class="nav">
        <div class="arrow-l">
        </div>
        <div class="arrow-r">
        </div>
      </div>
    </div>
      @include('frontend.layouts.parts.submenu')
  </div>


  <div class="destacado">
		<div class="wp">
			<div class="row">
			<div class="col" style="margin-right:4%;">
				<div class="titulo">
					<div class="icono">
						<img src="{{asset('client-front/images/h2-icon-star.jpg')}}" alt="h2-icon-star" width="45" height="45">
					</div>
					<h2>Productos Destacados</h2>
				</div>
				<div class="lista">

					<ul class=" featuredCarousel">
            @foreach($featureds as $featured)
              <li>
  							<div class="imagen">
  								<img src="{{asset('client-front/productos/p1.png')}}" alt="p1" width="260" height="260">
  							</div>
  							<h3>{{$featured->name}}</h3>
  							<a href="{{url('producto/'.$featured->friendly_url)}}">Ir al Producto</a>
  						</li>
            @endforeach

					</ul>
				</div>
			</div>

			<div class="col">
				<div class="titulo">
					<div class="icono">
						<img src="{{asset('client-front/images/h2-icon-promo.jpg')}}" alt="h2-icon-star" width="45" height="45">
					</div>
					<h2>Promociones</h2>
				</div>

				<div class="lista">
					<ul>
            @foreach($promotions as $promotion)
              <li>
  							<div class="imagen">
  								<img src="{{asset('storage/promotions/'.$promotion->cover_image)}}" alt="p1" width="260" height="260">
  							</div>
  							<p> <i class="fa fa-heart"></i>{{$promotion->name}}</p>
  							<a href="{{url('promocion/'.$promotion->friendly_url)}}">Ver promoción</a>
  						</li>
            @endforeach


					</ul>
				</div>

			</div>
			</div>

		</div>
	</div>
  <div class="categorias">
    <div class="wp">
      <div class="titulo">
        <div class="icono">
          <img src="{{asset('client-front/images/h2-icon-lista.jpg')}}" alt="h2-icon-star" width="45" height="45">
        </div>
        <h2>Búsqueda por Categoría</h2>
      </div>
      <div class="lista">
        <ul>
          @foreach($categories as $category)
              <li>
                <div class="icono">
                  <img src="{{asset('storage/categories/'.$category->cover_image)}}" alt="categoria-icon-auto" width="150" height="100">
                </div>
                <a href="{{url('productos/'.$category->friendly_url)}}">{{$category->name}}</a>
              </li>
          @endforeach


        </ul>
      </div>

      <div class="acceso">
        <a href="{{url('productos')}}">Ver todos los productos</a>
      </div>

    </div>
  </div>




@endsection

@section('custom-css')

  <link href="{{asset('client-front/styles/corral-home.css')}}" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="{{asset('client-front/scripts/slick/slick.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('client-front/scripts/slick/slick-theme.css')}}">
@endsection
@section('custom-scripts')
  <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
  <script>
    $(document).ready(function() {

      $('.slider').slick({

        infinite: true,
        centerMode:false,
        arrows:false
      });
      $('.arrow-l').click(function(){

        $('.slider').slick('slickPrev');
      });
      $('.arrow-r').click(function(){

        $('.slider').slick('slickNext');
      });
    });

  </script>


@endsection
