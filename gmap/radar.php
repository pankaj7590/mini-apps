<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Search for up to 200 places with Radar Search</title>
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
			.controls {
				margin-top: 10px;
				border: 1px solid transparent;
				border-radius: 2px 0 0 2px;
				box-sizing: border-box;
				-moz-box-sizing: border-box;
				height: 32px;
				outline: none;
				box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
			}

			#pac-input {
				background-color: #fff;
				font-family: Roboto;
				font-size: 15px;
				font-weight: 300;
				margin-left: 12px;
				padding: 0 11px 0 13px;
				text-overflow: ellipsis;
				width: 300px;
			}
    </style>
		<script src="../js/jquery.min.js"></script>
		<script src="place_types.js"></script>
    <script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var map;
      var infoWindow;
      var service;

      function initMap() {
		var input = document.getElementById('pac-input');
		
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 19.19012, lng: 72.97849},
          zoom: 15,
          styles: [{
            stylers: [{ visibility: 'simplified' }]
          }, {
            elementType: 'labels',
            stylers: [{ visibility: 'off' }]
          }]
        });
		
		map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        infoWindow = new google.maps.InfoWindow();
        service = new google.maps.places.PlacesService(map);

        // The idle event is a debounced event, so we can query & listen without
        // throwing too many requests at the server.
        //map.addListener('idle', performSearch);
      }

      function performSearch(type) {
        var request = {
          bounds: map.getBounds(),
          type: type
        };
        service.radarSearch(request, callback);
      }

      function callback(results, status) {
        if (status !== google.maps.places.PlacesServiceStatus.OK) {
          console.error(status);
          return;
        }
        for (var i = 0, result; result = results[i]; i++) {
          addMarker(result);
        }
      }

      function addMarker(place) {
        var marker = new google.maps.Marker({
          map: map,
          position: place.geometry.location,
          icon: {
            url: 'http://maps.gstatic.com/mapfiles/circle.png',
            anchor: new google.maps.Point(10, 10),
            scaledSize: new google.maps.Size(10, 17)
          }
        });

        google.maps.event.addListener(marker, 'click', function() {
          service.getDetails(place, function(result, status) {
            if (status !== google.maps.places.PlacesServiceStatus.OK) {
              console.error(status);
              return;
            }
            infoWindow.setContent(result.name);
            infoWindow.open(map, marker);
          });
        });
      }
	  
	  $(document).ready(function(){
				var placeTypesOptions = '';
				$.each(place_types, function(k,v){
					placeTypesOptions += '<option value="'+v+'">'+v+'</option>';
				});
				$('#pac-input').html(placeTypesOptions);
		
				$('#pac-input').change(function(){
					performSearch($(this).val());
				});
			})
    </script>
  </head>
  <body>
		<select id="pac-input" class="controls" placeholder="Enter a location"></select>
    <div id="map"></div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6jCALkjpw10kNTeQt62MQc5PSC8R5ioA&callback=initMap&libraries=places,visualization" async defer></script>
  </body>
</html>