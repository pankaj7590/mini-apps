<!DOCTYPE html>
<html>
	<head>
		<style type="text/css">
			/* General CSS Setup */
			body{
			  	background-color: lightblue;
			  	font-family: "Ubuntu-Italic", "Lucida Sans", helvetica, sans;
			}
			/* CSS talk bubble */
			.talk-bubble {
				top: 5%;
			  	left: 30%;
				border: 5px solid #F48124;
				margin: 40px;
			  	display: none;
			  	position: absolute;
				width: 200px;
				height: auto;
				background-color: lightyellow;
			}

			.talk-bubble.two {
				border: 5px solid #EB216A;
			  	top: 4%;
			  	left: 25%;
			}
			.tri-right.btm-right:after{
				content: ' ';
				position: absolute;
				width: 0;
				height: 0;
			  	left: auto;
				right: -5px;
  				bottom: -29px;
				border: 12px solid;
				border-color: #F48124 #F48124 transparent transparent;
			}
			.tri-right.two.btm-right:after{
				border-color: #EB216A #EB216A transparent transparent;
			}
			.talktext{
			  	padding: 1em;
				text-align: left;
			  	line-height: 1.5em;
				background-color: #F7F7F7;
			}
			.talktext p{
			  	/* remove webkit p margins */
			  	-webkit-margin-before: 0em;
			  	-webkit-margin-after: 0em;
			}
			#e-paper-helper1 span,#e-paper-helper2 span{
				content: 'X';
				position: absolute;
				width: 30px;
				height: 30px;
				left: auto;
				right: -20px;
				top: -20px;
				border: 3px solid;
				border-radius: 20px;
				background-color: #fff;
				border-color: #C8C6C6;
				cursor:pointer;
			}
			#e-paper-helper1 span strong,#e-paper-helper2 span strong{
				margin-left: 8px;
				font-size: 25px;
			}
		</style>
		<script src="jquery.min.js" type="text/javascript"></script>
		<script type="text/javascript">
		$('document').ready(function(){
			function setCookie(cname, cvalue, exdays) {
			    var d = new Date();
			    d.setTime(d.getTime() + (exdays*24*60*60*1000));
			    var expires = "expires="+d.toUTCString();
			    document.cookie = cname + "=" + cvalue + "; " + expires;
			}
			function getCookie(cname) {
			    var name = cname + "=";
			    var ca = document.cookie.split(';');
			    for(var i=0; i<ca.length; i++) {
				var c = ca[i];
				while (c.charAt(0)==' ') c = c.substring(1);
				if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
			    }
			    return "";
			}

			$("#e-paper-helper1").hide();//hide popup
			$("#e-paper-helper2").hide();//hide popup

			//if(getCookie('e-paper-visited')==''){
				setTimeout(function () {
			//		setCookie('e-paper-visited','yes',365);
				    	$("#e-paper-helper1").fadeIn()
				}, 2000);
			//}
	
			$("#e-paper-helper1 span").on('click',function(){
				$("#e-paper-helper1").fadeOut();//hide popup
				$("#e-paper-helper2").fadeIn();//hide popup
			});
			$("#e-paper-helper2 span").on('click',function(){
				$("#e-paper-helper2").fadeOut();//hide popup
			});
		});
		</script>
	</head>
	<body>
		<div id="e-paper-helper1" class="talk-bubble tri-right btm-right">
		  	<div class="talktext">
		    		<span><strong>x</strong></span>
		    		<p>Hold and drag the image to read like newspaper.</p>
		  	</div>
		</div>
		<div id="e-paper-helper2" class="talk-bubble two tri-right btm-right">
		  	<div class="talktext">
		    		<span><strong>x</strong></span>
		    		<p>Double click on the image to zoom in. Click again to zoom out.</p>
		  	</div>
		</div>
	</body>
</html>
