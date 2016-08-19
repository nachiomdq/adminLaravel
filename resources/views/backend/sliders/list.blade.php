@extends('backend.layouts.app')


@section('main-content')
  <main id="main-container">
      <!-- Page Header -->
      <div class="content bg-gray-lighter">
          <div class="row items-push">
              <div class="col-sm-8">
                  <h1 class="page-heading">
                      Sliders <small>Listado de todos los sliders de tu sitio</small>
                  </h1>
              </div>

          </div>
      </div>
      <!-- END Page Header -->

      <!-- Page Content -->
      <div class="content">
        <div class="block">
          <div class="block-header">


                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-sm-3 ">

                    </div>
                    <div class="col-sm-3">

                    </div>
                      <div class="col-sm-3 ">
                          <a href="{{url('admin/sliders/new')}}" class="btn btn-block btn-primary pull-right"</a>Crear nuevo </a>
                      </div>

                      <div class="col-sm-3">
                          <select class="form-control" id="status">
                              <option value="actives">Mostrar Activas</option>
                              <option value="deleted">Mostrar eliminadas</option>

                          </select>
                      </div>
                  </div>


                </div>

          </div>
          <div class="block-content">
            <table
                    class="table table-striped table-bordered table-hover ui-datatable" id="dataList"
                    data-ajax="{{ url('api/sliders/list/') }}"
                    data-processing= "true"
                    data-server-side= "true"
                    data-global-search="true"
                    data-length-change="true"
                    data-info="true"
                    data-paging="true"
                    data-page-length="10"
                    data-language='{"processing": "<i class=\"fa fa-cog fa-spin fa-2x fa-fw margin-bottom\"></i>"}'
                    data-columns='[{ "data": "title"},
																	 { "data": "subtitle" },
																	 { "data": "button_text" },
																	 { "data": "href" },



																		{ "data": "null", "defaultContent": " <a href=\"\" class=\"btn edit-data btn-info push-5-r push-10 btn-xs actions\"><span class=\"fa fa-pencil\"></span></a>  <a href=\"\" class=\"remove-data btn btn-danger push-5-r push-10 btn-xs\"><span class=\"fa fa-trash\"></span></a>  <a href=\"\" class=\"recover-data actions  btn btn-success btn-xs  push-5-r push-10 btn-xs\"><span class=\"fa fa-recycle\"></span></a> "}]'
                    >

                <thead>
                  <tr>

                    <th>Título</th>
										<th>Subtítulo</th>
										<th>Título del botón</th>
                    <th>URL </th>


                    <th>Opciones</th>


                  </tr>
                </thead>
								<tbody>

								</tbody>
								<tfoot>
									<tr>
                    <th>Título</th>
                    <th>Subtítulo</th>
                    	<th>Título del botón</th>
                    <th>URL </th>




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

var urlAPI = "{{ url('api/sliders') }}";
var urlController = "{{ url('admin/sliders') }}";

$('#status').select2({

});
$('#status').change(function() {
  reloadDataTableWithSelected();
});
$(document).on('click', '.remove-data', function() {
    var id = $(this).parents('tr').attr('id');

    swal({
        title: "Eliminar?",
        text: "Estas seguro ?",
        type: "warning",
        html:true,
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Si, eliminar",
        closeOnConfirm: true,
        showLoaderOnConfirm: true
        },
        function() {
            $.ajax({
                method: "GET",
                url: urlAPI + '/delete/' + id,
            })
            .done(function(response) {
                if (!response.success){
                    sweetAlert("Oops...", "Something went wrong!", "error");
                } else {

                    reloadDataTableWithSelected();
                }
            });
        }
    );

    return false;
});
$(document).on('click', '.recover-data', function() {
    var id = $(this).parents('tr').attr('id');

    swal({
        title: "Activar?",
        text: "Estas seguro ?",
        type: "warning",
        html:true,
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Si, activar",
        closeOnConfirm: true,
        showLoaderOnConfirm: true
        },
        function() {
            $.ajax({
                method: "GET",
                url: urlAPI + '/recover/' + id,
            })
            .done(function(response) {
                if (!response.success){
                    sweetAlert("Oops...", "Something went wrong!", "error");
                } else {

                    reloadDataTableWithSelected();
                }
            });
        }
    );

    return false;
});
function redirectUpdate() {
  $(document).on('click', '.edit-data', function() {
      var id = $(this).parents('tr').attr('id');

      document.location.href = urlController + '/edit/' + id;
      return false;
  });
}
function reloadDataTableWithSelected() {


  var active = $('#status').val();
  var country = $('#status').val();

  reloadDataTable(active,country);
}

function reloadDataTable( active,country) {

  $('#dataList').DataTable().ajax.url(urlAPI + '/list/status=' + active).load();
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
