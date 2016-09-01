<?php
	session_start();
	if(isset($_SESSION['logged_user'])){
		header('Location:admin.php');
		exit;
	}else{
		if(isset($_SESSION['auth_error'])){
			echo $_SESSION['auth_error'];
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
	</head>
	<body>
		<form action="search.php" method="get">
			Search : <input type="text" name="txtSearch"/><input type="submit" value="Search" name="submit"/>
		</form>
		<form action="auth.php" method="post">
			Username : <input type="text" name="txtUsername"/><br/>
			Password : <input type="password" name="txtPassword"/><br/>
			<input type="submit" value="Login" name="submit"/>
		</form>
		Hello, this is login page.
		<a href="login.php?from=<script>alert(123)</script>">Login with alert</a>
		<a href="login.php">Login</a>
	</body>
</html>