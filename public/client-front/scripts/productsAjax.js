$(".selectCategory").on('click', function(e) {
  $(".cuerpo").LoadingOverlay("show");
  e.preventDefault();
  var catId = $(this).attr('data-id');
  $('.selectCategory').removeClass('active');
  $('.selectCategory[data-id=' + catId + ']').addClass('active');

  //Save the reference
  $('#categoryID').val(catId);

  loadSpinner();
  $.ajax({
      method: "GET",
      url: urlList,
      data: {catId:catId}
  }).done(function(response) {

      $(".cuerpo").LoadingOverlay("hide");
      $('#ajax-response').html(response);
      initSubcategories();
    });


});
function initSubcategories(){
  $(".selectSubCategory").on('click', function(e) {

    e.preventDefault();
    var catId = $('#categoryID').val();
    var subCatId = $(this).attr('data-id');

    //Save the reference
    $('#categoryID').val(catId);
    $(".cuerpo").LoadingOverlay("show");
    $.ajax({
        method: "GET",
        url: urlList,
        data: {catId:catId,subCatId:subCatId}
    }).done(function(response) {
        $(".cuerpo").LoadingOverlay("hide");
        $('#ajax-response').html(response);
        initSubcategories();
        $('.selectSubCategory').removeClass('active');
        $('.selectSubCategory[data-id=' + subCatId + ']').addClass('active');
      });


  });
}
function loadSpinner(){
  $('.ajax-loader').fadeIn();
}
function hideSpinner(){
  $('.ajax-loader').fadeOut();
}

$(document).ready(function(){

  //Start with the first

  $('.selectCategory.active').click();
});
