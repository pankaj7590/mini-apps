<?php 
if(isset($_REQUEST['encode'])){
	$p=isset($_REQUEST['plain'])?$_REQUEST['plain']:'sample';
	$cipher=base64_encode($p);
}
if(isset($_REQUEST['decode'])){
	$p=isset($_REQUEST['cipher'])?$_REQUEST['cipher']:'sample';
	$decipher=base64_decode($p);
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Base64
		</title>
	</head>
	<body>
		<form method="post">
			Enter a string : <input type="text" name="plain" required/><br/>
			Hashed : <input type="text" name="cipher" value="<?php echo isset($cipher)?$cipher:'';?>" disabled/><br/>
			<input type="submit" name="encode" value="Hash"/>
		</form>
		<form method="post">
			Enter a hash : <input type="text" name="cipher" required/><br/>
			String : <input type="text" name="plain" value="<?php echo isset($decipher)?$decipher:'';?>" disabled/><br/>
			<input type="submit" name="decode" value="De-Hash"/>
		</form>
	</body>
</html>