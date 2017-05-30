<!DOCTYPE html>
<html>
	<head>
		<title>Initials</title>
	</head>
	<body>
		<form method="post">
			Name: <input name="name"><input type="submit" value="Get" name="get">
		</form>
		<?php
			$initials = '';
			if(isset($_POST['get']) && isset($_POST['name'])){
				$name = $_POST['name'];
				$tempArr = explode(' ', $name);
				$initials .= isset($tempArr[0])?substr($tempArr[0],0,1):'';
				$initials .= isset($tempArr[1])?substr($tempArr[1],0,1):'';
			}
			echo strtoupper($initials);
		?>
	</body>
</html>