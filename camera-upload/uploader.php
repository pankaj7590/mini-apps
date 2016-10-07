<?php
if(isset($_POST['verifydocs'])){
	//echo "<pre>";print_r($_POST['image']);exit;
	foreach($_POST['verifydocs'] as $k=>$v){
		//Get the base-64 string from data
		$filteredData=substr($v, strpos($v, ",")+1);
	 
		//Decode the string
		$unencodedData=base64_decode($filteredData);
		file_put_contents('uploads/sample'.rand().time().'.png', $unencodedData);
	}
	header('location:index.php');
}
?>