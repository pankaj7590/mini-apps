<?php
const PASSPHRASE = 'MySuperSecretPassword';
function encrypt_file($source,$destination,$passphrase,$stream=NULL) {
	// $source can be a local file...
	if($stream) {
		$contents = $source;
	// OR $source can be a stream if the third argument ($stream flag) exists.
	}else{
		$handle = fopen($source, "rb");
		$contents = fread($handle, filesize($source));
		fclose($handle);
	}
 
	$iv = substr(md5("\x1B\x3C\x58".$passphrase, true), 0, 8);
	$key = substr(md5("\x2D\xFC\xD8".$passphrase, true) . md5("\x2D\xFC\xD9".$passphrase, true), 0, 24);
	$opts = array('iv'=>$iv, 'key'=>$key);
	$fp = fopen($destination, 'wb') or die("Could not open file for writing.");
	stream_filter_append($fp, 'mcrypt.tripledes', STREAM_FILTER_WRITE, $opts);
	fwrite($fp, $contents) or die("Could not write to file.");
	fclose($fp);
 
}
function decrypt_file($file,$passphrase) {
 
	$iv = substr(md5("\x1B\x3C\x58".$passphrase, true), 0, 8);
	$key = substr(md5("\x2D\xFC\xD8".$passphrase, true) .
	md5("\x2D\xFC\xD9".$passphrase, true), 0, 24);
	$opts = array('iv'=>$iv, 'key'=>$key);
	$fp = fopen($file, 'rb');
	stream_filter_append($fp, 'mdecrypt.tripledes', STREAM_FILTER_READ, $opts);
 
	return $fp;
}

if($_FILES){
	// echo "<pre>";print_r($_FILES['file']);exit;
	if(isset($_FILES['file']) && !$_FILES['file']['error']){
		$file = $_FILES['file'];
		$filetype = $file['type'];
		$source = $file['tmp_name'];
		$extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
		$filename = time().rand().'.'.$extension;
		$destination = 'uploads/'.$filename;
		encrypt_file($source,$destination,PASSPHRASE);
	}
}
if(isset($_GET['type']) && isset($_GET['path'])){
	$path = $_GET['path'];
	$type = $_GET['type'];
	$decrypted = decrypt_file($path,PASSPHRASE);
	header('Content-type: '.$type);
	fpassthru($decrypted);
}
// Output to a string for email attachments, etc.
// $decrypted = decrypt_file('/path/to/file','MySuperSecretPassword');
// $contents = stream_get_contents($fp);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Ecrypting And Decrypting Files Using PHP</title>
	</head>
	<body>
		<form method="post" enctype="multipart/form-data">
			<input type="file" name="file"/>
			<input type="submit" value="Upload">
		</form>
		<?php if(isset($destination) && isset($filetype)){?>
			<a href="?path=<?= $destination?>&type=<?= $filetype?>">Download File</a>
		<?php }?>
	</body>
</html>