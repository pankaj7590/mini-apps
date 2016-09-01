<?php
if(isset($_POST['hash'])){
	for($i=0;$i<=9999;$i++){
		if($i<1000){
			$i = str_pad($i, 4, '0', STR_PAD_LEFT);
		}
		if(md5($i) == $_POST['hash']){
			echo "<br/>Hash : ".$_POST['hash'];
			echo "<br/>Hash to Number : ".$i;break;
		}
	}
}
if(isset($_POST['num']) && $_POST['num']!=""){
	echo "<br/>Number : ".$_POST['num'];
	echo "<br/>Number to Hash : ".md5($_POST['num']);
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Get 4 Digit Number From MD5 Hash
		</title>
	</head>
	<body>
		<form method="post">
			<input type="text" name="hash" placeholder="Hash">
			<input type="text" name="num" placeholder="Number"><input type="submit" value="Submit"/>
		</form>
	</body>
</html>