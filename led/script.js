$(document).ready(function(){
	$("#string").off('keyup').on('keyup', function(){
		$('.scroll').find('i').removeClass('active');
		var string = $(this).val();//123
		var arr = string.split('');//[1 2 3]
		$.each(arr, function(chark, charv){//v is char array of a number for eg : 1
			if(charArray[charv]){
				$.each(charArray[charv], function(rowk, rowv){//value is a array row of the number for eg : led representation of 1
					$.each(rowv, function(ledk, ledv){// numv is each led bulb for eg : first row of the leds of number 1
						var ledArr = ledv.split('');
						$.each(ledArr, function(ledArrk, ledArrv){
							if(parseInt(ledArrv)){
								$('.scroll'+chark+' .row'+rowk).find('i:nth-child('+(ledArrk+1)+')').addClass('active');
							}
						})
					});
				});
			}else{
				console.log("Character encoding not present.");
			}
		})
	});
});