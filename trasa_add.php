<?php
/**
 * Created by PhpStorm.
 * User: matus
 * Date: 22. 5. 2018
 * Time: 15:17
 *
 * Tabulka trasa
 * id :serial
 * nazov: varchar 50
 * mod : int (1=private; 2=public; 3=stafeta)
 * autor: int (FK user_id)
 * start: varchar v tvare (lat,lon )
 * ciel: varchar  v tvare (lat,lon )
 */

// fei gps 48.151965,17.072995
// tuke gps  48.151965,17.072995
include "config.php";
//print_r(json_encode($_POST));
$email=$_POST['user'];
$mod=$_POST['mod'];
$nazov=$_POST['nazov'];

$start=$_POST['start'];
$ciel=$_POST['ciel'];

try {
    $db = new PDO("mysql:host=".DB_HOSTNAME.";dbname=".DB_DATABASE,DB_USERNAME, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec("set names utf8");
} catch (PDOException $e) {
   die ($e->getMessage());
}
$stmt = $db->query("select * from ".USER_TABLE." where email='$email'");
$item = $stmt->fetch(PDO::FETCH_ASSOC);
//print_r(json_encode($item));
$user=$item['id'];
$user_status=$item['type'];
$query="INSERT INTO ".TRASA_TABLE."(`nazov`,`autor`,`mod`,`start`,`ciel`) VALUES('$nazov',$user,$mod,'$start','$ciel')";
if($mod==1 or $user_status==1) {
   $db->exec($query);
    http_response_code(200);
    echo http_response_code(200);
    header("Location:userTabulka.php?trasy=$email");
}
else {
    http_response_code(401);
     echo http_response_code(401);
}
//header('Location: index.php ');
