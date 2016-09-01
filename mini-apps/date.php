<?php
if(isset($_POST['submit'])){
	if(isset($_POST['date']) && $_POST['date']!='' && isset($_POST['time']) && $_POST['time']!=''){
		echo "Date : ".$_POST['date']." ".$_POST['time']." & String : ".strtotime($_POST['date'].' '.$_POST['time']);
	}
	if(isset($_POST['string']) && isset($_POST['format']) && $_POST['string']!='' && $_POST['format']!=''){
		echo "<br/>String : ".$_POST['string']." & Format : ".$_POST['format']." & Date : ".date($_POST['format'],$_POST['string']);
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Date Converter
		</title>
	</head>
	<body>
		<form method="post">
			Date : <input type="date" name="date"/><input type="time" name="time"/>
			String : <input type="text" name="string"/>
			Format : <input type="text" name="format"/>
			<input type="submit" name="submit" value="Convert"/>
		</form>
	</body>
</html>
