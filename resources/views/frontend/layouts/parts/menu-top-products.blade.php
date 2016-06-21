@inject('bladeHelper', 'App\Helpers\BladeHelper')
<div id="menu-top">
  <div class="top">
    <div class="wp">
      <div class="logo">
        <img src="{{asset('client-front/images/header-logo.png')}}" alt="header-logo" width="88" height="53">
      </div>
      <div class="menu">
        <ul>
          <li><a href="{{url('contacto')}}" class="{{ $bladeHelper->selectPage('contacto') }}">Contacto</a></li>
          <li><a href="{{url('sucursales')}}" class="{{ $bladeHelper->selectPage('sucursales') }}">Sucursales</a></li>
          <li><a href="{{url('precurados')}}" class="{{ $bladeHelper->selectPage('precurados') }}">Precurados</a></li>
          <li><a href="{{url('la-empresa')}}" class="{{ $bladeHelper->selectPage('la-empresa') }}">Empresa</a></li>
          <li><a href="{{url('informacion-tecnica')}}" class="{{ $bladeHelper->selectPage('informacion-tecnica') }}">Inf. Técnica</a></li>
          <li><a href="{{url('productos')}}" class="{{ $bladeHelper->selectPage('productos') }}">Productos</a></li>
          <li><a href="{{url('/')}}" class="{{ $bladeHelper->selectPage('/') }}">Home</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="bottom">
    <div class="wp">
      <div class="seccion">
        <ul>
          @foreach($categories as $category)
            <li>
    					<a data-id="{{$category->id}}" href="#"  class="selectCategory <?php if ($category->id == $categoriesSelectedNames[0]['id']) echo "active";?>">{{$category->name}}</a>
    				</li>

          @endforeach
        </ul>

      </div>
    </div>
  </div>
</div>
<div class="top">
  <div class="wp">
    <div class="pais">
      <ul>
        <li>
          <a href="#" class="active">ARGENTINA</a>
        </li>
        <li>
          <a href="#">URUGUAY</a>
        </li>
      </ul>
    </div>
    <div class="submenu">
      <ul>
        <li>
          <a href="{{url('contacto')}}">CONTACTO</a>
        </li>
        <li>
          <a href="{{url('sucursales')}}">SUCURSALES</a>
        </li>
      </ul>
    </div>
    <div class="pirelli">
      <img src="{{asset('client-front/images/logo-pirelli.png')}}" alt="logo-pirelli" width="88" height="22">
    </div>
  </div>
</div>
