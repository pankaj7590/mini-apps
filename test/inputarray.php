<?php
	if($_POST){
		echo "<pre>";print_r($_POST);exit;
	}
?>
<form method="post">
	<input name="test[custom_attribute][][title]">
	<input name="test[custom_attribute][][subtitle]">
	<input type="submit"/>
</form>