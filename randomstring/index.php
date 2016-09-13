<?php
	$length = 255;
	$rstring = "";
	//if(isset($_POST["generate"])){
		if(isset($_POST["length"])){
			$length = $_POST["length"];
		}
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_+-=';
		$rstring = '';
		for ($i = 0; $i < $length; $i++) {
			$rstring .= $characters[rand(0, strlen($characters)-1)];//echo "<br>";
		}
	//}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Random String Generator
		</title>
	</head>
	<body>
		<form method="post">
			Length : <input type="number" name="length" value="<?php echo $length?$length:'255';?>"/><input type="submit" value="Generate" name="generate"/><br/>
			<?php echo $rstring;?>
		</form>
	</body>
</html>