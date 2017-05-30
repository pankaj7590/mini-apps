<!DOCTYPE html>
<html>
	<head>
		<title>Simple slider</title>
		<script src="../js/jquery.min.js"></script>
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<style>
			body{
				overflow:hidden;
			}
		</style>
	</head>
	<body>
		<div class="hi-slider">
			<div class="prev"><</div>
			<div class="next">></div>
			<div class="container">
				<div class="slide">
					<div class="slide1">slide 1</div>
				</div>
				<div class="slide">
					<div class="slide2">slide 2</div>
				</div>
				<div class="slide">
					<div class="slide3">slide 3</div>
				</div>
				<div class="slide">
					<div class="slide4">slide 4</div>
				</div>
				<div class="slide">
					<div class="slide5">slide 5</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			$(document).ready(function(){
				slideCount = $('.slide').length;
				containerWidth = slideCount*100;
				slideWidth = 100/slideCount;
				$('.container').width(containerWidth+'%');
				$('.container').height(window.innerHeight);
				$('.slide').width(slideWidth+'%');
				$('.slide').height(window.innerHeight);
			});
		</script>
	</body>
</html>