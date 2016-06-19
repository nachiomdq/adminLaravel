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

      @if($branchs->count()!=0)
        <ul>
        @foreach($branchs as $branch)
        
          <li>
            <h3>{{$branch->name}}</h3>
            <h4>{{$branch->subtitle}}</h4>
            <div class="description">
              {!! html_entity_decode($branch->description)!!}
            </div>


          </li>
        @endforeach
        </ul>
        @else
          <h4 class="no-encontrado"> No hay sucursales disponibles en este momento </h4>

        @endif

        {{-- EL HIDDEN CONTIENE LA PRIMER LATITUD Y LONGITUD DEL STATE SELECCIONADO, CON ESTE CENTRO EL MAPA AHI --}}
        <script>
          var latitude = "{{$latitude}}";
          var longitude = "{{$longitude}}";

        </script>
    </div>
  </div>
</div>
<ul>
