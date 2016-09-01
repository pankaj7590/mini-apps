<?php 
if(isset($_POST['totimestamp'])){
	if(isset($_POST['date'])){
		$d=$_POST['date'];
		$timestamp=strtotime($_POST['date']);
	}
}
 
if(isset($_POST['todate'])){
	if(isset($_POST['timestamp'])){
		$t=$_POST['timestamp'];
		$date=date('d-m-Y h:i:s',$_POST['timestamp']);
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Timestamp-Date
		</title>
	</head>
	<body>
		<form method="POST">
			<input type="date" name="date" required/>
			<input type="text" value="<?php echo isset($timestamp)?$timestamp:'';?>" disabled>
			<input name="totimestamp" type="submit" value="Convert to timestamp"/>
		</form>
		<form method="POST">
			<input type="text" name="timestamp" required/>
			<input type="text" value="<?php echo isset($date)?$date:'';?>" disabled>
			<input name="todate" type="submit" value="Convert to Date"/>
		</form>
	</body>
</html>