<?php
if(isset($_POST['encode'])){
	if(isset($_POST['plain'])){
		$plain=$_POST['plain'];
		$c=base64_encode($plain);
	}
}
if(isset($_POST['decode'])){
	if(isset($_POST['cipher'])){
		$cipher=$_POST['cipher'];
		$p=base64_decode($cipher);
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>base64 Encode - Decode</title>
	</head>
	<body>
		<form method="post">
			Encode : <input type="text" name="plain" required/><input type="text" value="<?php echo isset($c)?$c:'';?>" disabled="disabled"/><input type="submit" value="Encode" name="encode"/>
		</form>
		<form method="post">
			Decode : <input type="text" name="cipher" required/><input type="text" value="<?php echo isset($p)?$p:'';?>" disabled="disabled"/><input type="submit" value="Decode" name="decode"/>
		</form>
	</body>
</html>