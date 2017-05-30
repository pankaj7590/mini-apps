<!DOCTYPE html>
<html>
	<head>
		<title>
			Date String To Time
		</title>
	</head>
	<body>
		<?php
		date_default_timezone_set('Asia/Kolkata');
		if(isset($_POST['submit'])){
			$date = isset($_POST['date'])?$_POST['date']:date('Y-m-d H:i:s');
			echo 'Date : '.$date;
			echo '</br>Timestamp : '.strtotime($date);
		}
		if(isset($_POST['get'])){
			$stamp = isset($_POST['stamp'])?$_POST['stamp']:1458143202;
			echo 'Timestamp : '.$stamp;
			echo '</br>Date : '.date('Y-m-d H:i:s',$stamp);
		}
		?>
		<br>Date to timestamp:<br>
		<form method="post">
			Date : <input type="text" name="date" placeholder="Y-m-d H:i:s"/><input type="submit" name="submit" value="Get Timestamp"/>
		</form>
		Timestamp to date : <br>
		<form method="post">
			Timestamp : <input type="text" name="stamp"/><input type="submit" name="get" value="Get Date"/>
		</form>
	</body>
</html>