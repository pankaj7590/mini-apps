<?php 
if(isset($_POST['submit']) && (isset($_POST['plain']) || isset($_POST['encoded']))){
	if(isset($_POST['plain'])){
		$encodedurl = urlencode($_POST['plain']);
	}
	if(isset($_POST['encoded'])){
		$plainurl = urldecode($_POST['encoded']);
	}
}
?>
<html>
	<head>
		<title>Url Encode</title>
	</head>
	<body>
		<form method="post">
			Enter plain url : <input type="text" name="plain"/><br/>
			Encoded url : <?php echo isset($encodedurl)?$encodedurl.', Length : '.strlen($encodedurl):'';?><br/>
			Enter encoded url : <input type="text" name="encoded"/><br/>
			Plain url : <?php echo isset($plainurl)?$plainurl.', Length : '.strlen($plainurl):'';?><br/>
			<input type="submit" name="submit" value="Submit"/><br/>
		</form>
	</body>
</html>
<?php echo "<br/>Pranit User ID OLA : ".urlencode('z6fnF62h/Y7fVnfWIYDFUe2K2RL5gEIOpXusTbCaVca2QMo4L2IpFaRxrAQ0\n+iVkpMWSoNA4M3f0qZsJueTHnw==\n').', Length: '.strlen(urlencode('z6fnF62h/Y7fVnfWIYDFUe2K2RL5gEIOpXusTbCaVca2QMo4L2IpFaRxrAQ0\n+iVkpMWSoNA4M3f0qZsJueTHnw==\n'));?>
<?php echo "<br/>Pankaj User ID OLA : ".urlencode('YPnMd3QAszIzkvxhOn38KIEDYCIq9gDv1LTqdFRrn5lyoPjes4RxORHxV+He\n9KKs18tJjJ6VgdIsFE/NGS7JMA==\n').', Length: '.strlen(urlencode('YPnMd3QAszIzkvxhOn38KIEDYCIq9gDv1LTqdFRrn5lyoPjes4RxORHxV+He\n9KKs18tJjJ6VgdIsFE/NGS7JMA==\n'));?>
<?php echo "<br/>Aditya User ID OLA : ".urlencode('VrsnyegMgmA2kep36qnpf0YS5AMCrLsPEFJoeMiCgjYdAaZNUbRMmimbKeMO\nCRRwJ8QnfDFr6Kf8KFTAhROdQg==\n').', Length: '.strlen(urlencode('VrsnyegMgmA2kep36qnpf0YS5AMCrLsPEFJoeMiCgjYdAaZNUbRMmimbKeMO\nCRRwJ8QnfDFr6Kf8KFTAhROdQg==\n'));?>
