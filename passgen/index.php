<?php 
	$alphabets = false;$numbers = false;$symbols = false;$count = 8;
if(isset($_POST["submit"])){
	$alphabetsArray =  ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z"];
	$numbersArray = ["0","1","2","3","4","5","6","7","8","9"];
	$symbolsArray = ["[","\\","]","^","_","`",":",";","<","=",">","?","@","!",'"',"#","$","%","&","'","(",")","*","+",",","-",".","/","{","|","}","~"];

	if(isset($_POST['alphabets'])){
		$alphabets = true;
	}
	if(isset($_POST['numbers'])){
		$numbers = true;
	}
	if(isset($_POST['symbols'])){
		$symbols = true;
	}
	if(isset($_POST['count'])){
		$count = $_POST['count'];
	}
	$pass = "";
	$char = "";
	for($i = 0;$i < $count; $i++){
		$type = rand(0,2);//to determine alphabet or number or symbol	0 : alphabet, 1 : number, 2 : symbol
		if($alphabets && $type == 0){
			$char = $alphabetsArray[rand(0,count($alphabetsArray) - 1)];
		}
		if($numbers && $type == 1){
			$char = $numbersArray[rand(0,count($numbersArray) - 1)];
		}
		if($symbols && $type == 2){
			$char = $symbolsArray[rand(0,count($symbolsArray) - 1)];
		}
		$pass .= $char;
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Password Generator</title>
	</head>
	<body>
		<h1>Password Generator</h1>
		<form method="post">
			Count : <input type="number" name="count" min="8" value="<?php echo isset($_POST['count'])?$_POST['count']:$count?>"/><br/>
			Include :
			<input type="checkbox" name="alphabets" <?php echo isset($_POST['alphabets'])?"checked":""?>/> Alphabets
			<input type="checkbox" name="numbers" <?php echo isset($_POST['numbers'])?"checked":""?>/> Numbers
			<input type="checkbox" name="symbols" <?php echo isset($_POST['symbols'])?"checked":""?>/> Symbols<br>
			<input type="submit" name="submit" value="Generate"/>
		</form>
		<?php if(isset($pass)){?>
		Generated Password : <?php echo $pass;?>
		<?php }?>
	</body>
</html>