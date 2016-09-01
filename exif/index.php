<?php
	if(count($_FILES)>0 && !$_FILES['image']['error']){
		echo "<pre>";print_r($_FILES['image']);
		echo "<pre>";print_r(exif_read_data($_FILES['image']['tmp_name']));
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			EXIF
		</title>
	</head>
	<body>
		<form method="post" enctype="multipart/form-data">
			Image : <input type="file" name="image"/><input type="submit"/>
		</form>
	</body>
</html>