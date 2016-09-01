<!DOCTYPE html>
<html>
	<head>
		<title>Form Builder</title>
		<style>
			.input-field-container{
				border:1px solid #000;padding:5px;margin:5px 0;
			}
		</style>
		<script type="text/javascript" src="../js/jquery.min.js"></script>
		<script type="text/javascript" src="script.js"></script>
	</head>
	<body>
		<select name="type" id="question-type">
			<option value="">Select Type</option>
		</select>
		<button id="add-question">Add Question</button>
		<div id="options-container"></div>
		<div id="preview-container"></div>
	</body>
</html>