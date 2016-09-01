$('document').ready(function(){
	$('#flipbook img').on('click',function(){
		var page=$(this).attr('src');
		$('#modal').html('<img src="'+page+'"/>').show();
	});
	$('#modal').on('click',function(e){
		if($(e.target).attr('id')=='modal'){
			$(this).html('');
			$(this).hide();
		}
	});
});
