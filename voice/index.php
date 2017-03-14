<!DOCTYPE HTML>
<html>
	<head>
		<title>Javascript Speech Recognition Library</title>
		<script src="//cdnjs.cloudflare.com/ajax/libs/annyang/2.6.0/annyang.min.js"></script>
		<script>
		if (annyang) {
		  // Let's define a command.
		  var commands = {
			'hello': function() { alert('Hello world!'); }
		  };

		  // Add our commands to annyang
		  annyang.addCommands(commands);

		  annyang.setLanguage('en-IN');
		  
		  // Start listening.
		  annyang.start();
		  
		  annyang.addCallback('result', function(phrases) {
			  console.log("I think the user said: ", phrases[0]);
			  console.log("But then again, it could be any of the following: ", phrases);
			});
		}
		</script>
	</head>
	<body>
		Say "hello" to display alert.
	</body>
</html>