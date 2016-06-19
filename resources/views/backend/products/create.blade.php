@extends('backend.layouts.app')


@section('main-content')
  <main id="main-container">
      <!-- Page Header -->
      <div class="content bg-gray-lighter">
          <div class="row items-push">
              <div class="col-sm-8">
                  <h1 class="page-heading">
                      Crear nuevo producto</small>
                  </h1>
              </div>

          </div>
      </div>
      <!-- END Page Header -->

      <!-- Page Content -->
      <div class="content">
        <div class="block">
          <div class="block-header">
            <H4>Datos</h4>
          </div>
          <div class="block-content">
            <form class="form-horizontal push-10-t push-10 " id="form"  method="post">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                      <div class="col-xs-12">
                        <label for="name">Nombre</label>
                        <input class="form-control input-lg" type="text" id="name" name="name" value="">
                      </div>

                    </div>
                  </div>
                </div>
                <div class="row">
                 <div class="col-sm-12">
                     <div class="form-group">
                       <div class="col-xs-12">
                         <label for="name">Subtítulo</label>
                         <input class="form-control input-lg" type="text" id="subtitle" name="subtitle" value="">
                       </div>

                     </div>
                   </div>
                 </div>
               <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                      <div class="col-xs-12">
                        <label for="name">Descripción</label>
                          <!-- Summernote Container -->

                        <textarea class="wysihtml5 form-control" name="descripcion" rows="6"></textarea>

                      </div>

                    </div>
                  </div>
                </div>
                <div class="row">
                 <div class="col-sm-12">
                     <div class="form-group">
                       <div class="col-xs-12">
                         <label for="name">Características</label>
                           <!-- Summernote Container -->
                         <textarea class="form-control wysihtml5" name="characteristics"></textarea>
                       </div>

                     </div>
                   </div>
                 </div>
                 <div class="row">
                  <div class="col-sm-12">
                      <div class="form-group">
                        <div class="col-xs-12">
                          <label for="name">Medidas (el primer elemento se considera titulo de la tabla)</label>
                            <!-- Summernote Container -->
                          <table class="table table-bordered table-hover" id="tab_logic">
                    				<thead>
                    					<tr >
                    						<th class="text-center">
                    							#
                    						</th>
                    						<th class="text-center">
                    							OPCION 1
                    						</th>
                    						<th class="text-center">
                    							OPCION 2
                    						</th>
                    						<th class="text-center">
                    							OPCION 3
                    						</th>
                                <th class="text-center">
                    							Borrar
                    						</th>
                    					</tr>
                    				</thead>
                    				<tbody>

                               <tr id='addr0'>
                                 <td>
                                   <input class='form-control' style='width:40px' name="index" type="text" readonly value="1">
                                 </td>
                                 <td>
                                 <input type="text" name='opcion-1'  placeholder='Opcion 1' class="form-control"/>
                                 </td>
                                 <td>
                                 <input type="text" name='opcion-2' placeholder='Opcion 2' class="form-control"/>
                                 </td>
                                 <td>
                                 <input type="text" name='opcion-3' placeholder='Opcion 3' class="form-control"/>
                                 </td>
                               </tr>
                                        <tr id='addr1'></tr>
                    				</tbody>
                    			</table>
                          <a id="add_row" class="btn btn-default pull-left">Agregar nuevo</a>
                          <a id='delete_row' class="pull-right btn btn-default">Borrar ultimo</a>
                          <a id='' onclick="buildTableSizesToJson()" class="pull-right btn btn-default">Test Json</a>
                        </div>

                      </div>
                    </div>
                  </div>
               <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                      <div class="col-xs-4">
                        <label for="name">Categoría</label>
                          <!-- Summernote Container -->
                        <select class="form-control" id="categories" name="categories[]" multiple="multiple">
                           <option></option>
                           @foreach($categories as $category)
                             <option value="{{$category->id}}"  >{{$category->name}}</option>
                           @endforeach
                        </select>
                      </div>
                      <div class="col-xs-4">
                        <label for="name">SubCategoría</label>
                          <!-- Summernote Container -->
                        <select class="form-control" id="subcategories"  name="subcategories[]" multiple="multiple">
                           <option></option>
                           @foreach($subcategories as $subcategory)
                             <option value="{{$subcategory->id}}" >{{$subcategory->name}}</option>
                           @endforeach
                        </select>
                      </div>
                      <div class="col-xs-4">
                        <label for="name">Países</label>
                        <select class="form-control" id="countries"  name="countries[]" multiple="multiple">
                           <option></option>
                           @foreach($countries as $country)
                             <option value="{{$country->id}}">{{$country->name}}</option>
                           @endforeach

                        </select>
                      </div>

                    </div>
                  </div>
                </div>
               <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                      <div class="col-xs-12">
                        <label for="name">Imágen de portada</label>
                          <!-- Summernote Container -->

                          <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;clear:both">
                              <img src="http://placehold.it/200x150">

                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">


                            </div>
                            <div>
                              <span class="btn btn-default btn-file"><span class="fileinput-new">Seleccionar imagen</span><span class="fileinput-exists">Cambiar</span><input type="file" name="coverimage"></span>
                              <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Quitar</a>
                            </div>
                          </div>
                      </div>

                    </div>
                  </div>
                </div>
               <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                      <div class="col-xs-12">
                        <label for="name">Tags (agregar tags para buscadores, separados por coma)</label>
                          <!-- Summernote Container -->
                          <input class="js-tags-input form-control" type="text" id="tags" name="tags" value="">


                      </div>

                    </div>
                  </div>
                </div>
               <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                      <div class="col-xs-12">
                        <label for="name">URL SEO</label>
                          <!-- Summernote Container -->
                          <input  class="form-control input-lg" type="text" name="friendly_url" id="friendly_url" value="">


                      </div>

                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label for="mega-bio">Imágenes</label>
                                <div class="dropzone"></div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <button class="btn btn-success" type="submit"><i class="fa fa-check push-5-r"></i> Guardar</button>
                            <button class="btn btn-danger" type="submit"><i class="fa fa-ban push-5-r"></i> Cancelar</button>
                        </div>
                    </div>
                  </div>
                </div>
                <input type="hidden"  id="tableHidden" name="tableHidden" value="">
            </form>
        </div>
        </div>

      </div>
      <!-- END Page Content -->
  </main>
