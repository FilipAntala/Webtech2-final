<?php
require_once("config.php");
$db = new mysqli(DB_HOSTNAME,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
if(isset($_GET['email'])){

	$email = $_GET['email'];
	$sql = "select hash from User where email = '$email'";
	$result = mysqli_query($db,$sql)or die(mysqli_error($db));
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	if($_GET['hash'] == $row['hash']){
		$sql = "update User set valid = 1 where email = '$email'";
		$result = mysqli_query($db,$sql)or die(mysqli_error($db));
		echo "email validation successful";
	}

}
?>