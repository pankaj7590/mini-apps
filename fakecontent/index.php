<!DOCTYPE html>
<html>
	<head>
		<title>
			Fake Content To Avoid Content Copy-Pasting
		</title>
		<style>
			body{
				overflow:hidden;
			}
			.fake-content {
				position: absolute;
				z-index: 99999;
				color: rgba(255, 255, 255, 0);
				background-color: rgba(255, 255, 255, 0);
			}
		</style>
	</head>
	<body>
		<div class="fake-content">This is fake content.</div>
		This is original content.
	</body>
</html>