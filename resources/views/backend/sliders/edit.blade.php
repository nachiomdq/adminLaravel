@extends('backend.layouts.app')


@section('main-content')
  <main id="main-container">
      <!-- Page Header -->
      <div class="content bg-gray-lighter">
          <div class="row items-push">
              <div class="col-sm-8">
                  <h1 class="page-heading">
                      Nuevo slider
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
                        <input class="form-control input-lg" type="text" id="name" name="name" value="{{$slider->title}}">
                      </div>

                    </div>
                  </div>
                </div>
               <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                      <div class="col-xs-12">
                        <label for="name">Subtitulo</label>

                        <input class="form-control input-lg" type="text" id="subtitle" name="subtitle" value="{{$slider->subtitle}}">
                      </div>

                    </div>
                  </div>
                </div>
               <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                      <div class="col-xs-12">
                        <label for="name">Texto del botón</label>

                        <input class="form-control input-lg" type="text" id="button_text" name="button_text" value="{{$slider->button_text}}">
                      </div>

                    </div>
                  </div>
                </div>
                <div class="row">
                 <div class="col-sm-12">
                     <div class="form-group">

                       <div class="col-xs-12">
                         <label for="name">Asociar enlace a {{$slider->type_url}}</label>
                          <div class="row">
                            <div class="col-xs-3">
                              <label class="css-input css-radio css-radio-default">
                                  <input type="radio" value="product" {{ ($slider->type_url) == 'product' ? 'checked' : '' }} name="radio-group1"><span></span> Producto
                              </label>
                            </div>
                            <div class="col-xs-6 {{ ($slider->type_url) == 'product' ? '' : 'hide' }}   selprod">
                              <select style="width:100%" class="select2 form-control" id="product"  name="product" >

                                 @foreach($products as $product)

                                   <option {{ ($product->id) == $slider->type_id ? 'selected' : '' }}  value="{{$product->id}}">{{$product->name}}</option>
                                 @endforeach

                              </select>
                            </div>
                         </div>
                         <div class="row">
                             <div class="col-xs-3">
                               <label class="css-input css-radio css-radio-default">
                                   <input type="radio" value="promotion"  {{ ($slider->type_url) == 'promotion' ? 'checked' : '' }} name="radio-group1"><span></span> Promoción
                               </label>
                             </div>
                               <div class="col-xs-6 {{ ($slider->type_url) == 'promotion' ? '' : 'hide' }}   selprom">
                                 <select style="width:100%" class="select2 form-control" id="promotion"  name="promotion" >

                                    @foreach($promotions as $promotion)
                                      <option {{ ($promotion->id) == $slider->type_id ? 'selected' : '' }} value="{{$promotion->id}}">{{$promotion->name}}</option>
                                    @endforeach

                                 </select>
                               </div>
                         </div>
                         <div class="row">

                             <div class="col-xs-3">
                               <label class="css-input css-radio css-radio-default">
                                   <input type="radio" value="other"  {{ ($slider->type_url) == 'other' ? 'checked' : '' }} name="radio-group1"><span></span> Otro
                               </label>
                             </div>
                             <div class="col-xs-6 {{ ($slider->type_url) == 'other' ? '' : 'hide' }} selother">
                               <input type="text" class="form-control" name="other_url" placeholder="Ejemplo: http://google.com" value="{{ ($slider->type_url) == 'other' ? $slider->href : '' }}">
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
                         <label for="name">Imágen</label>
                           <!-- Summernote Container -->

                           <div class="fileinput fileinput-exists" data-provides="fileinput">
                             <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;clear:both">
                               <img src="http://placehold.it/200x150">

                             </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                              @if($slider->image)
                                   <img src="{{asset('storage/sliders/' . $slider->image)}}" class="img-responsive" alt="">
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

var urlAPI = "{{ url('api/sliders/edit/'.$slider->id) }}";
var urlController = "{{ url('admin/sliders') }}";
$(document).ready(function(){

  $('.summernote').summernote({
          height:150,
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

  $('input[name=radio-group1]').change(function() {
    $('.selprod').addClass('hide');
    $('.selprom').addClass('hide');
    $('.selother').addClass('hide');
    if($(this).val() == "product"){
      $('.selprod').removeClass('hide')
    }
    if($(this).val() == "promotion"){
      $('.selprom').removeClass('hide')
    }
    if($(this).val() == "other"){
      $('.selother').removeClass('hide')
    }
  });
  $(".select2").select2({


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
