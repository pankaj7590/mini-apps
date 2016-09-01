<?php
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "test";
	
	if(isset($_SESSION['logged_user'])){
		$userId = $_SESSION['logged_user'];
		try {
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// prepare sql and bind parameters
			$stmt = $conn->prepare("SELECT * FROM activity_log");

			$stmt->execute();

			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
			$users = $stmt->fetchAll();
			//print_r($user);exit;
			if($user){
				$_SESSION['logged_user'] = $user['ID'];
				if(isset($_GET['from'])){
					header('Location:'.$_GET['from']);
					exit;
				}else{
					header('Location:admin.php');
					exit;
				}
			}else{
				$_SESSION['auth_error'] = 'Invalid Username or Password';
				header('Location:login.php');
				exit;
			}
		}catch(PDOException $e){
			echo "Error: " . $e->getMessage();
		}
		$conn = null;
	}else{
		header('Location:login.php?from=admin.php');
		exit;
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Admin</title>
	</head>
	<body>
		<form action="search.php" method="get">
			Search : <input type="text" name="txtSearch"/><input type="submit" value="Search" name="submit"/>
		</form>
		Hello, this is admin page.
		<a href="doLogout.php?from=<script>alert(123)</script>">Logout with alert</a>
		<a href="logout.php">Logout</a>
	</body>
</html>