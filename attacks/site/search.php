<?php 
	session_start();
	if(isset($_GET['submit'])){
		if(isset($_GET['txtSearch'])){
			//echo $_GET['txtSearch'];
			$searchTerm = $_GET['txtSearch'];
		}else{
			$searchTerm = '';
		}
		$searchResult = "No match found";
	}else{
		$searchTerm = '';
		$searchResult = "No match found";
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Search Results</title>
	</head>
	<body>
		<form action="search.php" method="get">
			Search : <input type="text" name="txtSearch"/><input type="submit" value="Search" name="submit"/>
		</form>
		Searched for : <?= $searchTerm;?><br/>
		<?= $searchResult;?>
	</body>
</html>