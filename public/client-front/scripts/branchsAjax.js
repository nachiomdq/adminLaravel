



$(".selectState").on('click', function(e) {
  $(".cuerpo").LoadingOverlay("show");
  e.preventDefault();
  var stateID = $(this).attr('data-id');
  $('.selectState').removeClass('active');
  $('.selectState[data-id=' + stateID + ']').addClass('active');



  $.ajax({
      method: "GET",
      url: urlList,
      data: {stateID:stateID,returnView:true}
  }).done(function(response) {

      $(".cuerpo").LoadingOverlay("hide");
      $('#ajax-response').html(response);
      initMap(stateID);
      initFind();
  });


});
function initMap(stateID){
  initialize();

  $.ajax({
      method: "GET",
      url: urlList,
      data: {stateID:stateID,returnView:false}
  }).done(function(response) {

      $.each( response.data.branchs, function( index, value ){



        var content= '<div class="map-info" id="content">'+
                     '<h1 id="firstHeading" class="firstHeading">'+value.name+'</h1>'+
                     '<div class="contenido" id="bodyContent">'+
                     value.description +
                     '</div>'+
                     '</div>';

        windowMap(content,value);
      });

  });



}
function initFind(){
  $(".findInMap").on('click', function(e) {
    e.preventDefault();
    var latitude = $(this).attr('data-latitude');
    var longitude = $(this).attr('data-longitude');

    var center = new google.maps.LatLng(latitude, longitude);
    // using global variable:
    map.panTo(center);

  });
}
function windowMap(content,value){
  var pdv = new google.maps.Marker({
      position: new google.maps.LatLng(value.latitude,value.longitude),
      map: map,
      title: value.title,
      icon: icono
  });

    google.maps.event.addListener(pdv,'click', (function(){
        infowindow.close();
        infowindow = new google.maps.InfoWindow({
            content: content
    });
    infowindow.open(map, pdv);
    }))

}


$(document).ready(function(){

  //Start with the first

  $('.selectState.active').click();

});
