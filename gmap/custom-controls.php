<!DOCTYPE html>
<html>
	<head>
		<title>Pseudo Controls</title>
		<style>
			.gmnoprint+div[title="Stop drawing"]{
				display:none;
			}
			.pseudo-btns-container {
				background-color: #24bba1;
			}
			.pseudo-btn:hover, .pseudo-btn.active {
				background-color:#1f9f89;
			}
			.pseudo-btn {
				vertical-align: text-top;
				width: 24.77%;
				margin-top: 4px;
				color: #fff;
				display: inline-block;
				background-color: #27c7ab;
				text-align: center;
				height: 30px;
				padding: 10px 0 5px 0;
				cursor:pointer;
			}
			.pseudo-btn-icon{				
				vertical-align: middle;
				display: inline-block;
			}
		</style>
		<script src="../js/jquery.min.js"></script>
	</head>
	<body>
		<h1>Google Map Pseudo Controls</h1>
			<div class="map-container">
				<div id="googleMap" style="width:100%;height:400px;"></div>
				<div class="pseudo-btns-container">
					<a class="pseudo-btn poly"><span class="pseudo-btn-icon"><img src="buysab-icons/polygonal.png"/></span> <span class="pseudo-btn-text">Polygonal area</span></a>
					<a class="pseudo-btn cir"><span class="pseudo-btn-icon"><img src="buysab-icons/circular.png"/></span> <span class="pseudo-btn-text">Circular area</span></a>
					<a class="pseudo-btn undo"><span class="pseudo-btn-icon"><img src="buysab-icons/undo.png"/></span> <span class="pseudo-btn-text">Undo</span></a>
					<a class="pseudo-btn clr"><span class="pseudo-btn-icon"><img src="buysab-icons/clear.png"/></span> <span class="pseudo-btn-text">Clear</span></a>
				</div>
			</div>
		<script>
			var map;
			var office = {lat: 19.190367, lng: 72.978638};
			var ol = [];
			function myMap() {
				var mapProp= {
					center:office,
					zoom:10,
				};
				map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
				
				var drawingManager = new google.maps.drawing.DrawingManager({
					drawingControlOptions: {
						position: google.maps.ControlPosition.TOP_CENTER,
						drawingModes: ['circle', 'polygon']
					},
					circleOptions: {
						fillColor: '#ceccc5',
						fillOpacity: 0.7,
						strokeWeight: 3,
						strokeColor: '#6b7581',
						clickable: false,
						editable: true,
						zIndex: 1
					},
					polygonOptions: {
						fillColor: '#ceccc5',
						fillOpacity: 0.7,
						strokeWeight: 3,
						strokeColor: '#6b7581',
						clickable: false,
						editable: true,
						zIndex: 1
					}
				});
				drawingManager.setMap(map);

				google.maps.event.addListener(drawingManager, 'overlaycomplete', function(event) {
					$.each(ol, function(k,v){
						v.setMap(null);
					});
					ol.push(event.overlay);
					console.log(ol);
				});
				
				setTimeout(function(){
					$('div[title="Stop drawing"]').parents('.gmnoprint').hide();
				},1000);
			}
		</script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6jCALkjpw10kNTeQt62MQc5PSC8R5ioA&callback=myMap&libraries=drawing"></script>
		<script>
			$(document).ready(function(){
				$('.pseudo-btn').click(function(){
					$('.pseudo-btn').removeClass('active');
					$(this).addClass('active');
					$('div[title="Stop drawing"]').trigger('click');
				});
				$('.pseudo-btn.cir').click(function(){
					$('div[title="Draw a circle"]').trigger('click');
				});
				$('.pseudo-btn.poly').click(function(){
					$('div[title="Draw a shape"]').trigger('click');
				});
				$('.pseudo-btn.undo').click(function(){
					lastOl = ol.pop();
					if(lastOl){
						lastOl.setMap(null);
					}
					console.log(ol);
					newLastOl = ol[ol.length-1];
					if(newLastOl){
						newLastOl.setMap(map);
					}else{
						console.log("no results found.");
					}
				});
				$('.pseudo-btn.clr').click(function(){
					$.each(ol, function(k,v){
						v.setMap(null);
					});
					ol = [];
					console.log(ol);
				});
			});
		</script>
	</body>
</html>