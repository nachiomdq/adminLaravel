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


        var pdv = new google.maps.Marker({
            position: new google.maps.LatLng(value.latitude, value.longitude),
            map: map,
            title: value.name,
            icon: icono
        });
        infowindow = new google.maps.InfoWindow({
            content: '<div class="map-info" id="content">'+
            '<h1 id="firstHeading" class="firstHeading">'+value.name+'</h1>'+
            '<div class="contenido" id="bodyContent">'+
            value.description +
            '</div>'+
            '</div>'
        });

        google.maps.event.addListener(pdv, 'click', function() {
          if (infowindow) {
              infowindow.close();
          }
          infowindow.open(map,pdv);
        });

      });
      console.log(response.data)
  });



}

$(document).ready(function(){

  //Start with the first

  $('.selectState.active').click();
});
