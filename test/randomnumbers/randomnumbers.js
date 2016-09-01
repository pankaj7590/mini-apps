$('document').ready(function (){
	generate();
});
function generate(){	
	var numbers=[];
	var j=0;
	while(j!=4){
		var random=Math.floor(Math.random() * 10);
		if(random<=4 && random>=-4 && $.inArray(random,numbers)==-1 && $.inArray(random+0.9,numbers)==-1 && $.inArray(random-0.9,numbers)==-1)
		{
			console.log(j+':'+random);
			numbers[j]=random;
			j++;
		}
	}
	console.log(numbers);
}
