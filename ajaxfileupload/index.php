<!--From https://abandon.ie/notebook/simple-file-uploads-using-jquery-ajax-->
<script src="../js/jquery.min.js"></script>
<script>
// Variable to store your files
$(document).ready(function(){
	var files;
	// Add events
	$('input[type=file]').on('change', prepareUpload);
	// Grab the files and set them to our variable
	function prepareUpload(event)
	{
		files = event.target.files;
		
		var data = new FormData();
		
		$.each(files, function(key, value){
			data.append(key, value);
		});

		$.ajax({
			url: 'submit.php?files',
			type: 'POST',
			data: data,
			cache: false,
			dataType: 'json',
			processData: false, // Don't process the files
			contentType: false, // Set content type to false as jQuery will tell the server its a query string request
			success: function(data, textStatus, jqXHR)
			{
				if(typeof data.error === 'undefined')
				{
					// Success so call function to process the form
					console.log(data);
					$.each(data.files,function(k,v){
						$("#image-container").append("<img src='"+v+"'>");
					});
				}
				else
				{
					// Handle errors here
					console.log('ERRORS: ' + data.error);
				}
			},
			error: function(jqXHR, textStatus, errorThrown)
			{
				// Handle errors here
				console.log('ERRORS: ' + textStatus);
				// STOP LOADING SPINNER
			}
		});
	}
});
</script>
<body>
	<form method="post">
		<h1>Ajax File Upload</h1>
		<div id="image-container"></div>
		<input type="file" name="file" id="file" accept="image/*" multiple/>
	</form>
</body>