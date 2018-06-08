<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Info windows</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
  <header>
      <?php
      include('config.php');
      session_start();
      $db = new PDO("mysql:host=".DB_HOSTNAME.";dbname=".DB_DATABASE,DB_USERNAME, DB_PASSWORD);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $db->exec("set names utf8");

      if(isset($_POST["logout"])) {
          session_unset();
          header("Location:index.php");
      }
      else if(isset($_SESSION["email"])){
            $email=$_SESSION["email"];
            echo'
            <form method="post" >
            <label>Pouzivatel: '.$_SESSION["email"].'</label>
      <button type="submit" name="logout">Odhlasit</button>
      </form>';
            }
            else if(isset($_POST['login'])){
          $user=$_POST['email'];
          $heslo=$_POST['heslo'];
          $stmt = $db->query("select * from ".USER_TABLE." where email='$user'");
          $item = $stmt->fetch(PDO::FETCH_ASSOC);
          $hash = hash('sha512',$heslo);
          $pass=$item['pass'];
          if(strcmp($hash,$pass))echo "ok";
          $_SESSION['email']=$user;
                header("Location:index.php");
         // echo $password."<br>";
          //echo hash('sha512',$heslo)."<br>";



      }else echo '
      <form method="post">
          <label>Email:<input type="text" name="email" required></label>
          <label>Heslo:<input type="password" name="heslo"></label>
          <input type="submit" value="prihlasit" name="login">
          <button title="registrovat noveho pouzivatela" formaction="registracia.html">registrovat</button>
      </form>
      
      ';
      ?>
  </header>
    <div id="map"></div>
        <?php

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

 $sql = "SELECT * FROM User";
$result = $conn->query($sql);
 $IDs=array();
  $Menos=array();
   $Priezviskos=array();
    $Emails=array();
     $Skolas=array();
      $SKadresa=array();
        $BYDulica=array();
            $PSC=array();
                $BYDobec=array();
      $mark="";          
    $i=0;    
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       
       $IDs[$i]=$row["id"];
      $Menos[$i]=$row["meno"];
   $Priezviskos[$i]=$row["priezvisko"];
    $Emails[$i]=$row["email"];
     $Skolas[$i]=$row["skola"];
      $SKadresa[$i]=$row["skola_adresa"];
        $BYDulica[$i]=$row["bydlisko_ulica"]; 
            $PSC[$i]=$row["psc"]; 
        $MESTA[$i]=$row["bydlisko_obec"]; 
         $TYPE[$i]=$row["type"]; 
    $i=$i+1;    
    }
} else {
    echo "0 results";
}


  $x=0;
 $j=0;
$conn->close();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  $mark = test_input($_POST["mark"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}  


    ?>
       <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="radio" id="0" name="mark" value="clear" checked> Zobraz iba mapu<br>
       <input type="radio" id="1" name="mark" value="skola" > Zobraz adresy škôl všetkých registrovaných užívateľov<br>
  <input type="radio" id="2" name="mark" value="bydlisko"> Zobraz bydliská všetkých registrovaných užívateľov<br>
    <input type="submit" value="OK">
    <div id="map"></div>
    <script>
       
         

     
      // This example displays a marker at the center of Australia.
      // When the user clicks the marker, an info window opens. var addr  

      function initMap() {
      
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 8,
          center: {lat: 49, lng: 18}
        });  
        
        var latitudes =[];
        var longitudes =[];
        var addresss=[]; 
          var markers=[];
         var infowindows=[];
          
         var ulice=""; 
         var mena= ""; 
         var priezviska= ""; 
         var emaily=  ""; 
         var PSCa= "";  
         var skoly= "";
         
           var latit;
           var longit;
           
              
          
          ulice="<?php for($l=0;$l<$i;$l++){ echo $BYDulica[$l]; echo ';';}?>";
          console.log(ulice);
          
          
          skoly="<?php for($l=0;$l<$i;$l++){ echo $SKadresa[$l]; echo ';';}?>";
          console.log(skoly);
       
          
          mena= "<?php for($l=0;$l<$i;$l++){  echo $Menos[$l]; echo ';';}?>";
           console.log(mena);
          priezviska =  "<?php for($l=0;$l<$i;$l++){  echo $Priezviskos[$l]; echo ';';}?>";
            console.log(priezviska);
            
          emaily=  "<?php for($l=0;$l<$i;$l++){  echo $Emails[$l]; echo ';';}?>";
          console.log(emaily);
          
          PSCa= "<?php for($l=0;$l<$i;$l++){  echo $PSC[$l]; echo ';';}?>";
          console.log(PSCa);
          
         var streets=ulice.split(';');
         console.log(streets);
         
         var schools=skoly.split(';');
         console.log(schools);
         
         var names=mena.split(';');
         console.log(names);
         
         var surnames=priezviska.split(';');
         console.log(surnames);
         
         var emails=emaily.split(';');
         console.log(emails);
         
         var postcode=PSCa.split(';');
         console.log(postcode);
         
    
                              
       for(var k=0;k<<?php echo $i; ?>;k++){   
           
         
      if(k>55){  
                   
        var geocoder = new google.maps.Geocoder(); 
        
        var res ="<?php echo $mark; ?>";   
        
            if(res=="clear")       
              addresss[k] = "";      
          if(res=="bydlisko")
                addresss[k] = streets[k]; 
          if(res=="skola")
                addresss[k] = schools[k]; 
                  
                 
          
                
           
                
            adresa=addresss[k];    
              console.log(adresa);    
            
            
          
           
           geocoder.geocode( { 'address': adresa}, function(results, status) {
                          console.log(status);
  if (status == google.maps.GeocoderStatus.OK) {
                             
    var latlang = results[0].geometry.location;
   
         
        
        console.log(k);
        
         
        
        
           
  /*      var contentString = '<div id=\"content\">'+'<p>Meno a priezvisko: '+names[k] +surnames[k]+'</p>'+'<p>E-mail: '+emaily[k]+'</p>'+'<p>Ulica: '+streets[k]+'</p>'+'<p>PSČ: '+postcode[k]+'</p>'+'</div>';
           console.log(contentString);
       
        infowindows[k] = new google.maps.InfoWindow({
          content: contentString
        });
                              */
         
        markers[k] = new google.maps.Marker({
          map: map,
            position: results[0].geometry.location 
        });
        
   /*     markers[k].addListener('click', function() {
          infowindows[k].open(map, markers[k]);
        }); 
    
         */
         
   }   
       
   
});  

      }
  }
}
                        
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBg-sSzElcKO4xdcLqyOXE4A2cLpMAMFSY&callback=initMap">
    </script>
  </body>
</html>
