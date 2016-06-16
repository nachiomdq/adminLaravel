@extends('backend.layouts.app')


@section('main-content')
  <main id="main-container">
      <!-- Page Header -->
      <div class="content bg-gray-lighter">
          <div class="row items-push">
              <div class="col-sm-8">
                  <h1 class="page-heading">
                      Edición de categoría  <small>{{$branch->name}}</small>
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
                        <input class="form-control input-lg" type="text" id="name" name="name" value="{{$branch->name}}">
                      </div>

                    </div>
                  </div>
                </div>
                <div class="row">
                 <div class="col-sm-12">
                     <div class="form-group">
                       <div class="col-xs-12">
                         <label for="name">Subtitulo</label>
                         <input class="form-control input-lg" type="text" id="subtitle" name="subtitle" value="{{$branch->subtitle}}">
                       </div>

                     </div>
                   </div>
                 </div>
               <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                      <div class="col-xs-12">
                        <label for="name">Descripción</label>

                        <textarea class="form-control" name="descripcion">{{$branch->description}}</textarea>
                      </div>

                    </div>
                  </div>
                </div>
               <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                      <div class="col-xs-12">
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
                      <div class="col-xs-6">
                        <label for="name">Latitud</label>
                          <input  class="form-control input-lg" value="{{$branch->latitude}}"  type="text" name="latitude" id="latitude" value="">

                      </div>
                      <div class="col-xs-6">
                        <label for="name">Longitud</label>
                          <input  class="form-control input-lg" value="{{$branch->longitude}}" type="text" name="longitude" id="longitude" value="">

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

var urlAPI = "{{ url('api/branchs/edit/'.$branch->id) }}";
var urlController = "{{ url('admin/branch') }}";
$(document).ready(function(){

    $("#countries").select2({
      placeholder:"Países",
      allowClear: true
    });
  $("#name").keyup(function(){
    var Text = $(this).val();
    Text = Text.toLowerCase();
    Text = Text.replace(/[^a-zA-Z0-9]+/g,'-');
    $("#friendly_url").val(Text);
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
                  document.location.href = urlController+"/list";


                });


          }

      });
  });
});
</script>
@endsection
