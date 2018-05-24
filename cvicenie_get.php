<?php
/**
 * Created by PhpStorm.
 * User: matus
 * Date: 23. 5. 2018
 * Time: 14:22
 */

header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
header("Connection: keep-alive");
header("Access-Control-Allow-Origin: *");
include "config.php";

if (isset($_GET['trasa'])) {
    $trasaId = $_GET['trasa'];
    try {
        $db = new PDO("mysql:host=" . DB_HOSTNAME . ";dbname=" . DB_DATABASE, DB_USERNAME, DB_PASSWORD);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec("set names utf8");
    } catch (PDOException $e) {
        die ($e->getMessage());
    }
    $lastId = 0;

    $stmt = $db->query("select * from ".TRASA_TABLE." where id='$trasaId'");
    $trasa = $stmt->fetch(PDO::FETCH_ASSOC);

    //echo json_encode($item);
    while (true) {

        $data=array();
        $querry = "select c.id as id,u.email as email,c.start as start,c.ciel as ciel,c.zaciatok as zaciatok,c.koniec as koniec from ".CVICENIE_TABLE." as c join ".USER_TABLE." as u on c.user_id=u.id where c.trasa_id=$trasaId and c.id > $lastId";
        //echo $querry."<br>";
        data_add($lastId,$querry);





        if(!empty($data)){
            echo 'data: '.json_encode($data)."\n\n";


        ob_flush();
        flush();}
    //   break;
        usleep(1000000);

    }
} else echo "400 Bad request";
//$data["total"]="hello";
//echo json_encode($data);
//ob_flush();
//flush();
function data_add($id,$querry){
    global $db ,$data,$lastId,$trasa;
$lastId=$id;
    $stmt = $db->query($querry);
    while ($item = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //echo json_encode($item);

        $zaznam = array("id"=>$item['id'],"trasa" => $trasa['nazov'], "osoba" =>  $item['email'], "trasa_start" => $trasa['start'], "trasa_ciel" => $trasa['ciel'], "cvicenie_start" => $item['start'],"cvicenie_ciel"=>$item['ciel'],"zaciatok"=>$item['zaciatok'],"koniec"=>$item['koniec']);
        array_push($data, $zaznam);
        if ($item['id'] > $lastId) $lastId = $item['id'];
    }
}
?>