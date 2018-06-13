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
          margin-left:25%;
      }   
        #tabulka {
          margin-left:15%;
      }        
      
      h1 {
         margin-left:45%;
      }  
      
           #zobraz2 {
          margin-left:25%;
      }     
    </style>
  
  </head>
  <body>  
   <h1>Všetky trasy</h1>

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
  
  echo "<table id=\"tabulka\" border=\"1\">";
 echo "<thead><tr><th>id</th><th>Názov trasy<a href=\"AdminTabulka.php?sort=nazov\">&#171</a><a href=\"AdminTabulka.php?sort=nazov2\">&#187</a></th>";
 echo "<th>Autor<a href=\"AdminTabulka.php?sort=autor\">&#171</a><a href=\"AdminTabulka.php?sort=autor2\">&#187</a></th>"; 
 echo "<th>Súradnice štartu trasy<a href=\"AdminTabulka.php?sort=start\">&#171</a><a href=\"AdminTabulka.php?sort=start2\">&#187</a></th>";  
  echo "<th>Súradnice cieľa trasy<a href=\"AdminTabulka.php?sort=ciel\">&#171</a><a href=\"AdminTabulka.php?sort=ciel2\">&#187</a></th>"; 
   echo "<th>Mód<a href=\"AdminTabulka.php?sort=mod\">&#171</a><a href=\"AdminTabulka.php?sort=mod2\">&#187</a></th>"; 
    echo "<th>Dátum a čas vytvorenia<a href=\"AdminTabulka.php?sort=cas\">&#171</a><a href=\"AdminTabulka.php?sort=cas2\">&#187</a></th> </tr> </thead>";
  
   if ($_GET['sort'] == 'id')
 $sql = "SELECT a.id, a.nazov,b.meno,b.priezvisko,b.email, a.start, a.ciel, a.mod, a.vytvorene from trasa a join user b on a.autor = b.id  "; 
  
  if ($_GET['sort'] == 'nazov')
{
   $sql = "SELECT a.id, a.nazov,b.meno,b.priezvisko,b.email, a.start, a.ciel, a.mod, a.vytvorene from trasa a join user b on a.autor = b.id  order by a.nazov DESC"; 
   
     }
 
  if ($_GET['sort'] == 'nazov2')
{
   $sql = "SELECT a.id, a.nazov,b.meno,b.priezvisko,b.email, a.start, a.ciel, a.mod, a.vytvorene from trasa a join user b on a.autor = b.id  order by a.nazov ASC"; 
   
     }    
 
   if ($_GET['sort'] == 'autor')
{
   $sql = "SELECT a.id, a.nazov,b.meno,b.priezvisko,b.email, a.start, a.ciel, a.mod, a.vytvorene from trasa a join user b on a.autor = b.id  order by b.meno DESC, b.priezvisko DESC"; 
   
     }
     
     if ($_GET['sort'] == 'autor2')
{
   $sql = "SELECT a.id, a.nazov,b.meno,b.priezvisko,b.email, a.start, a.ciel, a.mod, a.vytvorene from trasa a join user b on a.autor = b.id  order by b.meno ASC, b.priezvisko DESC"; 
   
     }
 
      if ($_GET['sort'] == 'start')
{
   $sql = "SELECT a.id, a.nazov,b.meno,b.priezvisko,b.email, a.start, a.ciel, a.mod, a.vytvorene from trasa a join user b on a.autor = b.id  order by a.start DESC"; 
   
     }
  
        if ($_GET['sort'] == 'start2')
{
   $sql = "SELECT a.id, a.nazov,b.meno,b.priezvisko,b.email, a.start, a.ciel, a.mod, a.vytvorene from trasa a join user b on a.autor = b.id  order by a.start ASC"; 
   
     }
   
         if ($_GET['sort'] == 'ciel')
{
   $sql = "SELECT a.id, a.nazov,b.meno,b.priezvisko,b.email, a.start, a.ciel, a.mod, a.vytvorene from trasa a join user b on a.autor = b.id  order by a.ciel DESC"; 
   
     }
  
        if ($_GET['sort'] == 'ciel2')
{
   $sql = "SELECT a.id, a.nazov,b.meno,b.priezvisko,b.email, a.start, a.ciel, a.mod, a.vytvorene from trasa a join user b on a.autor = b.id  order by a.ciel ASC"; 
   
     }  
     
       if ($_GET['sort'] == 'mod')
{
   $sql = "SELECT a.id, a.nazov,b.meno,b.priezvisko,b.email, a.start, a.ciel, a.mod, a.vytvorene from trasa a join user b on a.autor = b.id  order by a.mod DESC"; 
   
     }
  
        if ($_GET['sort'] == 'mod2')
{
   $sql = "SELECT a.id, a.nazov,b.meno,b.priezvisko,b.email, a.start, a.ciel, a.mod, a.vytvorene from trasa a join user b on a.autor = b.id  order by a.mod ASC"; 
   
     }    
     
       if ($_GET['sort'] == 'cas')
{
   $sql = "SELECT a.id, a.nazov,b.meno,b.priezvisko,b.email, a.start, a.ciel, a.mod, a.vytvorene from trasa a join user b on a.autor = b.id  order by a.vytvorene DESC"; 
   
     }
  
        if ($_GET['sort'] == 'cas2')
{
   $sql = "SELECT a.id, a.nazov,b.meno,b.priezvisko,b.email, a.start, a.ciel, a.mod, a.vytvorene from trasa a join user b on a.autor = b.id  order by a.vytvorene ASC"; 
   
     }   
     
$result = $conn->query($sql);
    $IDs=array();
  $Nazovs=array();
   $Autors=array();
    $Mods=array();
     $Starts=array();
      $Ciels=array();
        $Vytvorenes=array();
          $Menos=array();
        $Priezviskos=array();
        $Mails=array();
        
    $i=0;    
    
   $Mody=array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       $IDs[$i]=$row["id"];
      $Nazovs[$i]=$row["nazov"];
   $Menos[$i]=$row["meno"];
    $Priezviskos[$i]=$row["priezvisko"];
    $Mods[$i]=$row["mod"];
     $Starts[$i]=$row["start"];
      $Ciels[$i]=$row["ciel"];
      $Mails[$i]=$row["email"];
        $Vytvorenes[$i]=$row["vytvorene"];
        if($Mods[$i]==1) 
               $Mody[$i]="private"; 
         if($Mods[$i]==2) 
               $Mody[$i]="public"; 
         if($Mods[$i]==3) 
               $Mody[$i]="stafeta"; 
       echo "<tr><td>" .$IDs[$i]. "</td><td>" . "<a href=\"TrasyTabulka.php?cvicenie=$IDs[$i]\">$Nazovs[$i]</a>" . "</td><td>" ."<a href=\"userTabulka.php?trasy=$Mails[$i]\">$Menos[$i]  $Priezviskos[$i]</a>" ."</td><td>" . $Starts[$i]."</td><td>" . $Ciels[$i]. "</td><td>" .$Mody[$i] ."</td><td>" . $Vytvorenes[$i]."</td></tr>"; 
    $i=$i+1;    
    }
} else {
    echo "0 results";
}
echo "</table>";
$conn->close();
?>
 <br><a id="zobraz" href="Trasy.php">Zobraz všetky trasy na mape</a>
 <a id="zobraz2" href="index.php">Späť na hlavnú stránku</a>
</body>
</html>