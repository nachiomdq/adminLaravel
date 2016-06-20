	var map;
	function initialize() {


	  var MY_MAPTYPE_ID = 'custom_style';

	  var featureOpts = [
	    {
	      elementType: 'labels',
	      stylers: [
	        { visibility: 'on' }
	      ]
	    },
	    {
	      featureType: 'water',
	      stylers: [
	        { color: '#d5d4cf' }
	      ]
	    },
	    {
	      featureType: 'landscape',
		  elementType: 'geometry',
	      stylers: [
	        { color: '#f2f1eb' }
	      ]
	    },
	    {
	      featureType: 'landscape',
		  elementType: 'labels.text.fill',
	      stylers: [
	        { color: '#969a91' }
	      ]
	    },
	    {
	      featureType: 'landscape',
		  elementType: 'labels.text.stroke',
	      stylers: [
	        { color: '#f2f1ec' }
	      ]
	    },
	    {
	      featureType: 'administrative',
		  elementType: 'labels.text.fill',
	      stylers: [
	        { color: '#969a91' }
	      ]
	    },
	    {
	      featureType: 'administrative',
		  elementType: 'labels.text.stroke',
	      stylers: [
	        { color: '#f2f1ec' }
	      ]
	    },
	    {
	      featureType: 'poi',
		  elementType: 'geometry',
	      stylers: [
	        { color: '#e1e0da' }
	      ]
	    },
	    {
	      featureType: 'poi',
		  elementType: 'labels.text.fill',
	      stylers: [
	        { color: '#969a91' }
	      ]
	    },
	    {
	      featureType: 'poi',
		  elementType: 'labels.text.stroke',
	      stylers: [
	        { color: '#f2f1ec' }
	      ]
	    },
	    {
	      featureType: 'road',
		  elementType: 'geometry.fill',
	      stylers: [
	        { color: '#e1e0da' }
	      ]
	    },
	    {
	      featureType: 'road',
		  elementType: 'geometry.stroke',
	      stylers: [
	        { color: '#d4d3ca' }
	      ]
	    },
	    {
	      featureType: 'road',
		  elementType: 'labels.icon',
	      stylers: [
	        { saturation: '-100' },
	        { lightness: '50' },
	        { hue: '#d4d3ca' }
	      ]
	    },
	    {
	      featureType: 'road',
		  elementType: 'labels.text.fill',
	      stylers: [
	        { color: '#969a91' }
	      ]
	    },
	    {
	      featureType: 'road',
		  elementType: 'labels.text.stroke',
	      stylers: [
	        { color: '#f2f1ec' }
	      ]
	    },
	    {
	      featureType: 'road.highway',
		  elementType: 'geometry.stroke',
	      stylers: [
	        { color: '#d0cfca' }
	      ]
	    },
	    {
	      featureType: 'road.highway',
		  elementType: 'geometry.fill',
	      stylers: [
	        { color: '#dcdbd6' }
	      ]
	    }

	  ];

	  var mapOptions = {
	    zoom: 15,
	    center: new google.maps.LatLng(-34.478034, -58.508725),
		mapTypeControlOptions: {
		      mapTypeIds: [google.maps.MapTypeId.ROADMAP, MY_MAPTYPE_ID]
		    },
		    mapTypeId: MY_MAPTYPE_ID

	  };


	  map = new google.maps.Map(document.getElementById('map-canvas'),
	      mapOptions);

  var styledMapOptions = {
    name: 'Custom Style'
  };




//	Puntos de Venta CABA y GBA



	  var pdv2 = new google.maps.Marker({
	      position: new google.maps.LatLng(-34.478034, -58.508725),
	      map: map,
	      title: 'Aberdesign S.A.',
	      icon: icono
	  });

	  var infowindow2 = new google.maps.InfoWindow({
	      content: '<div class="map-info" id="content">'+
	      '<h1 id="firstHeading" class="firstHeading">Aberdesign S.A.</h1>'+
	      '<div class="contenido" id="bodyContent">'+
	      '<p>Av. Lacaze 4462<br>' +
	      'Claypole<br>'+
	      '(11) 4291 0528 / 0538<br>'+
	      '<a href="http://www.aberdesign.com.ar" target="_blank">www.aberdesign.com.ar</a></p>'+
	      '</div>'+
	      '</div>'
	  });

	  google.maps.event.addListener(pdv2, 'click', function() {
		closeall();
	    infowindow2.open(map,pdv2);
	  });




	  function closeall() {

	    infowindow2.close();
	    infowindow3.close();
	    infowindow4.close();
	    infowindow6.close();

	  }

// Fin Puntos de Venta

  var customMapType = new google.maps.StyledMapType(featureOpts, styledMapOptions);

  map.mapTypes.set(MY_MAPTYPE_ID, customMapType);

	}



	google.maps.event.addDomListener(window, 'load', initialize);
