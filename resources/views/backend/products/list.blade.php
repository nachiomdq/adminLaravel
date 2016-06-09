@extends('backend.layouts.app')


@section('main-content')
  <main id="main-container">
      <!-- Page Header -->
      <div class="content bg-gray-lighter">
          <div class="row items-push">
              <div class="col-sm-8">
                  <h1 class="page-heading">
                      Productos <small>Listado de todos los productos de tu sitio</small>
                  </h1>
              </div>

          </div>
      </div>
      <!-- END Page Header -->

      <!-- Page Content -->
      <div class="content">
        <div class="block">
          <div class="block-header">
              <div class="">
                <div class="col-sm-12">
                    <div class="row">
                      <div class="col-sm-3 pull-right">
                          <a href="{{url('admin/products/new')}}" class="btn btn-block btn-primary pull-right"</a>Crear nuevo </a>
                      </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="row">

                      <div class="col-sm-3">
                          <select class="form-control" id="categories">
                             <option></option>
                             @foreach($categories as $category)
                               <option value="{{$category->id}}">{{$category->name}}</option>
                             @endforeach
                          </select>
                      </div>
                      <div class="col-sm-3">
                          <select class="form-control" id="subcategories">
                             <option></option>
                             @foreach($subcategories as $subcategory)
                               <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                             @endforeach
                          </select>
                      </div>
                      <div class="col-sm-3">
                          <select class="form-control" id="country">

                             @foreach($countries as $country)
                               <option value="{{$country->id}}">{{$country->name}}</option>
                             @endforeach
                          </select>
                      </div>
                      <div class="col-sm-3">
                          <select class="form-control" id="status">
                              <option value="actives">Mostrar Activos</option>
                              <option value="deletes">Mostrar eliminados</option>

                          </select>
                      </div>
                    </div>
                </div>
              </div>
          </div>
          <div class="block-content">
            <table
                    class="table table-striped table-bordered table-hover ui-datatable" id="dataList"
                    data-ajax="{{ url('api/products/list/1') }}"
                    data-processing= "true"
                    data-server-side= "true"
                    data-global-search="true"
                    data-length-change="true"
                    data-info="true"
                    data-paging="true"
                    data-page-length="10"
                    data-language='{"processing": "<i class=\"fa fa-cog fa-spin fa-2x fa-fw margin-bottom\"></i>"}'
                    data-columns='[{ "data": "name"},
																	 { "data": "description" },
																	  {"data":"porcentaje_descuento"},

																		{"data":"dias_disponible"},
																		{ "data": "null", "defaultContent": " <a href=\"\" class=\"btn btn-info push-5-r push-10 btn-xs actions\"><span class=\"fa fa-pencil\"></span></a>  <a href=\"\" class=\"remove-data btn btn-danger btn-xs\"><span class=\"fa fa-trash\"></span></a>  <a href=\"\" class=\"recover-data actions  btn btn-success btn-xs\"><span class=\"fa fa-recycle\"></span></a> "}]'
                    >

                <thead>
                  <tr>

                    <th>Nombre</th>
										<th>Descripción</th>
										<th>% descuento</th>

										<th>Dias disponible</th>
                    <th>Opciones</th>


                  </tr>
                </thead>
								<tbody>

								</tbody>
								<tfoot>
									<tr>

										<th>Nombre</th>
										<th>Descripción</th>
										<th>% descuento</th>

										<th>Dias restantes</th>

										<th></th>
									</tr>
								</tfoot>
              </table>
          </div>
        </div>

      </div>
      <!-- END Page Content -->
  </main>
@endsection

@section('custom-scripts')

<script>

var urlAPI = "{{ url('api/products') }}";
var urlController = "{{ url('products') }}";
$("#categories").select2({
  placeholder:"Seleccione una categoría"
});
$("#subcategories").select2({
  placeholder:"Seleccione una categoría"
});
$('#country, #status').select2({
  
});
$('#country, #status').change(function() {
  reloadDataTableWithSelected();
});

function redirectUpdate() {
  $(document).on('click', '.edit-data', function() {
      var id = $(this).parents('tr').attr('id');
      document.location.href = urlController + '/editar/' + id;
      return false;
  });
}
function reloadDataTableWithSelected() {
  var pais = $('#paisSelect').val();
  var active = $('#status').val();
  reloadDataTable(pais, active);
}

function reloadDataTable(pais, active) {
  $('#dataList').DataTable().ajax.url(urlAPI + '/listado/' + pais + '?estado=' + active).load();
}

function showAction(type) {
  if (type == 'actives') {
      $('.remove-data').show();
      $('.recover-data').hide();
  }
  if (type == 'deleted') {
  	$('.remove-data').hide();
  	$('.recover-data').show();
  }
}

$(document).ajaxComplete(function(event, xhr, settings) {
  var type = $('#status').val();
  showAction(type);
});

$(document).ready(function(){
  redirectUpdate();
});

</script>
@endsection
