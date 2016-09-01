<?php 
if(isset($_REQUEST['submit'])){
	$p=isset($_REQUEST['plain'])?$_REQUEST['plain']:'sample';
	$cipher=md5($p);
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			MD5
		</title>
	</head>
	<body>
		<form method="post">
			Enter a string : <input type="text" name="plain" required/><br/>
			Hashed : <input type="text" name="cipher" value="<?php echo isset($cipher)?$cipher:'';?>" disabled/><br/>
			<input type="submit" name="submit" value="Hash"/>
		</form>
	</body>
</html>