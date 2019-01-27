<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<style type="text/css">
		#div:before {
			content: 'vav';
		}
		#div:after {
			content: 'uasdfghjkl';
			display: none;
		}
		button:hover ,#div:before{
			display: none;
		}
	</style>
</head>
<body>
	<div id="div">
		
	</div>
	<button onclick="cl()">Click</button>
</body>
<script type="text/javascript">
	var button=document.getElementsByTagName('button');

	function cl() {
		var div=document.getElementsByTagName('div');
		//var button=document.getElementsByTagName('button');		
	}
</script>
</html>