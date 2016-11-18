<!DOCTYPE html>
<html>
	<head>
		<title>Get bounds from zipcode</title>
		<script src="../js/jquery.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#submit').click(function(){
					var zip = $('#zipcode').val();
					if(zip){
						$.ajax({
							type: 'get',
							url: 'https://maps.googleapis.com/maps/api/geocode/json',
							data: {address: zip},
							success: function(data){
								var output = "";
								console.log(data);
									var results = data.results;
									$.each(results, function(resultk,resultv){
										var geometry = resultv.geometry;
										output += resultk + ":" + JSON.stringify(geometry.bounds) + ", ";
									});
								$('#bounds').html("<code>" + output + "</code>");
							},
							error: function(error){
								console.log(error);
							}
						});
					}
				});
			});
		</script>
	</head>
	<body>
		<input id="zipcode"><input type="submit" value="Get Bounds" id="submit">
		<div id="bounds"></div>
	</body>
</html>