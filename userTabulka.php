<!DOCTYPE html>
<html lang="sk">
<html>
  <head>
  <meta charset="UTF-8">   
  <link rel="stylesheet" type="text/css" href="styly.css">  
  <title>Tabulka tras</title>
        <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
         #zobraz {
          margin-left:25%;
      }   
          #zobraz2 {
          margin-left:25%;
      }  
        
           #zobraz1 {
          margin-left:15%;
      }  
        #tabulka {
          margin:1%;
      }        
      
      h3 {
         margin-left:45%;
      }   
       h1 {
         margin-left:35%;
      }     
   
    </style>
  
  </head>
  <body>  
     <h1>Tabuľka používateľa - záznamy tréningov</h1>

<?php
  include('config.php');
$servername = DB_HOSTNAME;
$username = DB_USERNAME;
$password = DB_PASSWORD;
$dbname = DB_DATABASE;




$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 $userMail=$_GET['trasy'];

 $sql = "SELECT b.type, a.id, a.nazov, a.mod, a.start, a.ciel, a.vytvorene, c.start as zaciatokcvika, c.ciel as konieccvika, c.zaciatok, c.koniec, c. pridane from trasa a join user b on a.autor=b.id join cvicenie c on a.id=c.trasa_id where b.email=\"$userMail\"";

 
$result = $conn->query($sql);
 $ID=array();
 $Admintest=0;
 $IDs=array();
  $nazov=array();
  $Mods=array();
  $Mody=array();
       $Ciel=array();
        $Zaciatok=array();
        $Vytvorene=array();
    $Zaciatokcvika=array(); 
    $Cielcvika=array();
    $Caszaciatku=array();    
   $Caskonca=array();
    $Pridane=array();
    $i=0;    
  $sql1 = "SELECT meno, priezvisko, email,bydlisko_ulica,bydlisko_obec from user where email=\"$userMail\"";
    
    $result1 = $conn->query($sql1);
 $NAME="";
  $SURNAME="";
  $MAIL="";
  $BYDUL="";
  $BYDOB="";
   $l=0;
      if ($result1->num_rows > 0) {
    // output data of each row
    while($row1= $result1->fetch_assoc()) {
     $NAME=$row1["meno"];
  $SURNAME=$row1["priezvisko"];
  $MAIL=$row1["email"];
  $BYDUL=$row1["bydlisko_ulica"];
  $BYDOB=$row1["bydlisko_obec"];
      
    $l=$l+1;    
    }   
   echo "<h3>Používateľ: $NAME $SURNAME</h3>";
  echo "<h3>E-mail:$MAIL </h3>";
  echo "<h3>Mesto:$BYDOB </h3>"; 
   echo "<h3>Ulica:$BYDUL </h3>";                              
echo "<table id=\"tabulka\" border=\"1\">";
 echo "<thead><tr><th>id trasy </th><th>Názov trasy</th>";
 echo "<th>Mód trasy</th><th>Súradnice štartu trasy</th><th> Súradnice cieľa trasy</th><th>Čas vytvorenia trasy</th><th>Súradnice štartu tréningu</th><th>Súradnice cieľa tréningu</th><th>Čas začiatku tréningu</th><th>Čas konca tréningu</th><th>Čas pridania záznamu o tréningu</th></tr> </thead>";
 
   $l=0;
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    $IDs[$i]=$row["id"];
       $ID[$i]=$i;
        $nazov[$i]= $row["nazov"];
    
     $Mods[$i]=$row["mod"];
      if($Mods[$i]==1) 
               $Mody[$i]="private"; 
         if($Mods[$i]==2) 
               $Mody[$i]="public"; 
         if($Mods[$i]==3) 
               $Mody[$i]="stafeta"; 
       $Ciel[$i]=$row["ciel"];
        $Zaciatok[$i]=$row["start"];
        $Vytvorene[$i]=$row["vytvorene"];
    $Zaciatokcvika[$i]=$row["zaciatokcvika"]; 
    $Cielcvika[$i]=$row["konieccvika"];
    $Caszaciatku[$i]=$row["zaciatok"];    
   $Caskonca[$i]=$row["koniec"];
    $Pridane[$i]=$row["pridane"];
      $Admintest=$row["type"];
      echo "<tr><td>" .$IDs[$i]. "</td><td>" ."<a href=\"TrasyTabulka.php?cvicenie=$IDs[$i]\">$nazov[$i]</a>". "</td><td>" . $Mody[$i]."</td><td>" . $Zaciatok[$i]."</td><td>" . $Ciel[$i]. "</td><td>" . $Vytvorene[$i]."</td><td>" . $Zaciatokcvika[$i]."</td><td>" .  $Cielcvika[$i]. "</td><td>" . $Caszaciatku[$i]."</td><td>" .  $Caskonca[$i]. "</td><td>" .  $Pridane[$i]. "</td></tr>"; 
    $i=$i+1;    
    }
      }
   
   
    
    
   } else {
    echo "<p> Na tejto trase niesu evidované žiadne tréningy";
}  
echo "</table>";
$conn->close();       
    




  //echo   "<br><a id=\"zobraz1\" href=\"Trasy.php?trasa=$TrasaID\">Zobraz trasu na mape (najprv je potrebné trasu aktivovať)<a>";
 echo  "<a id=\"zobraz1\" href=\"VykonyTabulka.php?vykon=$userMail\">Zobraz tabuľku výkonov na jednotlivých trasách</a> ";
  if($Admintest==2)
  echo "<a id=\"zobraz\" href=\"AdminTabulka.php?sort=id\">Späť na tabuľku všetkých trás</a>";
?> 
  <a id="zobraz2" href="index.php">Späť na hlavnú stránku</a>
  
</body>
</html>