
  <div class="wp">
    <div class="coli">
      <div class="titulo">
        <h2>Líneas de esta Categoría</h2>
      </div>
      <div class="lista">
        <ul>
          @foreach($subcategories as $subcategory)
            <li>
              <a data-id="{{$subcategory->id}}" href="#" class="selectSubCategory" >{{$subcategory->name}}</a>
            </li>
          @endforeach


        </ul>
      </div>
    </div>

    <div class="cold">
      <div class="titulo">
        <h2>Productos Disponibles</h2>
      </div>
      <div class="lista">
        <ul>
          @if($products->count()!=0)
            @foreach($products as $product)
              <li>
                <div class="imagen">
                  <img src="{{asset('client-front/productos/p1.png')}}" alt="p1" width="260" height="260">
                </div>
                <h3>{{$product->name}}</h3>
                <a href="{{url('producto/'.$product->friendly_url)}}">Ir al Producto</a>
              </li>
            @endforeach
          @else
            <h4 class="no-encontrado"> No hay productos disponibles en este momento </h4>

          @endif


        </ul>
      </div>
    </div>
  </div>
