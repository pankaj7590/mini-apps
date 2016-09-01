<!DOCTYPE html>
<html>
	<head>
		<title>
			Google Map Animated Zoom Effect
		</title>
	    	<meta name="viewport" content="initial-scale=1.0">
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
	</head>
	<body>
		<div id="map"></div>
		<script type="text/javascript">
			function initMap() {
				  var map = new google.maps.Map(document.getElementById('map'), {
				    center: {lat: -34.397, lng: 150.644},
				    //zoom: 6,
					animatedZoom : true
				  });
				  var infoWindow = new google.maps.InfoWindow({map: map});

				  // Try HTML5 geolocation.
				  if (navigator.geolocation) {
				    navigator.geolocation.getCurrentPosition(function(position) {
				      var pos = {
					lat: position.coords.latitude,
					lng: position.coords.longitude
				      };

				      infoWindow.setPosition(pos);
				      infoWindow.setContent('Location found.');
				      map.setCenter(pos);
				    }, function() {
				      handleLocationError(true, infoWindow, map.getCenter());
				    });
				  } else {
				    // Browser doesn't support Geolocation
				    handleLocationError(false, infoWindow, map.getCenter());
				  }

				// example marker:
				marker = new google.maps.Marker({
						    map: map, 
						    position: new google.maps.LatLng(-20.3,30.3)
						});


				// add the double-click event listener
				google.maps.event.addListener(marker, 'dblclick', function(event){
				    map = marker.getMap();

				    map.setCenter(overlay.getPosition()); // set map center to marker position
				    smoothZoom(map, 12, map.getZoom()); // call smoothZoom, parameters map, final zoomLevel, and starting zoom level
				})


				// the smooth zoom function
				function smoothZoom (map, max, cnt) {
				    if (cnt >= max) {
					    return;
					}
				    else {
					z = google.maps.event.addListener(map, 'zoom_changed', function(event){
					    google.maps.event.removeListener(z);
					    smoothZoom(map, max, cnt + 1);
					});
					setTimeout(function(){map.setZoom(cnt)}, 80); // 80ms is what I found to work well on my system -- it might not work well on all systems
				    }
				} 
			}

			/*function handleLocationError(browserHasGeolocation, infoWindow, pos) {
			  infoWindow.setPosition(pos);
			  infoWindow.setContent(browserHasGeolocation ?
						'Error: The Geolocation service failed.' :
						'Error: Your browser doesn\'t support geolocation.');
			}*/
		</script>
		<!--<script src="pan.js"r></script>-->
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCDViuRtXmTH938g5EKZ1wHUUiLHv-g5HY&callback=initMap" async defer></script>
	</body>
</html>
