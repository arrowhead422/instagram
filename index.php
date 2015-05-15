<?php
// configuration for our php sever
set_time_limit(0);
ini_set('default_socket_timeout', 300);
session_start();

//make constants using define.
define('clientID', '772cefd08fdb49de9716fb8a9e8b75cf');
define('clientSecret', 'a51cb2f090164afbbd241708343577f3');
define('redirectURI', 'http://localhost/appacademyapi/index.php');
define('ImageDirectory', 'pics/');
//
//define act like a globe varible

function connectToInstagram($url){
	$ch = curl_init();

	curl_setopt_array($ch, array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_SSL_VERIFYPEER => false,
		CURLOPT_SSL_VERIFYHOST => 2,

		));
		$result = curl_exec($ch);
		curl_close($ch);
		return $result;
}

function getUserID($userName){
	$url = 'http://api.instagram.com/v1/users/search?q='.$userName.'&client_id'.clientID;
	$instagramInfo = connectToInstagram($url);
	$results = json_decode($instagramInfo, true);

	echo $results['data']['0']['id'];
}

if (isset($_GET['code'])){
	$code = ($_GET['code']);
	$url = 'https://api.instagram.com/oauth/access_token';
	$access_token_setting  = array('client_id' => clientID,
								'client_secret' => clientSecret,
								'grant_type' => 'authorization_code',
								'redirect_uri' => redirectURI,
								'code' => $code 
								 );
	//cURL is what we use in PHP, it's a library calls to other API's
	$curl = curl_init($url);//curl is URL
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $access_token_setting);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);//

$result = curl_exec($curl);
curl_close($curl);

$results = json_decode($result, true);
getUserID($results['user']['username']);
}
else{
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
			<a href="https:api.instagram.com/oauth/authorize/?client_id=<?php echo clientID; ?>&redirect_uri=<?php echo redirectURI; ?>&response_type=code">login</a>
			<script type="js/main.js"></script>
</body>
</html>	
<?php

}



























