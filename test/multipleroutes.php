<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Directions service</title>
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
#panel {
  position: absolute;
  top: 10px;
  left: 25%;
  z-index: 5;
  background-color: #fff;
  padding: 5px;
  border: 1px solid #999;
  text-align: center;
}

/**
 * Provide the following styles for both ID and class, where ID represents an
 * actual existing "panel" with JS bound to its name, and the class is just
 * non-map content that may already have a different ID with JS bound to its
 * name.
 */

#panel, .panel {
  font-family: 'Roboto','sans-serif';
  line-height: 30px;
  padding-left: 10px;
}

#panel select, #panel input, .panel select, .panel input {
  font-size: 15px;
}

#panel select, .panel select {
  width: 100%;
}

#panel i, .panel i {
  font-size: 12px;
}

    </style>
  </head>
  <body>
    <div id="panel">
    <b>Start: </b>
<input id="source-input" class="controls" type="text"
        placeholder="Enter a location">
    <!--<select id="start" onchange="calcRoute();">
      <option value="chicago, il">Chicago</option>
      <option value="st louis, mo">St Louis</option>
      <option value="joplin, mo">Joplin, MO</option>
      <option value="oklahoma city, ok">Oklahoma City</option>
      <option value="amarillo, tx">Amarillo</option>
      <option value="gallup, nm">Gallup, NM</option>
      <option value="flagstaff, az">Flagstaff, AZ</option>
      <option value="winona, az">Winona</option>
      <option value="kingman, az">Kingman</option>
      <option value="barstow, ca">Barstow</option>
      <option value="san bernardino, ca">San Bernardino</option>
      <option value="los angeles, ca">Los Angeles</option>
    </select>-->
    <b>End: </b>
<input id="destination-input" class="controls" type="text"
        placeholder="Enter a location">
    <!--<select id="end" onchange="calcRoute();">
      <option value="chicago, il">Chicago</option>
      <option value="st louis, mo">St Louis</option>
      <option value="joplin, mo">Joplin, MO</option>
      <option value="oklahoma city, ok">Oklahoma City</option>
      <option value="amarillo, tx">Amarillo</option>
      <option value="gallup, nm">Gallup, NM</option>
      <option value="flagstaff, az">Flagstaff, AZ</option>
      <option value="winona, az">Winona</option>
      <option value="kingman, az">Kingman</option>
      <option value="barstow, ca">Barstow</option>
      <option value="san bernardino, ca">San Bernardino</option>
      <option value="los angeles, ca">Los Angeles</option>
    </select>-->
	<button id="go">Go!</button>
    </div>
    <div id="map"></div>
    <script>
function typecastRoutes(routes){
    routes.forEach(function(route){
        route.bounds = asBounds(route.bounds);
        // I don't think `overview_path` is used but it exists on the
        // response of DirectionsService.route()
        route.overview_path = asPath(route.overview_polyline);

        route.legs.forEach(function(leg){
            leg.start_location = asLatLng(leg.start_location);
            leg.end_location   = asLatLng(leg.end_location);

            leg.steps.forEach(function(step){
                step.start_location = asLatLng(step.start_location);
                step.end_location   = asLatLng(step.end_location);
                step.path = asPath(step.polyline);
            });

        });
    });
}

function initMap() {
  var directionsService = new google.maps.DirectionsService;
  //var directionsDisplay = new google.maps.DirectionsRenderer;
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 7,
    center: {lat: 41.85, lng: -87.65}
  });
  //directionsDisplay.setMap(map);

 var input1 = (document.getElementById('source-input'));
 var input2 = (document.getElementById('destination-input'));

  var autocomplete1 = new google.maps.places.Autocomplete(input1);
  autocomplete1.bindTo('bounds', map);
  var autocomplete2 = new google.maps.places.Autocomplete(input2);
  autocomplete2.bindTo('bounds', map);

  var onChangeHandler = function() {
    calculateAndDisplayRoute(directionsService);//, directionsDisplay);
  };
  document.getElementById('go').addEventListener('click', onChangeHandler);
}

function calculateAndDisplayRoute(directionsService){//, directionsDisplay) {
  directionsService.route({
    origin: document.getElementById('source-input').value,
    destination: document.getElementById('destination-input').value,
    travelMode: google.maps.TravelMode.DRIVING,
    provideRouteAlternatives: true
  }, function(response, status) {
	var directionsDisplay = [];
	for(i=0;i<response.routes.length;i++){
	    directionsDisplay[i] = new google.maps.DirectionsRenderer;
	    directionsDisplay[i].setMap(map);
	    if (status === google.maps.DirectionsStatus.OK) {
	      directionsDisplay[i].setDirections(response);
	      directionsDisplay[i].setRouteIndex(i);
	    } else {
	      window.alert('Directions request failed due to ' + status);
	    }
	}
  });
}

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?signed_in=true&libraries=places&callback=initMap"
        async defer></script>
  </body>
</html>
