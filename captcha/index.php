<!DOCTYPE html>
<html>
<head>
<title>Create Captcha using PHP,jQuery and AJAX</title>
<link href="style.css" rel="stylesheet" type="text/css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="script.js"></script>
</head>
<body>
<div id="mainform">
<div class="innerdiv">
<!-- Required Div Starts Here -->
<h2>Create Captcha using PHP,jQuery and AJAX</h2>
<form id="myForm" method="post" name="myForm">
<h3>Fill Your Information!</h3>
<table>
<tr>
<td>Username:</td>
<td>
<input id='username1' name='username' type='text'>
</td>
</tr>
<tr>
<td>Email:</td>
<td>
<input id='email1' name='email' type='text'>
</td>
</tr>
<tr>
<td>
</td>
<td id="imgparent">
<div id="imgdiv">
<img id="img" src="captcha.php">
</div>
<img id="reload" src="reload.png" height="28px" width="28px">
</td>
</tr>
<tr>
<td>Enter Image Text:</td>
<td>
<input id="captcha1" name="captcha" type="text">
</td>
</tr>
<tr>
<td><input id="button" type='button' value='Submit'></td>
</tr>
</table>
</form>
</div>
</div>
</body>
</html>