<?php
require_once("config.php");
$db = new mysqli(DB_HOSTNAME,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br>";
  }
else
  {
 
  $fin = fopen($_FILES["file"]["tmp_name"],'r') or die('cant open file');
  $pass = hash('sha512','heslo');
  $type = 1;
  $hash = null;
  $valid = 0;
  $f = 0;
  //$query = 	'SET NAMES "UTF8"';
  //$result = $db->query($query) or die(mysqli_error($db));
  
  while (($data=fgetcsv($fin,1000,";"))!==FALSE) {
	  $data[1] = mysqli_real_escape_string($db,$data[1]);
	  $data[2] = mysqli_real_escape_string($db,$data[2]);
	  $data[3] = mysqli_real_escape_string($db,$data[3]);
	  $data[4] = mysqli_real_escape_string($db,$data[4]);
	  $data[5] = mysqli_real_escape_string($db,$data[5]);
	  $data[6] = mysqli_real_escape_string($db,$data[6]);
	  $data[7] = mysqli_real_escape_string($db,$data[7]);
	  $data[8] = mysqli_real_escape_string($db,$data[8]);
	if($f>0){
		$query = "insert into User (priezvisko,meno,email,pass,type,valid,hash,stredna,stredna_adresa,bydlisko_ulica,psc,bydlisko_obec) values ('$data[1]','$data[2]','$data[3]','$pass','$type','$valid','$hash','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]')";
		$result = $db->query($query) or die(mysqli_error($db));
		echo "Record updated <br />\n";
		}
	$f = $f+1;
    }
fclose($fin);
  
  }
?>
<a href="javascript:history.back()">Back</a>