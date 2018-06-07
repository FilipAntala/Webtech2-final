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
          margin-left:20%;
      }   
      
        #zobraz1 {
          margin-left:15%;
      }   
        #tabulka {
          margin-left:15%;
      }        
      
      h1 {
         margin-left:45%;
      }     
   
    </style>
  
  </head>
  <body>  
  

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
 $TrasaID=$_GET['cvicenie'];

 $sql = "SELECT b.id, a.nazov, b.ciel, b.zaciatok, b.koniec, b.pridane from trasa a join cvicenie b on a.id=b.trasa_id where b.trasa_id=$TrasaID";

 
$result = $conn->query($sql);
 $ID=array();

       $Ciel=array();
        $Zaciatok=array();
   $Koniec=array();
    $Pridane=array();
    $i=0;    
    

   $Mody=[]; 
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       $ID[$i]=$row["id"];
       $Trasa=$row["nazov"];
       $Ciel[$i]=$row["ciel"];
        $Zaciatok[$i]=$row["zaciatok"];
   $Koniec[$i]=$row["koniec"];
    $Pridane[$i]=$row["pridane"]; 
     
    $i=$i+1;    
    }
 echo "<h1>Trasa $Trasa - tréningy</h1>";
echo "<table id=\"tabulka\" border=\"1\">";
 echo "<thead><tr><th>id tréningu </th><th>Dosiahnutý cieľ</th>";
 echo "<th>Dátum a čas začiatku tréningu</th><th>Dátum a čas konca tréningu</th><th>Dátum a čas pridania tréningu</th></tr> </thead>";
 
 
for($j=0;$j<$i;$j++)
     echo "<tr><td>" .$ID[$j]. "</td><td>" . $Ciel[$j]. "</td><td>" . $Zaciatok[$j]."</td><td>" . $Koniec[$j]."</td><td>" . $Pridane[$j]. "</td></tr>"; 
echo "</table>";
$conn->close();   
    
    
    
    
} else {
    echo "<p> Na tejto trase niesu evidované žiadne tréningy";
}



  echo   "<br><a id=\"zobraz1\" href=\"Trasy.php?trasa=$TrasaID\">Zobraz trasu na mape (najprv je potrebné trasu aktivovať)<a>";
?> 
  <a id="zobraz" href="AdminTabulka.php?sort=id">Späť na tabuľku všetkých trás<a>
  
</body>
</html>