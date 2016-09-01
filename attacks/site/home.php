<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
	</head>
	<body>
		<form action="search.php" method="get">
			Search : <input type="text" name="txtSearch"/><input type="submit" value="Search" name="submit"/>
		</form>
		Hello, this is home page.
		<a href="login.php?from=<script>alert(123)</script>">Login with alert</a>
		<a href="login.php">Login</a>
	</body>
</html>