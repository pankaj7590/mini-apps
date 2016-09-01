<?php
if(isset($_POST['submit'])){
	echo $_POST['comment'];
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>
			No Link Spam Using jQuery
		</title>
		<script src="jquery.min.js"></script>
		<script type="text/javascript">
			$('document').ready(function(){
				$('#comment').keypress(function(event){
					/*-----------------------Lets you enter only characters--------------------------*/
					/*if((event.which==97 && event.which<=122) || (event.which>=65 && event.which<=90)){
					}else{
						return false;
					}*/
					/*-------------------------------------------------------------------------------*/

					/*--------Doesn't allow < or >--------*/
					if(event.which==60 || event.which==62){
						return false;
					}
					/*------------------------------------*/
				});
			});
		</script>
	</head>
	<body>
		<form action="" method="post">
			<div>
				Comment : <textarea id="comment" name="comment"></textarea>
			</div>
			<div>
				<input type="submit" name="submit" value="Comment"/>
			</div>
		</form>
	</body>
</html>
