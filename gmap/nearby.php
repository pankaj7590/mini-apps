<!DOCTYPE html>
<html>
	<head>
		<title>Place searches</title>
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
		</style>
		<script src="../js/jquery.min.js"></script>
		<script>
			// This example requires the Places library. Include the libraries=places
			// parameter when you first load the API. For example:
			// <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

			var map;
			var infowindow;

			function initMap() {
				var pyrmont = {lat: 19.192993, lng: 72.98142059999998};

				map = new google.maps.Map(document.getElementById('map'), {
					center: pyrmont,
					zoom: 17
				});

				infowindow = new google.maps.InfoWindow();
				var service = new google.maps.places.PlacesService(map);
				service.nearbySearch({
					location: pyrmont,
					radius: 500,
					type: 'route',
				}, callback);
			}

			function callback(results, status) {console.log(results);
				$.each(results, function(location_key, location_value){
					$.each(location_value.types, function(types_key, types_value){
						if(types_value == 'route' || types_value == 'point_of_interest' || types_value == 'locality' || types_value == 'sublocality' || types_value == 'sublocality_level_1' || types_value == 'sublocality_level_2' || types_value == 'sublocality_level_3' || types_value == 'sublocality_level_4' || types_value == 'sublocality_level_5'){console.log(location_value);
							if (status === google.maps.places.PlacesServiceStatus.OK) {
								//for (var i = 0; i < results.length; i++) {
									createMarker(results[location_key]);
								//}
							}
						}
					})
				})
			}

			function createMarker(place) {
				var placeLoc = place.geometry.location;
				var marker = new google.maps.Marker({
					map: map,
					position: place.geometry.location
				});

				google.maps.event.addListener(marker, 'click', function() {
					infowindow.setContent(place.name);
					infowindow.open(map, this);
				});
			}
		</script>
	</head>
	<body>
		<div id="map"></div>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6jCALkjpw10kNTeQt62MQc5PSC8R5ioA&libraries=places&callback=initMap" async defer></script>
	</body>
</html>