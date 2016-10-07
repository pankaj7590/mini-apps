<!DOCTYPE html>
<html>
	<head>
		<title>File Upload Capture Camera</title>
		<link href="../css/bootstrap.min.css" rel='stylesheet' type='text/css'/>
		<script src='../js/jquery.min.js'></script>
		<script src='../js/bootstrap.min.js'></script>
		<script>
			$(document).ready(function(event){
				$('#myModal').on('shown.bs.modal', function (event) {
					$('#retake').hide();
					$('#video').show();
					$('#canvas').hide();
					$('#snap').show();
					var button = $(event.relatedTarget) // Button that triggered the modal
					var recipient = button.data('doc-type') // Extract info from data-* attributes
					image = $('#'+recipient);
					$('#myInput').focus();
					init();
				});

				var canvas = document.getElementById('canvas');
				var context = canvas.getContext('2d');
				var video = document.getElementById('video');
				var image;
				// Trigger photo take
				$("#snap").off("click").on("click", function() {
					context.drawImage(video, 0, 0, 568, 425);
					video.src="";
					localstream.getTracks()[0].stop();
					//console.log("Vid off");
					$(this).hide();
					$('#retake').show();
					$('#video').hide();
					$('#canvas').show();
				});
				
				$('#retake').off('click').on('click', function(){
					$(this).hide();
					$('#video').show();
					$('#canvas').hide();
					$('#snap').show();
					init();
				});
				
				$("#choose").off("click").on("click", function() {
					image.val(canvas.toDataURL("image/png"));
					//$('#myModal').modal().hide();
				});

				// Get access to the camera!
				function init(){
					if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
						// Not adding `{ audio: true }` since we only want video now
						navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
							localstream = stream;
							video.src = window.URL.createObjectURL(stream);
							video.play();
						});
					}else if(navigator.getUserMedia) { // Standard
						navigator.getUserMedia({ video: true }, function(stream) {
							localstream = stream;
							video.src = stream;
							video.play();
						}, errBack);
					} else if(navigator.webkitGetUserMedia) { // WebKit-prefixed
						navigator.webkitGetUserMedia({ video: true }, function(stream){
							localstream = stream;
							video.src = window.webkitURL.createObjectURL(stream);
							video.play();
						}, errBack);
					} else if(navigator.mozGetUserMedia) { // Mozilla-prefixed
						navigator.mozGetUserMedia({ video: true }, function(stream){
							localstream = stream;
							video.src = window.URL.createObjectURL(stream);
							video.play();
						}, errBack);
					}
				}
			});
		</script>
	</head>
	<body>
		<img src="uploads/sample.png"/><br>
		<button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal" data-doc-type="id-proof">
			ID Proof
		</button>
		<button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal" data-doc-type="gumasta-license">
			Gumasta License
		</button>
		<form action="uploader.php" method="post">
			<input type="hidden" name="verifydocs[]" id="id-proof"/>
			<input type="hidden" name="verifydocs[]" id="gumasta-license"/>
			<input type="submit" name="submit" value="Upload" class="btn btn-success"/>
		</form>
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Take Picture</h4>
					</div>
					<div class="modal-body">
						<video id="video" width="568" height="425" autoplay></video>
						<canvas id="canvas" width="568" height="425" style="display:none"></canvas>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary" id="snap">Snap Photo</button>
						<button type="button" class="btn btn-primary" id="retake" style="display:none;">Retake Photo</button>
						<button type="button" class="btn btn-primary" id="choose" data-dismiss="modal">Choose Photo</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
	</body>
</html>