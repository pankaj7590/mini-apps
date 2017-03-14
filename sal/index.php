<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, width=device-width">
		<title></title>
	</head>
	<body>
		<div class="board">
			<?php for($i=100;$i>=1;$i--){?>
				<div class="box" id="box-<?= $i?>"><?= $i;?></div>
				<?php if($i%10 == 1){?>
					<br/>
				<?php }?>
			<?php }?>
		</div>
	</body>
</html>