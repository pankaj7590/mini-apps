<!DOCTYPE html>
<html>
<head>
<title>Modal</title>
<link href="style.css" type="text/css" rel="stylesheet"></link>
<script src="jquery.js" type="text/javascript"></script>
<script src="main.js" type="text/javascript"></script>
</head>
<body>
<div id="modal"></div>
<div id="flipbook">
<?php for($i=1;$i<=4;$i++){?>
<img src="modal_sample/img<?php echo $i;?>.jpg" width="100px"/>
<?php }?>
</div>
</body>
</html>
