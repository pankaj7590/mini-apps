<?php 
	if(isset($_FILES['image']) && !$_FILES['image']['error'] && isset($_POST['text'])){
		move_uploaded_file($_FILES['image']['tmp_name'],'temp/'.$_FILES['image']['name']);
		$newfile = file_get_contents('temp/'.$_FILES['image']['name']).$_POST['text'];
		echo '<br/>original file length : '.strlen(file_get_contents('temp/'.$_FILES['image']['name']));
		echo '<br/>text length : '.strlen($_POST['text']);
		echo '<br/>new file length : '.strlen($newfile);
		file_put_contents('temp/mod_'.$_FILES['image']['name'],$newfile);
		//header('Content-type:image/jpeg;');
		echo file_get_contents('temp/mod_'.$_FILES['image']['name']);
		echo "<br/><img src='temp/".$_FILES['image']['name']."'/>";
		echo "<img src='temp/mod_".$_FILES['image']['name']."'/>";
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Steganography Example</title>
	</head>
	<body>
		<form method="post" enctype="multipart/form-data">
			Cover Image : <input type="file" name="image"><br/>
			Text : <input type="text" name="text"/><br/>
			<input type="submit" value="Submit"/>		
		</form>
	</body>
</html>