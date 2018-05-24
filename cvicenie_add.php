<?php
/**
 * Created by PhpStorm.
 * User: matus
 * Date: 24. 5. 2018
 * Time: 12:56
 */
include "config.php";
//echo json_encode($_POST);
$user=$_POST['user'];
$trasa=$_POST['trasa'];
$start=$_POST['start'];
$ciel=$_POST['ciel'];
$zaciatok=$_POST['zaciatok'];
$koniec=$_POST['koniec'];

try {
    $db = new PDO("mysql:host=".DB_HOSTNAME.";dbname=".DB_DATABASE,DB_USERNAME, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec("set names utf8");
} catch (PDOException $e) {
    die ($e->getMessage());
}
$stmt = $db->query("select * from ".USER_TABLE." where email='$user'");
$item = $stmt->fetch(PDO::FETCH_ASSOC);
//print_r(json_encode($item));
$user=$item['id'];
$zaciatok=date_format(date_create($zaciatok), 'Y-m-d H:i:s');
$koniec=date_format(date_create($koniec), 'Y-m-d H:i:s');
$query="INSERT INTO ".CVICENIE_TABLE."(`user_id`,`trasa_id`,`start`,`ciel`,`zaciatok`,`koniec`) VALUES($user,$trasa,'$start','$ciel','$zaciatok','$koniec')";
if($db->exec($query)){
    http_response_code(200);
    echo http_response_code(200);
}
else {
    http_response_code(400);
    echo http_response_code(400);
}
