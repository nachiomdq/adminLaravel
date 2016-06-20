@extends('backend.layouts.app')


@section('main-content')
  <main id="main-container">
      <!-- Page Header -->
      <div class="content bg-gray-lighter">
          <div class="row items-push">
              <div class="col-sm-8">
                  <h1 class="page-heading">
                      Edición de producto  <small>{{$product->name}}</small>
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
                        <input class="form-control input-lg" type="text" id="name" name="name" value="{{$product->name}}">
                      </div>

                    </div>
                  </div>
                </div>
               <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                      <div class="col-xs-12">
                        <label for="name">Subtítulo</label>
                        <input class="form-control input-lg" type="text" id="subtitle" name="subtitle" value="{{$product->subtitle}}">
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
                        <textarea class="form-control summernote" name="descripcion">{!!html_entity_decode($product->description)!!}</textarea>
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
                        <textarea class="form-control summernote" name="characteristics">{{$product->characteristics}}</textarea>
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
                           <textarea class="form-control summernote" name="table_of_sizes">{{$product->table_of_sizes}}</textarea>


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
                               <option value="{{$category->id}}"  {{ in_array($category->id, $selectedSubCategories) ? 'selected' : ''}}>{{$category->name}}</option>
                             @endforeach
                          </select>
                        </div>
                        <div class="col-xs-4">
                          <label for="name">SubCategoría</label>
                          <select class="form-control" id="subcategories"  name="subcategories[]" multiple="multiple">
                             <option></option>
                             @foreach($subcategories as $subcategory)
                               <option value="{{$subcategory->id}}" {{ in_array($subcategory->id, $selectedSubCategories) ? 'selected' : ''}}>{{$subcategory->name}}</option>
                             @endforeach
                          </select>
                        </div>
                        <div class="col-xs-4">
                          <label for="name">Países</label>
                          <select class="form-control" id="countries"  name="countries[]" multiple="multiple">
                             <option></option>
                             @foreach($countries as $country)
                               <option value="{{$country->id}}" {{ in_array($country->id, $selectedCountries) ? 'selected' : ''}}>{{$country->name}}</option>
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

                            <div class="fileinput fileinput-exists" data-provides="fileinput">
                              <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;clear:both">
                                <img src="http://placehold.it/200x150">

                              </div>
                              <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                @if($product->cover_image)
                                     <img src="{{asset('storage/products/' . $product->cover_image)}}" class="img-responsive" alt="">
                                 @else
                                   	  <img src="http://placehold.it/200x150">
                                 @endif

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
                            <input class="js-tags-input form-control" type="text" id="tags" name="tags" value="{{$product->tags}}">


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
                            <input  class="form-control input-lg" type="text" name="friendly_url" id="friendly_url" value="{{$product->friendly_url}}">


                        </div>

                      </div>
                    </div>
                  </div>
                 <div class="row">
                  <div class="col-sm-12">
                      <div class="form-group">
                        <div class="col-xs-12">
                            <label for="name">Destacado?</label><br>
                            <label class="css-input switch switch-default">
                                <input name="featured" type="checkbox" <?php if($product->featured) echo "checked=";?>><span></span>
                            </label>
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

<link rel="stylesheet" href="{{asset('theme/src/assets/js/plugins/dropzonejs/dropzone.min.css')}}">


@endsection
@section('custom-scripts')

<script src="{{asset('theme/src/assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.js')}}"></script>





<script>

var urlAPI = "{{ url('api/products/edit/'.$product->id) }}";
var urlController = "{{ url('admin/products') }}";
var urlMedia = "{{ url('api/media/uploadFiles') }}";
$(document).ready(function(){

  jQuery('.js-tags-input').tagsInput({
      height: '36px',
      width: '100%',
      defaultText: 'Tags',
      removeWithBackspace: true,
      delimiter: [',']
  });
  $('.summernote').summernote({
    callbacks: {
        onPaste: function (e) {
            var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');

            e.preventDefault();

            // Firefox fix
            setTimeout(function () {
                document.execCommand('insertText', false, bufferText);
            }, 10);
        }
    }
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
  var i={{$product->countTables -1}};
  $("#add_row").click(function(){
    $('#addr'+i).html("<td><input name='index' class='form-control' style='width:40px' type='text' readonly value="+ (i+1) +"></td><td><input name='opcion-1' type='text' placeholder='Opcion "+i+"' class='form-control input-md'  /> </td><td><input  name='opcion-2' type='text' placeholder='Opcion "+i+"'  class='form-control input-md'></td><td><input  name='opcion-3' type='text' placeholder='Opcion "+i+"'  class='form-control input-md'></td>");

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
    /*  var output = [];
      $("tbody tr").each(function() {
          var obj = {};
          obj.opcion1 = $(":input[name=opcion-1]", this).val();
          obj.opcion2 = $(":input[name=opcion-2]", this).val();
          obj.opcion3 = $(":input[name=opcion-3]", this).val();
          output.push(obj);
      });

      $('#tableHidden').val(JSON.stringify(output));*/
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
                  text: "El elemento se ha editado correctamente",
                  type: "success",
                  showCancelButton: false,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "Ok",
                  closeOnConfirm: true },
                function(){
                  //swal("Deleted!", "Your imaginary file has been deleted.", "success");
                  //document.location.href = "{{ url('eventos/listado') }}";
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