@endsection
@section('custom-css')


@endsection
@section('custom-scripts')


<script src="{{asset('theme/src/assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.js')}}"></script>





<script>

var urlAPI = "{{ url('api/products/create') }}";
var urlController = "{{ url('admin/products') }}";
var urlMedia = "{{ url('api/media/uploadFiles') }}";
function buildTableSizesToJson(){

      console.log($("#tab_logic").find('input').serializeArray());

  }
$(document).ready(function(){

  jQuery('.js-tags-input').tagsInput({
      height: '36px',
      width: '100%',
      defaultText: 'Tags',
      removeWithBackspace: true,
      delimiter: [',']
  });

  var myDropzone = new Dropzone(".dropzone", { uploadMultiple: true,parallelUploads:100,url: urlMedia ,autoProcessQueue:false,acceptedFiles: "image/jpeg,image/png,image/gif"});

  $("#name").keyup(function(){
    var Text = $(this).val();
    Text = Text.toLowerCase();
    Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
    $("#friendly_url").val(Text);
  });
  $("#categories").select2({
    placeholder:"Seleccione una categoría",
    allowClear: true
  });
  $("#subcategories").select2({
    placeholder:"Seleccione una subcategoría",
    allowClear: true
  });
  $("#countries").select2({
    placeholder:"Países",
    allowClear: true
  });
  $("textarea").wysihtml5({toolbar: {
    "font-styles": true, // Font styling, e.g. h1, h2, etc.
    "emphasis": true, // Italics, bold, etc.
    "lists": true, // (Un)ordered lists, e.g. Bullets, Numbers.
    "html": true, // Button which allows you to edit the generated HTML.
    "link": false, // Button to insert a link.
    "image": false, // Button to insert an image.
    "color": false, // Button to change color of font
    "blockquote": false, // Blockquote
    "size":"sm" // options are xs, sm, lg
  }});

  var i=1;
  $("#add_row").click(function(){
    $('#addr'+i).html("<td>"+ (i+1) +"</td><td><input name='opciona"+i+"' type='text' placeholder='Opcion "+i+"' class='form-control input-md'  /> </td><td><input  name='opcionb"+i+"' type='text' placeholder='Opcion "+i+"'  class='form-control input-md'></td><td><input  name='opcionc"+i+"' type='text' placeholder='Opcion "+i+"'  class='form-control input-md'></td>");

    $('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
    i++;
  });
  $("#delete_row").click(function(){
  	 if(i>1){
    	 $("#addr"+(i-1)).html('');
    	 i--;
    	 }
  });

  $("#form").on('submit', function(e) {
      e.preventDefault();
      //showSpinner();
      //Table of sizes
      $('#tableHidden').val(JSON.stringify($("#tab_logic").find('input').serializeArray()));

      $.ajax({
          method: "POST",
          url: urlAPI,
          data: new FormData($('#form')[0]),
          processData: false,
          contentType: false,
      }).done(function(response) {
          if (!response.success) {
              sweetAlert("Oops...", response.message, "error");
          } else {

              swal({
                  title: "Éxito",
                  text: "El elemento se ha creado correctamente",
                  type: "success",
                  showCancelButton: false,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "Ok",
                  closeOnConfirm: true },
                function(){
                  //swal("Deleted!", "Your imaginary file has been deleted.", "success");


                  var productID = response.data.id;

                  myDropzone.on("sending", function(file, xhr, formData) {
                    formData.append("productId", productID);
                    formData.append("_token", $('input[name="_token"]').val());
                    formData.append("location", "products");

                  });
                  myDropzone.processQueue();
                    document.location.href =urlController +"/list";
                });


          }

      });
  });
});
</script>
@endsection
