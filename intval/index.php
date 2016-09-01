<?php
if(isset($_POST['string'])){
	echo 'Intval : '.intval($_POST['string']);
}
if(isset($_POST['integer'])){
	echo 'Integer : '.(int)$_POST['integer'];
}
?>
<html>
	<body>
		<form method="post">
			Number : <input type="text" name="string"/><input type="submit" value="Intval()" name="submit"/>
		</form>
		<form method="post">
			Number : <input type="text" name="integer"/><input type="submit" value="(int)" name="submit"/>
		</form>
	</body>
</html>