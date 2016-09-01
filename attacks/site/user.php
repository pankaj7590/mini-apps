<?php
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "test";
	
	if(isset($_SESSION['logged_user'])){
		
	}else{
		header('Location:login.php?from=user.php');
		exit;
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>User</title>
	</head>
	<body>
		<form action="search.php" method="get">
			Search : <input type="text" name="txtSearch"/><input type="submit" value="Search" name="submit"/>
		</form>
		Hello, this is user page.
		User Activities : 
		There are no records to display.
	</body>
</html>