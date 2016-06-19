@inject('bladeHelper', 'App\Helpers\BladeHelper')
<div class="wp">
  <div class="logo">
    <img src="{{asset('client-front/images/header-logo.png')}}" alt="header-logo" width="150" height="90">
  </div>
  <div class="menu">
    <ul>
      <li>
        <a href="{{url('precurados')}}" class="{{ $bladeHelper->selectPage('precurados') }}" style="padding-right:0px;">Precurados</a>
      </li>
      <li>
        <a href="{{url('la-empresa')}}" class="{{ $bladeHelper->selectPage('la-empresa') }}">Empresa</a>
      </li>
      <li>
        <a href="{{url('informacion-tecnica')}}" class="{{ $bladeHelper->selectPage('informacion-tecnica') }}">Inf. Técnica</a>
      </li>
      <li>
        <a href="{{url('productos')}}" class="{{ $bladeHelper->selectPage('productos') }}">Productos</a>
      </li>
      <li>
        <a href="{{url('/')}}" class="{{ $bladeHelper->selectPage('') }}" class="active">Home</a>
      </li>
    </ul>
  </div>
</div>
