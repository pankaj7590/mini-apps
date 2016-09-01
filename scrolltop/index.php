<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
$(document).ready(function(){
	$("p.second").hide();
	$(window).scroll(function() {
		if ($(document).scrollTop() > 50) {
			$("p.first").hide();
			$("p.second").show();
		} else {
			$("p.first").show();
			$("p.second").hide();
		}
	});
});
</script>
<style>
.test {
    background-color: yellow;
}
</style>
</head>
<body style="height:1550px;">

<p style="position:fixed;">Scroll down this page.</p>

<p style="position:fixed;top:100px" class="first">First paragraph.</p>
<p style="position:fixed;top:150px" class="second">Second paragraph.</p>

</body>
</html>
