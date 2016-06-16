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
	    zoom: 12,
	    center: new google.maps.LatLng(-34.642649, -58.546226),
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
  
  
var icono = 'images/icon-mapa.png';

//	Puntos de Venta CABA y GBA



	  var pdv2 = new google.maps.Marker({
	      position: new google.maps.LatLng(-34.804524, -58.336246),
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

	  var pdv3 = new google.maps.Marker({
	      position: new google.maps.LatLng(-34.822914, -58.482484),
	      map: map,
	      title: 'Aberturas Padi SRL',
	      icon: icono
	  });

	  var infowindow3 = new google.maps.InfoWindow({
	      content: '<div class="map-info" id="content">'+
	      '<h1 id="firstHeading" class="firstHeading">Aberturas Padi SRL</h1>'+
	      '<div class="contenido" id="bodyContent">'+
	      '<p>Dardo Rocha 1746<br>' +
	      'El Jagüel<br>'+
	      '(11) 4290-4984<br>'+
	      '<a href="http://www.pa-di.com.ar" target="_blank">www.pa-di.com.ar</a></p>'+
	      '</div>'+
	      '</div>'
	  });

	  google.maps.event.addListener(pdv3, 'click', function() {
		closeall();
	    infowindow3.open(map,pdv3);
	  });

	  var pdv4 = new google.maps.Marker({
	      position: new google.maps.LatLng(-34.474704, -58.530918),
	      map: map,
	      title: 'Arquitec',
	      icon: icono
	  });

	  var infowindow4 = new google.maps.InfoWindow({
	      content: '<div class="map-info" id="content">'+
	      '<h1 id="firstHeading" class="firstHeading">Arquitec</h1>'+
	      '<div class="contenido" id="bodyContent">'+
	      '<p>Av. Andrés Rolon 762<br>' +
	      'San Isidro<br>'+
	      '(11) 4723-4174 / 1920</p>'+
	      '</div>'+
	      '</div>'
	  });

	  google.maps.event.addListener(pdv4, 'click', function() {
		closeall();
	    infowindow4.open(map,pdv4);
	  });


	  var pdv6 = new google.maps.Marker({
	      position: new google.maps.LatLng(-34.635884, -58.603355),
	      map: map,
	      title: 'Mega Aberturas',
	      icon: icono
	  });

	  var infowindow6 = new google.maps.InfoWindow({
	      content: '<div class="map-info" id="content">'+
	      '<h1 id="firstHeading" class="firstHeading">Mega Aberturas</h1>'+
	      '<div class="contenido" id="bodyContent">'+
	      '<p>Av. Gaona 2920 - Haedo (1706)<br>' +
	      '(11) 4443-5565<br>'+
	      '<a href="http://www.mega-aberturas.com.ar" target="_blank">www.mega-aberturas.com.ar</a></p>'+
	      '</div>'+
	      '</div>'
	  });

	  google.maps.event.addListener(pdv6, 'click', function() {
		closeall();
	    infowindow6.open(map,pdv6);
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
