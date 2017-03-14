<!DOCTYPE html>
<html>
	<head>
		<title>Test codes for various website functionalities</title>
		<script src="../js/jquery.min.js"></script>
	</head>
	<body>
		<div class="cart-btns-container">
			<div class="cart-btns" style="display:none">
				<input value="0" class="qty"/><button class="incr">+</button><button class="decr">-</button>
			</div>
			<div class="add-to-cart-btn">
				<button>Add to cart</button>
			</div>
		</div>
		<script type="text/javascript">
			$(document).ready(function(){
				$('.add-to-cart-btn button').click(function(){
					cart_btns = $(this).parents('.cart-btns-container').find('.cart-btns');
					qty_input = $(cart_btns).find('input').val('1');
					$(cart_btns).show();
					$(this).parents('.add-to-cart-btn').hide();
				});
				
				$('.incr').click(function(){
					qty_input = $(this).parents('.cart-btns').find('input');
					current_qty = $(qty_input).val();
					$(qty_input).val(++current_qty);
				});
				
				$('.decr').click(function(){
					qty_input = $(this).parents('.cart-btns').find('input');
					current_qty = $(qty_input).val();
					if(current_qty - 1 == 0){
						$(this).parents('.cart-btns-container').find('.cart-btns').hide();
						$(this).parents('.cart-btns-container').find('.add-to-cart-btn').show();
					}
					$(qty_input).val(--current_qty);
				});
			});
		</script>
	</body>
</html>