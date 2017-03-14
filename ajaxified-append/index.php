<!DOCTYPE html>
<html>
	<head>
		<title>Ajaxified Append</title>
		<script src="../js/jquery.min.js"></script>
		<script type="text/javascript">
			var track_load = 0; //total loaded record group(s)
			var loading  = false; //to prevents multipal ajax loads
			var total_groups = <?php echo '6'; ?>; //total record group(s)

			$('#results').load("autoload_process.php", {'group_no':track_load}, function() {track_load++;});        //load first group
				
			$(window).scroll(function() { //detect page scroll
				if($(window).scrollTop() + $(window).height() == $(document).height())  //user scrolled to bottom of the page?
				{
					if(track_load <= total_groups && loading==false) //there's more data to load
					{
						loading = true; //prevent further ajax loading
						$('.animation_image').show(); //show loading image

						//load data from the server using a HTTP POST request
						$.post('new.php',{'group_no': track_load}, function(data){

							$("#results").append(data); //append received data into the element

							//hide loading image
							$('.animation_image').hide(); //hide loading image once data is received

							track_load++; //loaded group increment
							loading = false; 

						}).fail(function(xhr, ajaxOptions, thrownError) { //any errors?

							alert(thrownError); //alert with HTTP error
							$('.animation_image').hide(); //hide loading image
							loading = false;

						});

					}
				}
			});
		</script>
	</head>
	<body>
		<table id="results">
			<?php for($i=0;$i<=6;$i++){?>
				<tr>
					<td>mDaQTccU#Qpz=FW6=S4nfPlrzs3_9lxn2t4aDb=QwD#M8=RivDcfPInTUaUG)OG&a9qzP=gBthTQLn0kgfM+DsR-sY!3a(4rMU1PgSYdS!=KBCQdtVBJU2A7unkuR4(RBi4V9oWUwlLuVHV_)eS8pHM7YS6MM4c(TJARuY7dCKM5sDdK$BoCn=c-G-lU_)Y1q#kE4b!B+!1Lsp=acOnWOl4TRa$TNRX=p+xh7s&PY*X3V2dF@SO*sxpqhbZISpb</td>
				</tr>
			<?php }?>
		</table>
	</body>
</html>