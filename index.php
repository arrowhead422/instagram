<?php
// configuration for our php sever
set_time_limit(0);
ini_set('default_socket_timeout', 300);
session_start();

//make constants using define.
define('client_ID', '772cefd08fdb49de9716fb8a9e8b75cf');
define('client_Secret', 'a51cb2f090164afbbd241708343577f3');
define('redirectURI', 'http://localhost/appacademyapi/index.php');
define('ImageDirectory', 'pics/');
//define act like a globe varible
?>


 <!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Untitled</title>
		<link rel="stylesheet"  href="css/style.css">
		<link rel="stylesheet" href="humans.txt">
	</head>
<body>		<!-- creating a login for people to go and give approval for our web app to access their instagram account
after getting approval we are now going to have the information so we can play with it -->
			<a href="https:api.instagram/oauth/authorize/?client_id=<?php echo client_Id; ?>&redirect_uri=<?php echo redirectURI?>&response_type=code">LOGIN</a>
			<script type="js/main.js"></script>
</body>
</html>	





























