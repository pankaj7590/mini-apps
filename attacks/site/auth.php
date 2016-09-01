<?php 
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "test";

	if(isset($_POST['txtUsername']) && isset($_POST['txtPassword'])){
		$txtUsername = $_POST['txtUsername'];
		$txtPassword = $_POST['txtPassword'];
		try {
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// prepare sql and bind parameters
			$stmt = $conn->prepare("SELECT * FROM user WHERE user_login = :user_login AND user_pass = :user_pass");
			$stmt->bindParam(':user_login', $txtUsername);
			$stmt->bindParam(':user_pass', md5($txtPassword));

			$stmt->execute();

			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
			$user = $stmt->fetch();
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
		$_SESSION['auth_error'] = 'Invalid Username or Password';
		header('Location:login.php');
		exit;
	}
?>