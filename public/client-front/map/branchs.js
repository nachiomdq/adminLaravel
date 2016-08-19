	var map;


	function initialize(stateID) {


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
    var zoom = 12;
    if(stateID == "-1")
      zoom = 3;
	  var mapOptions = {
	    zoom: zoom,
	    center: new google.maps.LatLng(latitude, longitude),
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


  var customMapType = new google.maps.StyledMapType(featureOpts, styledMapOptions);

  map.mapTypes.set(MY_MAPTYPE_ID, customMapType);

	}



	google.maps.event.addDomListener(window, 'load', initialize);
  var infowindow = new google.maps.InfoWindow();
