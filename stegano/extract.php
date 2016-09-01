<?php 
	if(isset($_FILES['image']) && !$_FILES['image']['error'] && isset($_POST['textlength'])){
		$filelength = strlen(file_get_contents($_FILES['image']['tmp_name']));
		$start = strlen(file_get_contents($_FILES['image']['tmp_name']))-$_POST['textlength'];
		$payload = substr(file_get_contents($_FILES['image']['tmp_name']),$start,$filelength);
		echo '<br/>file length : '.$filelength;
		echo '<br/>start : '.$start;
		echo '<br/>payload : '.$payload;
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Steganography Example - Extract</title>
	</head>
	<body>
		<form method="post" enctype="multipart/form-data">
			Modified Image : <input type="file" name="image"><br/>
			Text Length : <input type="text" name="textlength"/><br/>
			<input type="submit" value="Submit"/>		
		</form>
	</body>
</html>