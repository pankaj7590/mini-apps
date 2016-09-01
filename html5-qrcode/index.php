<!DOCTYPE html>
<html>
	<head>
		<title>
			HTML5 QR CODE SCANNER
		</title>
		<script src="../js/jquery.min.js"></script>
		<script src="lib/jsqrcode-combined.min.js"></script>
		<script src="lib/html5-qrcode.min.js"></script>
	</head>
	<body>
		<div id="reader" style="width:300px;height:250px"></div>
		<input id="file" type="file" accept="image/*" capture=camera/>
		<script>
			$("#file").on("change",function(){
				console.log($(this).val());
			});
			$('#reader').html5_qrcode(function(data){
				 // do something when code is read
				 console.log(data);
			},
			function(error){
				//show read errors
				console.log('error',error);				
			}, function(videoError){
				//the video stream could be opened
				console.log('video error',videoError);
			});
		</script>
	</body>
</html>