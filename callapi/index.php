<!DOCTYPE html>
<html>
	<head>
		<title>Simple API Call</title>
		<script src="../js/jquery.min.js" type="text/javascript"></script>
	</head>
	<body>
		<form action="http://localhost/html/apps/api/index.php" method="post">
			data: <input name="data" class="form-element"/><button id="save">Save</button>
		</form>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#save").on("click",function(){
					event.preventDefault();
					var url = $(this).parent("form").attr("action");console.log("url : "+url);
					var data = $(".form-element").val();console.log("data : "+data);
					var method = $(this).parent("form").attr("method");console.log("method : "+method);
					$.ajax({
						method:method,
						url:url,
						data:{data:data},
						success:function(resp){
							console.log(resp);
						},
						error:function(resp){
							console.log(resp);
						}
					});
				});
			});
		</script>
	</body>
</html>