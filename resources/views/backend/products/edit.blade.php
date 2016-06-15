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
                        <label for="name">Descripción</label>
                          <!-- Summernote Container -->
                        <textarea class="form-control" name="descripcion">{{$product->description}}</textarea>
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
            </form>
        </div>
        </div>

      </div>
      <!-- END Page Content -->
  </main>
@endsection
@section('custom-css')
<link rel="stylesheet" href="{{asset('theme/src/assets/js/plugins/summernote/summernote.min.css')}}">
<link rel="stylesheet" href="{{asset('theme/src/assets/js/plugins/summernote/summernote-bs3.min.css')}}">
<link rel="stylesheet" href="{{asset('theme/src/assets/js/plugins/dropzonejs/dropzone.min.css')}}">


@endsection
@section('custom-scripts')
<script src="{{asset('theme/src/assets/js/plugins/summernote/summernote.min.js')}}"></script>
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

  var myDropzone = new Dropzone(".dropzone", { url: urlMedia ,autoProcessQueue:false,acceptedFiles: "image/jpeg,image/png,image/gif"});

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


  $("#form").on('submit', function(e) {
      e.preventDefault();
      //showSpinner();

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

                  myDropzone.on("sending", function(file, xhr, formData) {
                    formData.append("id", response.data.id);
                    formData.append("_token", $('input[name="_token"]').val());
                    formData.append("location", "products");

                  });
                  myDropzone.processQueue();
                });


          }

      });
  });
});
</script>
@endsection
