<!DOCTYPE html>
<html>
	<head>
		<title>Place Autocomplete</title>
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no">
		<meta charset="utf-8">
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

			#pac-input:focus {
				border-color: #4d90fe;
			}

			.pac-container {
				font-family: Roboto;
			}

			#type-selector {
				color: #fff;
				background-color: #4d90fe;
				padding: 5px 11px 0px 11px;
			}

			#type-selector label {
				font-family: Roboto;
				font-size: 13px;
				font-weight: 300;
			}
		</style>
		<script src="../js/jquery.min.js"></script>
	</head>
	<body>
		<input id="pac-input" class="controls" type="text" placeholder="Enter a location">
		<div id="type-selector" class="controls">
			<input type="radio" name="type" id="changetype-all" checked="checked">
			<label for="changetype-all">All</label>

			<input type="radio" name="type" id="changetype-establishment">
			<label for="changetype-establishment">Establishments</label>

			<input type="radio" name="type" id="changetype-address">
			<label for="changetype-address">Addresses</label>

			<input type="radio" name="type" id="changetype-geocode">
			<label for="changetype-geocode">Geocodes</label>
	  
			<input type="button" value="Redraw" style="display:none" id="redraw"/>
		</div>
		<div id="map" style="height:500px;"></div>
		<input id="latitude" placeholder="Latitude"><input id="longitude" placeholder="Longitude">
		<script src="https://cdn.klokantech.com/maptilerlayer/v1/index.js"></script>
		<script>
			// This example requires the Places library. Include the libraries=places
			// parameter when you first load the API. For example:

			function initMap() {
				var markers = [];
		  
				var map = new google.maps.Map(document.getElementById('map'), {
					center: {lat: -33.8688, lng: 151.2195},
					zoom: 13,
					streetViewControl: false,
				});
				
				var input = /** @type {!HTMLInputElement} */(document.getElementById('pac-input'));

				var types = document.getElementById('type-selector');
				map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
				map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);

				var autocomplete = new google.maps.places.Autocomplete(input);
				autocomplete.bindTo('bounds', map);

				//var infowindow = new google.maps.InfoWindow();
				var marker = new google.maps.Marker({
					map: map,
					anchorPoint: new google.maps.Point(0, -29)
				});

				autocomplete.addListener('place_changed', function() {
					//infowindow.close();
					marker.setVisible(false);
					var place = autocomplete.getPlace();
					if (!place.geometry) {
						window.alert("Autocomplete's returned place contains no geometry");
						return;
					}

					// If the place has a geometry, then present it on a map.
					if (place.geometry.viewport) {
						map.fitBounds(place.geometry.viewport);
					} else {
						map.setCenter(place.geometry.location);
						map.setZoom(17);  // Why 17? Because it looks good.
					}
					marker.setIcon(/** @type {google.maps.Icon} */({
						//url: place.icon,
						url: 'marker-icon-71x92.png',
						size: new google.maps.Size(71, 92),
						origin: new google.maps.Point(0, 0),
						anchor: new google.maps.Point(17, 34),
						scaledSize: new google.maps.Size(35, 45)
					}));
					marker.setPosition(place.geometry.location);
					marker.setVisible(true);

					var address = '';
					if (place.address_components) {console.log(place);
						address = [
							(place.address_components[0] && place.address_components[0].short_name || ''),
							(place.address_components[1] && place.address_components[1].short_name || ''),
							(place.address_components[2] && place.address_components[2].short_name || '')
						].join(' ');
					}
					//console.log("Latitude : " + place.geometry.location.lat());
					$("#latitude").val(place.geometry.location.lat());
					//console.log("Longitude : " + place.geometry.location.lng());
					$("#longitude").val(place.geometry.location.lng());
		
					/*  infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
					infowindow.open(map, marker); */
				});

				autocomplete.setTypes([]);
	
				// Sets a listener on a radio button to change the filter type on Places
				// Autocomplete.
				function setupClickListener(id, types) {
					var radioButton = document.getElementById(id);
					radioButton.addEventListener('click', function() {
						autocomplete.setTypes(types);
					});
				}

				setupClickListener('changetype-all', []);
				setupClickListener('changetype-address', ['address']);
				setupClickListener('changetype-establishment', ['establishment']);
				setupClickListener('changetype-geocode', ['geocode']);
		
				google.maps.event.addListener(map, 'click', function(event) {
					placeMarker(event.latLng);
				});
		
				function placeMarker(location) {
					$("#latitude").val(location.lat());
					$("#longitude").val(location.lng());
					marker.setIcon(/** @type {google.maps.Icon} */({
						//url: place.icon,
						url: 'marker-icon-71x92.png',
						size: new google.maps.Size(71, 92),
						origin: new google.maps.Point(0, 0),
						anchor: new google.maps.Point(17, 34),
						scaledSize: new google.maps.Size(35, 45)
					}));
					marker.setPosition(location);
					marker.setVisible(true);
				}

				drawingOptions = {
					fillColor: '#8BC34A',
					fillOpacity: 0.5,
					strokeColor: '#8BC34A',
					clickable: false,
					editable: true,
				}

				var drawingManager = new google.maps.drawing.DrawingManager({
					//drawingMode: google.maps.drawing.OverlayType.MARKER,
					drawingControl: true,
					drawingControlOptions: {
						position: google.maps.ControlPosition.TOP_CENTER,
						drawingModes: ['circle', 'polygon', 'rectangle']
					},
					circleOptions: drawingOptions,
					polygonOptions: drawingOptions,
					rectangleOptions: drawingOptions
				});
				
				drawingManager.setMap(map);
				
				var geoloccontrol = new klokantech.GeolocationControl(map, 17);
			
				var all_overlays = [];
				google.maps.event.addListener(drawingManager, 'overlaycomplete', function(event) {console.log(event);
					deleteAllShape();
					all_overlays.push(event);
					if (event.type == 'circle') {
						var bounds = event.overlay.getRadius();
						var center = event.overlay.getCenter();console.log(center.toString());
						console.log(event.type,bounds.toString());
					}else if(event.type == 'polygon'){
						var bounds = event.overlay.getPath().getArray();
						console.log(event.type,bounds.toString());
					}else if(event.type == 'rectangle'){
						var bounds = event.overlay.getBounds();
						console.log(event.type,bounds.toString());
						console.log(event.type,'north: '+bounds.getNorthEast().lat());
						console.log(event.type,'south: '+bounds.getSouthWest().lat());
						console.log(event.type,'east: '+bounds.getNorthEast().lng());
						console.log(event.type,'west: '+bounds.getSouthWest().lng());
					}
					/* drawingManager.setOptions({
						drawingControl: false
					});
					$('#redraw').show(); */
				});
		
				function deleteAllShape() {
					for (var i=0; i < all_overlays.length; i++){
						all_overlays[i].overlay.setMap(null);
					}
					all_overlays = [];
				}
		
				/* $('#redraw').off('click').on('click', function(){
						$(this).hide();
						deleteAllShape();
						drawingManager.setOptions({
							drawingControl: true
						});
				}); */
			}
		</script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6jCALkjpw10kNTeQt62MQc5PSC8R5ioA&libraries=places,drawing&callback=initMap"
         async defer></script>
	</body>
</html>