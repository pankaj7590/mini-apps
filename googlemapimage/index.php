<!DOCTYPE html>
<html>
	<head>
		<title>Google Map Image</title>
		<link href="../css/bootstrap.min.css" rel="stylesheet"></link>
		<style type="text/css">
			body{
				padding:20px;
			}
			a,a:hover{
				text-decoration:none;
			}
			.clear{
				clear:both;
			}
			img{
				border-radius:5px;
			}
		</style>
		<script src="../js/jquery.min.js" type="text/javascript"></script>
		<script type="text/javascript">
			$('document').ready(function(){
				$('form').on('submit',function(e){
					e.preventDefault();
					var url=$(this).attr('action');
					var address=$('#address').val();
					address=address.replace(' ','+');
					var zoom=$('#zoom').val();
					var height=$('#height').val();
					var width=$('#width').val();
					var mtype=$('#m-type').val();
					var mcolor=$('#m-color').val();
					mcolor=mcolor.replace('#','');
					var mlabel=$('#m-label').val();
					
					var img_url=url+'?center='+address+'&zoom='+zoom+'&size='+height+'x'+width+'&maptype='+mtype;
					img_url=img_url+'&markers=color:0x'+mcolor+'%7Clabel:'+mlabel+'%7C'+address;
					
					console.log(img_url);
					
					$('img').attr('src',img_url);
					$('a').attr('href',img_url);
				});
			});
		</script>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-4">
					<form action="https://maps.googleapis.com/maps/api/staticmap">
						<div class="form-group">
							<label for="address">Address:</label>
							<input type="text" id="address" class="form-control"/>
						</div>
						<div class="form-group">
							<label for="zoom">Zoom:</label>
							<input type="number" min="1" value="16" id="zoom" class="form-control"/>
						</div>
						<div class="form-group">
							<label for="height">Height:</label>
							<input type="number" step="10" max="640" value="640" id="height" class="form-control"/>
						</div>
						<div class="form-group">
							<label for="width">Width:</label>
							<input type="number" step="10" max="640" value="360" id="width" class="form-control"/>
						</div>
						<div class="form-group">
							<label for="m-type">Map Type:</label>
							<select class="form-control" id="m-type">
								<option value="roadmap">Road Map</option>
								<option value="satellite">Satellite</option>
								<option value="terrain">Terrain</option>
								<option value="hybrid">Hybrid</option>
							</select>
						</div>
						<div class="form-group">
							<label for="m-color">Marker Color:</label>
							<input type="color" id="m-color" class="form-control"/>
						</div>
						<div class="form-group">
							<label for="m-label">Marker Label:</label>
							<input type="text" id="m-label" class="form-control"/>
						</div>
						<div class="form-group">
							<input type="submit" value="Get Image" class="btn-primary form-control"/>
						</div>
						<div class="form-group">
							<a href="earth.jpg" download><input type="button" value="Download" class="btn-success form-control"/></a>
						</div>
					</form>
				</div>
				<div class="col-sm-8">
					<div class="col-sm-12">
						<img src="earth.jpg" width="100%"/>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>