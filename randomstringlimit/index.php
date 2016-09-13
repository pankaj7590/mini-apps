<?php
	$length = 10;
	$rstring = "";
	$rstringArr = [];
	$rstringCount = 1;
	//if(isset($_POST["generate"])){
		if(isset($_POST["length"])){
			$length = $_POST["length"];
		}
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()_+-=';
		while($rstringCount <=1){
			$rstring = '';
			for ($i = 0; $i < $length; $i++) {
				$rstring .= $characters[rand(0, strlen($characters)-1)];//echo "<br>";
			}
			if(isset($rstringArr[$rstring])){
				$rstringCount++;
				$rstringArr[$rstring] = $rstringCount;
			}else{
				$rstringArr[$rstring] = $rstringCount;
			}
		}
	//}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			Random String Generator Limit Tester
		</title>
	</head>
	<body>
		<form method="post">
			Length : <input type="number" name="length" value="<?php echo $length?$length:'255';?>"/><input type="submit" value="Generate" name="generate"/><br/>
			<?php echo count($rstringArr);?><br/>
			<?php foreach($rstringArr as $k=>$v){?>
			<?php echo $k." : ".$v;?><br/>
			<?php }?>
		</form>
	</body>
</html>