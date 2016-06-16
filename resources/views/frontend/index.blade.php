@extends('frontend.layouts.app')
@section('content-site')
  <div class="header">
    <div class="slider">
      <div class="item" style="background-image: url({{asset('client-front/images/Home-bg-1.jpg')}});">
        <div class="wp">
          <div class="titulo">
            <h3>Scorpion ATR</h3>
          </div>
          <div class="copete">
            <p>Control Todo Terreno</p>
          </div>
          <div class="boton">
            <a href="#">Descubrila</a>
          </div>
        </div>
      </div>
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
					<ul>
						<li>
							<div class="imagen">
								<img src="{{asset('client-front/productos/p1.png')}}" alt="p1" width="260" height="260">
							</div>
							<h3>Pirelli Scorpion ATR</h3>
							<a href="#">Ir al producto</a>
						</li>
						<li>
							<div class="imagen">
								<img src="{{asset('client-front/productos/p1.png')}}" alt="p1" width="260" height="260">
							</div>
							<h3>Pirelli P7 Cinturato</h3>
							<a href="#">Ir al producto</a>
						</li>
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
						<li>
							<div class="imagen">
								<img src="{{asset('client-front/promociones/promo1.png')}}" alt="p1" width="260" height="260">
							</div>
							<p> <i class="fa fa-heart"></i>Sólo para CABA y Gran Buenos Aires.</p>
							<a href="#">Ver Promoción</a>
						</li>
						<li>
							<div class="imagen">
								<img src="{{asset('client-front/promociones/promo2.png')}}" alt="p1" width="260" height="260">
							</div>
							<p>En neumáticos para auto y camioneta.</p>
							<a href="#">Ver Promoción</a>
						</li>
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
                <a href="##">{{$category->name}}</a>
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
@endsection
