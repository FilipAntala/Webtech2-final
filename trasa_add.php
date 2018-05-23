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
 * start: varchar (json v tvare {"lat":48.18,"lon":17.25} )
 * ciel: varchar (json v tvare {"lat":48.18,"lon":17.25} )
 */

// fei gps 48.151965, E 17.072995
// tuke gps  48.7304366,21.2433415
include "config.php";
//print_r(json_encode($_POST));
$user=$_POST['user'];
$mod=$_POST['mod'];
$nazov=$_POST['nazov'];
$start_lat=$_POST['start_lat'];
$start_lon=$_POST['start_lon'];;
$ciel_lat=$_POST['ciel_lat'];;
$ciel_lon=$_POST['ciel_lon'];;
$start_json=json_encode(array("lat"=>$start_lat,"lon"=>$start_lon));
$ciel_json=json_encode(array("lat"=>$ciel_lat,"lon"=>$ciel_lon));
try {
    $db = new PDO("mysql:host=".DB_HOSTNAME.";dbname=".DB_DATABASE,DB_USERNAME, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec("set names utf8");
} catch (PDOException $e) {
   die ($e->getMessage());
}
$stmt = $db->query("select * from user where email='$user'");
$item = $stmt->fetch(PDO::FETCH_ASSOC);
//print_r(json_encode($item));
$user=$item['id'];
$query="INSERT INTO `trasa`(`nazov`,`autor`,`mod`,`start`,`ciel`) VALUES('$nazov',$user,$mod,'$start_json','$ciel_json')";
echo $db->exec($query);
//header('Location: index.php ');
