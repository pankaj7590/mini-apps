<link href="../css/bootstrap.min.css" rel="stylesheet"/>
<link href="style.css" rel="stylesheet"/>
<script src="../js/jquery.min.js"></script>
<script src="charled.js"></script>
<script src="script.js"></script>
<?php $chars=13;?>
<?php for($i=0; $i<$chars; $i++){ ?>
	<div class="scroll scroll<?= $i;?>">
		<?php for($j=0; $j<5; $j++){?>
			<div class="row<?= $j;?>">
				<?php for($k=1; $k <= 5; $k++){?>
					<i id="r<?= $j;?>c<?= $k;?>" class="glyphicon glyphicon-cd bulb"></i>
				<?php }?>
					<i class="glyphicon glyphicon-cd bulb"></i>
			</div>
		<?php }?>
	</div>
<?php	} ?>
<div class="clear"></div>
<input id="string" maxlength="<?= $chars?>"/>