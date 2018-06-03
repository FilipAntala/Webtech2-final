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

if (isset($_GET['user'])) {
    $user = $_GET['user'];
    try {
        $db = new PDO("mysql:host=" . DB_HOSTNAME . ";dbname=" . DB_DATABASE, DB_USERNAME, DB_PASSWORD);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec("set names utf8");
    } catch (PDOException $e) {
        die ($e->getMessage());
    }
    $mylastId = 0;
    $publicLastId = 0;
    $q="select * from ".USER_TABLE." where email='$user'";
    //echo $q."<br>";
    $stmt = $db->query($q);
    $item = $stmt->fetch(PDO::FETCH_ASSOC);
    $userStatus=$item['type'];
    $userId=$item['id'];
    $userEmail=$item['email'];
    //echo json_encode($item)."<br>";
    while (true) {

        $data=array();
        if($userStatus==0) {
            $querry = "select t.id as id,u.email as email,t.start as start,t.ciel as ciel,t.nazov as nazov,t.mod as `mod`,t.vytvorene as datum from ".TRASA_TABLE." as t join ".USER_TABLE." as u on t.autor=u.id where t.autor=$userId and t.id > $mylastId";
             //echo $querry."<br>";

            data_add($mylastId,$querry,1);
               $mylastId = $lastId;


            $querry = "select  t.id as id,u.email as email,t.start as start,t.ciel as ciel,t.nazov as nazov,t.mod as `mod`,t.vytvorene as datum from ".TRASA_TABLE." t join ".USER_TABLE." u on t.autor=u.id where t.mod > 1 and t.id > $publicLastId ";
             //echo $querry."<br>";

            data_add($publicLastId,$querry,0);
                $publicLastId = $lastId;

        }
        else{
            $querry = "select  t.id as id,u.email as email,t.start as start,t.ciel as ciel,t.nazov as nazov,t.mod as `mod`,t.vytvorene as datum from ".TRASA_TABLE." t join ".USER_TABLE." u on t.autor=u.id where t.autor=$userId and t.id > $mylastId";
            // echo $querry."<br>";

            data_add($mylastId,$querry,1);
                $mylastId = $lastId;


            $querry = "select  t.id as id,u.email as email,t.start as start,t.ciel as ciel,t.nazov as nazov,t.mod as `mod`,t.vytvorene as datum from ".TRASA_TABLE." t join ".USER_TABLE." u on t.autor=u.id where t.id > $publicLastId and t.autor!=$userId";
            // echo $querry."<br>";
            data_add($publicLastId,$querry,0);
                 $publicLastId = $lastId;

        }

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
function data_add($id,$querry,$vlastna){
    global $db ,$data,$lastId;
$lastId=$id;
    $stmt = $db->query($querry);
    while ($item = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //echo json_encode($item);

        $zaznam = array("id"=>$item['id'],"nazov" => $item['nazov'], "autor" =>  $item['email'], "mod" => $item['mod'], "start" => $item['start'], "ciel" => $item['ciel'],"vytvorene"=>$item['datum'],"vlastna"=>$vlastna);
        array_push($data, $zaznam);
        if ($item['id'] > $lastId) $lastId = $item['id'];
    }
}
?>