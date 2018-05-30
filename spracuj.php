<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
        <link rel="stylesheet" href="styles.css">
		<title>spracuj</title>
	</head>
	<body>
	<div id="cont"><div id="in"><br><br>
	<br><br><br>

<?php

require_once('config.php');
$db = new mysqli(DB_HOSTNAME,DB_USERNAME,DB_PASSWORD,DB_DATABASE);


if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$db->set_charset("utf8");

$url = 'http://147.175.98.132/reg';
$hash = md5( rand(0,1000) );
if(!empty($_POST['email'])){
	$email = $_POST['email'];
}
if(!empty($_POST['pass'])){
	$password = $_POST['pass'];
}

$password = hash('sha512',$password);
$val = 0;
$type = 1; // 1 = user, 2 = admin

$query = "insert into USER_TABLE (email,pass,type,valid,hash) values ('$email','$password','$type','$val','$hash')";

$result = $db->query($query) or die(mysqli_error($db));
if($result){
	
$to      = 'anthrax1551@gmail.com';//$email; // Send email to our user
$subject = 'Signup | Verification'; // Give the email a subject 
$message = '
 
Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
 
------------------------
Username: '.$email.'
Password: '.$_POST['pass'].'
------------------------
 
Please click this link to activate your account:
'.$url.'/verify.php?email='.$email.'&hash='.$hash.'
 
'; // Our message above including the link
                     
$headers = 'From:anthrax1551@gmail.com' . "\r\n"; // Set from headers
var_dump( mail($to, $subject, $message, $headers)); // Send our email

	
	
	
} else {
	echo "Chyba";
}

?>
<br><br><br>
<a href="javascript:history.back()">Back</a>
</div></div>
</body>
</html>