 <!DOCTYPE html>
<html lang="sk">
<html>
  <head>
  <meta charset="UTF-8">   
  <link rel="stylesheet" type="text/css" href="styly.css">  
  <title>Tabulka administratora</title>
        <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
  
           #zobraz {
          margin-left:70%;
      }   
        #zobraz2 {
          margin-left:25%;
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
   <h1>Tabuľka používateľa - výkony</h1>

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
    $userMail=$_GET['vykon'];
    $sql1 = "SELECT meno, priezvisko, email,bydlisko_ulica,bydlisko_obec from  ".USER_TABLE." where email=\"$userMail\"";
    
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
    }
   echo "<h3>Používateľ: $NAME $SURNAME</h3>";
  echo "<h3>E-mail:$MAIL </h3>";
  echo "<h3>Mesto:$BYDOB </h3>"; 
   echo "<h3>Ulica:$BYDUL </h3>";                              

  
  
  echo "<table id=\"tabulka\" border=\"1\">";
  echo "<thead><tr><th>id trasy</th><th>Názov trasy</th>"; 
 echo "<th>Počet odbehnutých/odjazdených km</a></th>";
 echo "<th>deň tréningu</th>"; 
 echo "<th>Čas začiatku tréningu</th>";  
  echo "<th>Čas konca tréningu</th>"; 
   echo "<th>GPS súradnice začiatku tréningu</th>"; 
    echo "<th>GPS súradnice konca tréningu</th>"; 
     echo "<th>subjektívne hodnotenie tréningu</th>";
     echo "<th>poznámka</th>";
     echo "<th>priemerná rýchlosť na tréningu v km/h</th>";
     echo "<th>Zobraz trasu na mape</th></tr> </thead>";
   
$sql = "SELECT  b.type, a.id, a.nazov, c.pridane, c.zaciatok, c.koniec, c.start as GPSstart,c.ciel as GPSciel from trasa a join  ".USER_TABLE." b on a.autor = b.id join cvicenie c  on a.id=c.trasa_id where b.email=\"$userMail\" ";
  

     

$result = $conn->query($sql);
    $IDs=array();
    $Admintest=0;
    $Nazovtrasy=array();
  $Odjazdenekm=array();
   $Dentreningu=array();
    $Caszactrening=array();
     $Caskontrening=array();
      $GPSzactrening=array();
        $GPSkonctrening=array();
          $Hodnotenie=array();
        $Poznamka=array();
         $Priemernarychlost=array();
         $Lats1=array();
         $Longs1=array();
         $Lats2=array();
         $Longs2=array();
         $LatsDelta=array();
         $LongsDelta=array();
         $distance =array();
         $duration =array();
    $i=0;    
     $position=0; 


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       $IDs[$i]=$row["id"];
       
      $Nazovtrasy[$i]=$row["nazov"];
     $Admintest=$row["type"];
    $Dentreningu[$i]=$row["pridane"];
    $Caszactrening[$i]=$row["zaciatok"];
     $Caskontrening[$i]=$row["koniec"];
      $duration[$i]=(strtotime($Caskontrening[$i])-strtotime($Caszactrening[$i]))/3600;
      
      $GPSzactrening[$i]=$row["GPSstart"];
       $position=strpos($GPSzactrening[$i],",");
        $Lats1[$i]=floatval(substr($GPSzactrening[$i],0,$position));        
        $Longs1[$i]=floatval(substr($GPSzactrening[$i],$position+1,$position));
        $GPSkonctrening[$i]=$row["GPSciel"];
          $position=strpos($GPSkonctrening[$i],",");
          $Lats2[$i]=floatval(substr($GPSkonctrening[$i],0,$position));
        $Longs2[$i]=floatval(substr($GPSkonctrening[$i],$position+1,$position));
        $LatsDelta[$i]=$Lats1[$i] - $Lats2[$i];
        $LongsDelta[$i]=$Longs1[$i] - $Longs2[$i];
         $distance[$i] = (sin(deg2rad($Lats1[$i])) * sin(deg2rad($Lats2[$i]))) + (cos(deg2rad($Lats1[$i])) * cos(deg2rad($Lats2[$i])) * cos(deg2rad($LongsDelta[$i])));
          $distance[$i] =acos($distance[$i]); 
           $distance[$i] =rad2deg($distance[$i]); 
            $distance[$i] =$distance[$i]*60*1.1515*1.609344; 
        $Odjazdenekm[$i]=$distance[$i];
          if($duration[$i]!=0)
            $Priemernarychlost[$i]=$Odjazdenekm[$i]/$duration[$i];
        else
            $Priemernarychlost[$i]=0;
            
        
         if($Priemernarychlost[$i]>100){
                  $Hodnotenie[$i]="výborne";
                  $Poznamka[$i]="Výborný tréning! Len tak ďalej.";
                  }
         if($Priemernarychlost[$i]>=80 && $Priemernarychlost[$i]<100){
                   $Hodnotenie[$i]="dobre"; 
                   $Poznamka[$i]="Dobrý  tréning! Stále je však čo zlepšovať.";
                   
         }
                        
         if($Priemernarychlost[$i]>=60 && $Priemernarychlost[$i]<80){
                  $Hodnotenie[$i]="uspokojivo";  
                  $Poznamka[$i]="Uspokojivý tréning! Treba omnoho viac pridať.";
                  } 
         if($Priemernarychlost[$i]>=40 && $Priemernarychlost[$i]<60){
                  $Hodnotenie[$i]="neuspokojivo";  
                   $Poznamka[$i]="Neuspokojivý tréning! Treba sa zamyslieť nad ďalšími tréningmi";
                  }        
          if($Priemernarychlost[$i]<40 ) {
                  $Hodnotenie[$i]="zle"; 
                  $Poznamka[$i]="Zlý tréning, takto to ďalej nejde.";
                 }        
           
        
      
       
       echo "<tr><td>" .$IDs[$i]. "</td><td>" .$Nazovtrasy[$i] . "</td><td>" . $Odjazdenekm[$i]."</td><td>". $Dentreningu[$i]."</td><td>" . $Caszactrening[$i]."</td><td>" .  $Caskontrening[$i]. "</td><td>" .$GPSzactrening[$i] ."</td><td>" . $GPSkonctrening[$i]."</td><td>" .$Hodnotenie[$i]."</td><td>" .$Poznamka[$i]."</td><td>" . $Priemernarychlost[$i]."</td><td>" .  "<a href=\"Trasy.php?trasa=$IDs[$i]\">Zobraz trasu na mape (najprv je potrebné trasu aktivovať)</a>" ."</td></tr>"; 
    $i=$i+1;    
    }
} else {
    echo "0 results";
}
echo "</table>";
$conn->close();




 if($Admintest==2)
    echo " <br><a id=\"zobraz\" href=\"AdminTabulka.php?sort=id\">Späť na tabuľku všetkých trás</a>";
 
    

?>
      <a id="zobraz2" href="index.php">Späť na hlavnú stránku<a>
</body>
</html>
  