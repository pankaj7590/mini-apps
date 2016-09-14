<!DOCTYPE html>
<html>
	<head>
		<title>Slide Effect</title>
		<style>
			.slide{
				margin-bottom:30px;
				width:300px;
				left:-230px;
				position:relative;
				background-color:#cfcfcf;
			}
			.icon{
				float:right;
			}
			.icon2{
				display:none;
			}
		</style>
		<script src="../js/jquery.min.js"></script>
		<script>
			$(document).ready(function(){
				$(".slide").hover(function(){
					$(this).animate({"left":"0"},500);
				},function(){
					$(this).animate({"left":"-230px"},500);
				});
			});
		</script>
	</head>
	<body>
		<div class="slide" id="slide1">
			<span>Slide 1</span>
			<img src="images/icon1.png" class="icon icon1"/>
			<img src="images/icon1-white.png" class="icon icon2"/>
		</div>
		<div class="slide" id="slide2">
			<span>Slide 2</span>
			<img src="images/icon2.png" class="icon icon1"/>
			<img src="images/icon2-white.png" class="icon icon2"/>
		</div>
		<div class="slide" id="slide3">
			<span>Slide 3</span>
			<img src="images/icon3.png" class="icon icon1"/>
			<img src="images/icon3-white.png" class="icon icon2"/>
		</div>
	</body>
</html>