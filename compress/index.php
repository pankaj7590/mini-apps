<?php
	function reArrayFiles(&$file_post) {
		$file_ary = array();
		$file_count = count($file_post['name']);
		$file_keys = array_keys($file_post);

		for ($i=0; $i<$file_count; $i++) {
			foreach ($file_keys as $key) {
				$file_ary[$i][$key] = $file_post[$key][$i];
			}
		}
		return $file_ary;
	}
	
	$name = ''; $type = ''; $size = ''; $error = '';
	function compress_image($source_url, $destination_url, $quality) {

		$info = getimagesize($source_url);

    		if ($info['mime'] == 'image/jpeg')
        			$image = imagecreatefromjpeg($source_url);

    		elseif ($info['mime'] == 'image/gif')
        			$image = imagecreatefromgif($source_url);

   		elseif ($info['mime'] == 'image/png')
        			$image = imagecreatefrompng($source_url);

    		imagejpeg($image, $destination_url, $quality);
		return $destination_url;
	}

	if ($_POST) {
			$file_arr = reArrayFiles($_FILES["file"]);//echo "<pre>";print_r($file_arr);exit;
			$totalOriginal = 0;
			$totalCompressed = 0;
			foreach($file_arr as $k=>$v){
				if ($v["error"] > 0) {
						$error = $v["error"];
				}
				else if (($v["type"] == "image/gif") || 
				($v["type"] == "image/jpeg") || 
				($v["type"] == "image/png") || 
				($v["type"] == "image/pjpeg")) {

						//$url = "compressed/cmpr_".time()."_".$v["name"];
						$url = "compressed/".$v["name"];
						$quality = isset($_POST["quality"])?$_POST["quality"]:70;

						$filename = compress_image($v["tmp_name"], $url , $quality);
						//$buffer = file_get_contents($url);

						/* Force download dialog... */
						/* header("Content-Type: application/force-download");
						header("Content-Type: application/octet-stream");
						header("Content-Type: application/download");

				/* Don't allow caching... */
						//header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

						/* Set data type, size and filename */
						/*header("Content-Type: application/octet-stream");
						header("Content-Transfer-Encoding: binary");
						header("Content-Length: " . strlen($buffer));
						header("Content-Disposition: attachment; filename=$url"); */

						/* Send our file... */
						//file_put_contents("compressed/cmpr_".$v["name"],$buffer);
						$totalOriginal += $v["size"]/1024;
						$totalCompressed += filesize($url)/1024;
						$originalSize = $v["size"]/1024;
						$compressedSize = filesize($url)/1024;
						$percentageCompression = (($originalSize-$compressedSize)/$originalSize)*100;
						echo "<table border='1'>";
						echo "<tr><td>".$v["name"]." compressed successfully.</td></tr>";
						echo "<tr><td><a href='".$url."' download>".$v["name"]."</a></td></tr>";
						echo "<tr><td>Original Size : ".round($originalSize,2)."Kb</td></tr>";
						echo "<tr><td>Compressed Size : ".round($compressedSize,2)."Kb</td></tr>";
						echo "<tr><td>Compression % : ".round($percentageCompression,2)."%</td></tr>";
						echo "</table><br>";
				}else {
						$error = "Uploaded image should be jpg or gif or png";
				}
			}
			$percentageCompressionPercentage = (($totalOriginal-$totalCompressed)/$totalOriginal)*100;
			echo "<table border='1'>";
			echo "<tr><td>Original Size : ".round($totalOriginal,2)."Kb</td></tr>";
			echo "<tr><td>Compressed Size : ".round($totalCompressed,2)."Kb</td></tr>";
			echo "<tr><td>Compression % : ".round($percentageCompressionPercentage,2)."%</td></tr>";
			echo "</table>";
	}
?>
<html>
   	<head>
   		<title>Php code compress the image</title>
   	</head>
   	<body>
		<div class="message">
           	<?php
           		if($_POST){
               		if ($error) {
          	?>
						<label class="error"><?php echo $error; ?></label>
            <?php
               		}
               	}
            ?>
        </div>
		<fieldset class="well">
           	<legend>Upload Image:</legend>                
			<form action="" name="myform" id="myform" method="post" enctype="multipart/form-data">
				<ul>
		           	<li>
						<label>Upload:</label>
		                <input type="file" name="file[]" id="file" multiple required/>
					</li>
					<li>
						<label>Quality:</label>
			            <input type="number" name="quality" id="quality" min="10" max="100" step="10" value="70" required/>
					</li>
					<li>
						<input type="submit" name="submit" id="submit" class="submit btn-success"/>
					</li>
				</ul>
			</form>
		</fieldset>
	</body>
</html>