<?php
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Expiry, Authorization");
        header("Access-Control-Allow-Credentials: true");
		
		if(isset($_POST['data'])){
			echo "<pre>";print_r($_POST['data']);exit;
		}else{
			print_r($_POST);
		}
?>