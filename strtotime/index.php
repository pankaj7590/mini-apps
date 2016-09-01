<!DOCTYPE html>
<html>
	<head>
		<title>
			Date String To Time
		</title>
	</head>
	<body>
		<?php
		if(isset($_POST['submit'])){
			$date = isset($_POST['date'])?$_POST['date']:'2016-03-16 16:46:42';
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
			Date : <input type="text" name="date"/><input type="submit" name="submit" value="Get Timestamp"/>
		</form>
		Timestamp to date : <br>
		<form method="post">
			Timestamp : <input type="text" name="stamp"/><input type="submit" name="get" value="Get Date"/>
		</form>
	</body>
</html>