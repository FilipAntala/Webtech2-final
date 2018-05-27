<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Directions service</title>
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
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
      h2{margin-left:40%;}
      p{margin-left:40%;}
      #prepinanie {
        margin-left:75%;
      }            
    </style>
  </head>
  <body>
      <h2 >Trasy</h2> 
      <p id="nazov"></p>
      <p id="autor"></p>
      <p id="start"></p>
      <p id="ciel"></p>
      <p id="mod"></p>
       <p id="vytvorene"></p>
   <div id="prepinanie">
      
<img src="next.png"  height="40" width="80">
   </div>
   <button id="btn">Zobraz odjazdeny usek</button>
    <div id="map"></div>
    
    <?php
     include('config.php');
$servername = DB_HOSTNAME;
$username = DB_USERNAME;
$password = DB_PASSWORD;
$dbname = DB_DATABASE;

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

 $sql = "SELECT a.nazov,b.meno,b.priezvisko, a.mod, a.start, a.ciel,a.vytvorene from trasa a join user b on a.autor = b.id ";
$result = $conn->query($sql);

  $Nazovs=array();
   $Autors=array();
    $Mods=array();
     $Starts=array();
      $Ciels=array();
        $Vytvorenes=array();
          $Menos=array();
        $Priezviskos=array();
    $i=0;    
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      $Nazovs[$i]=$row["nazov"];
   $Menos[$i]=$row["meno"];
    $Priezviskos[$i]=$row["priezvisko"];
    $Mods[$i]=$row["mod"];
     $Starts[$i]=$row["start"];
      $Ciels[$i]=$row["ciel"];
        $Vytvorenes[$i]=$row["vytvorene"]; 
     
    $i=$i+1;    
    }
} else {
    echo "0 results";
}


for($j=$i;$j<20;$j++){
   
      $Nazovs[$j]="";
   $Menos[$j]="";
   $Priezviskos[$j]="";
    $Mods[$j]="";
     $Starts[$j]="";
      $Ciels[$j]="";
        $Vytvorenes[$j]=""; 

}
$conn->close();

    ?>
    
    <script>
          var poc=0;
          
          
          



      function initMap() {
        var directionsService = new google.maps.DirectionsService;   
        var directionsDisplay1 = new google.maps.DirectionsRenderer({
    polylineOptions: {
      strokeColor: "gray"
    }
  });  
  
   

          
 
  
  
  
  
        var directionsDisplay2 = new google.maps.DirectionsRenderer({
    polylineOptions: {
      strokeColor: "gray" 
    }
  
  });  
   var directionsDisplay3 = new google.maps.DirectionsRenderer({
    polylineOptions: {
      strokeColor: "gray"
    }
  }); 
     var directionsDisplay4 = new google.maps.DirectionsRenderer({
    polylineOptions: {
      strokeColor: "gray"
    }
  }); 
      var directionsDisplay5 = new google.maps.DirectionsRenderer({
    polylineOptions: {
      strokeColor: "gray"
    }
  }); 
       var directionsDisplay6 = new google.maps.DirectionsRenderer({
    polylineOptions: {
      strokeColor: "gray"
    }
  }); 
        var directionsDisplay7 = new google.maps.DirectionsRenderer({
    polylineOptions: {
      strokeColor: "gray"
    }
  }); 
         var directionsDisplay8 = new google.maps.DirectionsRenderer({
    polylineOptions: {
      strokeColor: "gray"
    }
  }); 
          var directionsDisplay9 = new google.maps.DirectionsRenderer({
    polylineOptions: {
      strokeColor: "gray"
    }
  }); 
           var directionsDisplay10 = new google.maps.DirectionsRenderer({
    polylineOptions: {
      strokeColor: "gray"
    }
  }); 
     var directionsDisplay11 = new google.maps.DirectionsRenderer({
    polylineOptions: {
      strokeColor: "gray"
    }
  }); 
      var directionsDisplay12 = new google.maps.DirectionsRenderer({
    polylineOptions: {
      strokeColor: "gray"
    }
  }); 
       var directionsDisplay13 = new google.maps.DirectionsRenderer({
    polylineOptions: {
      strokeColor: "gray"
    }
  }); 
        var directionsDisplay14 = new google.maps.DirectionsRenderer({
    polylineOptions: {
      strokeColor: "gray"
    }
  }); 
         var directionsDisplay15= new google.maps.DirectionsRenderer({
    polylineOptions: {
      strokeColor: "gray"
    }
  }); 
          var directionsDisplay16 = new google.maps.DirectionsRenderer({
    polylineOptions: {
      strokeColor: "gray"
    }
  }); 
           var directionsDisplay17 = new google.maps.DirectionsRenderer({
    polylineOptions: {
      strokeColor: "gray"
    }
  }); 
            var directionsDisplay18 = new google.maps.DirectionsRenderer({
    polylineOptions: {
      strokeColor: "gray"
    }
  }); 
             var directionsDisplay19 = new google.maps.DirectionsRenderer({
    polylineOptions: {
      strokeColor: "gray"
    }
  }); 
              var directionsDisplay20 = new google.maps.DirectionsRenderer({
    polylineOptions: {
      strokeColor: "gray"
    }
  }); 
              
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 6,
          center: {lat: 41.85, lng: -87.65}
        });
        directionsDisplay20.setMap(map);
         directionsDisplay19.setMap(map);
           directionsDisplay18.setMap(map);
            directionsDisplay17.setMap(map);
             directionsDisplay16.setMap(map);
              directionsDisplay15.setMap(map);
               directionsDisplay14.setMap(map);
                directionsDisplay13.setMap(map);
                 directionsDisplay12.setMap(map);
                  directionsDisplay11.setMap(map);
         directionsDisplay10.setMap(map);
          directionsDisplay9.setMap(map);
           directionsDisplay8.setMap(map);
            directionsDisplay7.setMap(map);
             directionsDisplay6.setMap(map);
              directionsDisplay5.setMap(map);
               directionsDisplay4.setMap(map);
                directionsDisplay3.setMap(map);
                 directionsDisplay2.setMap(map);
                  directionsDisplay1.setMap(map);
    
      
    
          calculateAndDisplayRoute1(directionsService, directionsDisplay1);
          calculateAndDisplayRoute2(directionsService, directionsDisplay2);
           calculateAndDisplayRoute3(directionsService, directionsDisplay3);
            calculateAndDisplayRoute4(directionsService, directionsDisplay4);
             calculateAndDisplayRoute5(directionsService, directionsDisplay5);
              calculateAndDisplayRoute6(directionsService, directionsDisplay6);
               calculateAndDisplayRoute7(directionsService, directionsDisplay7);
                calculateAndDisplayRoute8(directionsService, directionsDisplay8);
                 calculateAndDisplayRoute9(directionsService, directionsDisplay9);
                  calculateAndDisplayRoute10(directionsService, directionsDisplay10);
           calculateAndDisplayRoute11(directionsService, directionsDisplay11);
            calculateAndDisplayRoute12(directionsService, directionsDisplay12);
             calculateAndDisplayRoute13(directionsService, directionsDisplay13);
              calculateAndDisplayRoute14(directionsService, directionsDisplay14);
               calculateAndDisplayRoute15(directionsService, directionsDisplay15);
                calculateAndDisplayRoute16(directionsService, directionsDisplay16);
                 calculateAndDisplayRoute17(directionsService, directionsDisplay17);
                  calculateAndDisplayRoute18(directionsService, directionsDisplay18);
                   calculateAndDisplayRoute19(directionsService, directionsDisplay19);
                    calculateAndDisplayRoute20(directionsService, directionsDisplay20);
        
        
       
      document.getElementById('prepinanie').addEventListener("click", function (e){
         

     poc=poc+1; 
      
      console.log(poc); 
      
      
      switch(poc){
          case 1:
              
              directionsDisplay20.setOptions({
                  polylineOptions: {
                  strokeColor: 'gray',
                  }
               });
              directionsDisplay20.setMap(map);
              document.getElementById("nazov").innerHTML = "Názov trasy: "+"<?php echo $Nazovs[0]; ?>"; 
              document.getElementById("autor").innerHTML = "Autor trasy: "+"<?php echo $Menos[0]; ?> <?php echo $Priezviskos[0]; ?>"; 
              document.getElementById("start").innerHTML = "Súradnice štartu: "+"<?php echo $Starts[0]; ?>"; 
              document.getElementById("ciel").innerHTML = "Súradnice cieľa: "+"<?php echo $Ciels[0]; ?>"; 
              document.getElementById("mod").innerHTML = "Mód trasy: "+"<?php echo $Mods[0]; ?>"; 
              document.getElementById("vytvorene").innerHTML = "Dátum vytvorenia trasy: "+"<?php echo $Vytvorenes[0]; ?>"; 
              directionsDisplay1.setOptions({
                  polylineOptions: {
                  strokeColor: 'blue'
                  }
               });
              directionsDisplay1.setMap(map); 
              break; 
           case 2:
              
              directionsDisplay1.setOptions({
                  polylineOptions: {
                  strokeColor: 'gray'
                  }
               });
              directionsDisplay1.setMap(map); 
              document.getElementById("nazov").innerHTML = "Názov trasy: "+"<?php echo $Nazovs[1]; ?>"; 
                      document.getElementById("autor").innerHTML = "Autor trasy: "+"<?php echo $Menos[1]; ?> <?php echo $Priezviskos[1]; ?>"; 
              document.getElementById("start").innerHTML = "Súradnice štartu: "+"<?php echo $Starts[1]; ?>"; 
              document.getElementById("ciel").innerHTML = "Súradnice cieľa: "+"<?php echo $Ciels[1]; ?>"; 
              document.getElementById("mod").innerHTML = "Mód trasy: "+"<?php echo $Mods[1]; ?>"; 
              document.getElementById("vytvorene").innerHTML = "Dátum vytvorenia trasy: "+"<?php echo $Vytvorenes[1]; ?>"; 
              directionsDisplay2.setOptions({
                  polylineOptions: {
                  strokeColor: 'blue'
                  }
               });
              directionsDisplay2.setMap(map);
              break; 
          case 3:
             
              directionsDisplay2.setOptions({
                  polylineOptions: {
                  strokeColor: 'gray'
                  }
               });
              directionsDisplay2.setMap(map); 
              document.getElementById("nazov").innerHTML = "Názov trasy: "+"<?php echo $Nazovs[2]; ?>"; 
                       document.getElementById("autor").innerHTML = "Autor trasy: "+"<?php echo $Menos[2]; ?> <?php echo $Priezviskos[2]; ?>"; 
              document.getElementById("start").innerHTML = "Súradnice štartu: "+"<?php echo $Starts[2]; ?>"; 
              document.getElementById("ciel").innerHTML = "Súradnice cieľa: "+"<?php echo $Ciels[2]; ?>"; 
              document.getElementById("mod").innerHTML = "Mód trasy: "+"<?php echo $Mods[2]; ?>"; 
              document.getElementById("vytvorene").innerHTML = "Dátum vytvorenia trasy: "+"<?php echo $Vytvorenes[2]; ?>"; 
               directionsDisplay3.setOptions({
                  polylineOptions: {
                  strokeColor: 'blue'
                  }
               });
              directionsDisplay3.setMap(map);
              break; 
           case 4:
              
              directionsDisplay3.setOptions({
                  polylineOptions: {
                  strokeColor: 'gray'
                  }
               });
              directionsDisplay3.setMap(map);
              document.getElementById("nazov").innerHTML = "Názov trasy: "+"<?php echo $Nazovs[3]; ?>"; 
                 document.getElementById("autor").innerHTML = "Autor trasy: "+"<?php echo $Menos[3]; ?> <?php echo $Priezviskos[3]; ?>"; 
              document.getElementById("start").innerHTML = "Súradnice štartu: "+"<?php echo $Starts[3]; ?>"; 
              document.getElementById("ciel").innerHTML = "Súradnice cieľa: "+"<?php echo $Ciels[3]; ?>"; 
              document.getElementById("mod").innerHTML = "Mód trasy: "+"<?php echo $Mods[3]; ?>"; 
              document.getElementById("vytvorene").innerHTML = "Dátum vytvorenia trasy: "+"<?php echo $Vytvorenes[3]; ?>"; 
              directionsDisplay4.setOptions({
                  polylineOptions: {
                  strokeColor: 'blue'
                  }
               });
              directionsDisplay4.setMap(map); 
              break; 
          case 5:
              
              directionsDisplay4.setOptions({
                  polylineOptions: {
                  strokeColor: 'gray'
                  }
               });
              directionsDisplay4.setMap(map); 
              document.getElementById("nazov").innerHTML = "Názov trasy: "+"<?php echo $Nazovs[4]; ?>"; 
              document.getElementById("autor").innerHTML = "Autor trasy: "+"<?php echo $Menos[4]; ?> <?php echo $Priezviskos[4]; ?>"; 
              document.getElementById("start").innerHTML = "Súradnice štartu: "+"<?php echo $Starts[4]; ?>"; 
              document.getElementById("ciel").innerHTML = "Súradnice cieľa: "+"<?php echo $Ciels[4]; ?>"; 
              document.getElementById("mod").innerHTML = "Mód trasy: "+"<?php echo $Mods[4]; ?>"; 
              document.getElementById("vytvorene").innerHTML = "Dátum vytvorenia trasy: "+"<?php echo $Vytvorenes[4]; ?>"; 
              directionsDisplay5.setOptions({
                  polylineOptions: {
                  strokeColor: 'blue'
                  }
               });
              directionsDisplay5.setMap(map);
              break; 
           case 6:
              
              directionsDisplay5.setOptions({
                  polylineOptions: {
                  strokeColor: 'gray'
                  }
               });
              directionsDisplay5.setMap(map);
              document.getElementById("nazov").innerHTML = "Názov trasy: "+"<?php echo $Nazovs[5]; ?>"; 
                       document.getElementById("autor").innerHTML = "Autor trasy: "+"<?php echo $Menos[5]; ?> <?php echo $Priezviskos[5]; ?>"; 
              document.getElementById("start").innerHTML = "Súradnice štartu: "+"<?php echo $Starts[5]; ?>"; 
              document.getElementById("ciel").innerHTML = "Súradnice cieľa: "+"<?php echo $Ciels[5]; ?>"; 
              document.getElementById("mod").innerHTML = "Mód trasy: "+"<?php echo $Mods[5]; ?>"; 
              document.getElementById("vytvorene").innerHTML = "Dátum vytvorenia trasy: "+"<?php echo $Vytvorenes[5]; ?>";  
              directionsDisplay6.setOptions({
                  polylineOptions: {
                  strokeColor: 'blue'
                  }
               });
              directionsDisplay6.setMap(map);
              break;     
          case 7:
            
              directionsDisplay6.setOptions({
                  polylineOptions: {
                  strokeColor: 'gray'
                  }
               });
              directionsDisplay6.setMap(map); 
              document.getElementById("nazov").innerHTML = "Názov trasy: "+"<?php echo $Nazovs[6]; ?>"; 
                       document.getElementById("autor").innerHTML = "Autor trasy: "+"<?php echo $Menos[6]; ?> <?php echo $Priezviskos[6]; ?>"; 
              document.getElementById("start").innerHTML = "Súradnice štartu: "+"<?php echo $Starts[6]; ?>"; 
              document.getElementById("ciel").innerHTML = "Súradnice cieľa: "+"<?php echo $Ciels[6]; ?>"; 
              document.getElementById("mod").innerHTML = "Mód trasy: "+"<?php echo $Mods[6]; ?>"; 
              document.getElementById("vytvorene").innerHTML = "Dátum vytvorenia trasy: "+"<?php echo $Vytvorenes[6]; ?>"; 
              directionsDisplay7.setOptions({
                  polylineOptions: {
                  strokeColor: 'blue'
                  }
               });
              directionsDisplay7.setMap(map);
              break; 
          case 8:
              
              directionsDisplay7.setOptions({
                  polylineOptions: {
                  strokeColor: 'gray'
                  }
               });
               document.getElementById("nazov").innerHTML = "Názov trasy: "+"<?php echo $Nazovs[7]; ?>"; 
         document.getElementById("autor").innerHTML = "Autor trasy: "+"<?php echo $Menos[7]; ?> <?php echo $Priezviskos[7]; ?>"; 
              document.getElementById("start").innerHTML = "Súradnice štartu: "+"<?php echo $Starts[7]; ?>"; 
              document.getElementById("ciel").innerHTML = "Súradnice cieľa: "+"<?php echo $Ciels[7]; ?>"; 
              document.getElementById("mod").innerHTML = "Mód trasy: "+"<?php echo $Mods[7]; ?>"; 
              document.getElementById("vytvorene").innerHTML = "Dátum vytvorenia trasy: "+"<?php echo $Vytvorenes[7]; ?>"; 
              directionsDisplay7.setMap(map); 
              directionsDisplay8.setOptions({
                  polylineOptions: {
                  strokeColor: 'blue'
                  }
               });
              directionsDisplay8.setMap(map);
              break;    
          case 9:
             
              directionsDisplay8.setOptions({
                  polylineOptions: {
                  strokeColor: 'gray'
                  }
               });
               document.getElementById("nazov").innerHTML = "Názov trasy: "+"<?php echo $Nazovs[8]; ?>"; 
                       document.getElementById("autor").innerHTML = "Autor trasy: "+"<?php echo $Menos[8]; ?> <?php echo $Priezviskos[8]; ?>";  
               document.getElementById("start").innerHTML = "Súradnice štartu: "+"<?php echo $Starts[8]; ?>"; 
              document.getElementById("ciel").innerHTML = "Súradnice cieľa: "+"<?php echo $Ciels[8]; ?>"; 
              document.getElementById("mod").innerHTML = "Mód trasy: "+"<?php echo $Mods[8]; ?>"; 
              document.getElementById("vytvorene").innerHTML = "Dátum vytvorenia trasy: "+"<?php echo $Vytvorenes[8]; ?>"; 
              directionsDisplay8.setMap(map); 
               directionsDisplay9.setOptions({
                  polylineOptions: {
                  strokeColor: 'blue'
                  }
               });
              directionsDisplay9.setMap(map);
              break; 
          case 10:
              
              directionsDisplay9.setOptions({
                  polylineOptions: {
                  strokeColor: 'gray'
                  }
               });
               document.getElementById("nazov").innerHTML = "Názov trasy: "+"<?php echo $Nazovs[9]; ?>"; 
                     document.getElementById("autor").innerHTML = "Autor trasy: "+"<?php echo $Menos[9]; ?> <?php echo $Priezviskos[9]; ?>"; 
              document.getElementById("start").innerHTML = "Súradnice štartu: "+"<?php echo $Starts[9]; ?>"; 
              document.getElementById("ciel").innerHTML = "Súradnice cieľa: "+"<?php echo $Ciels[9]; ?>"; 
              document.getElementById("mod").innerHTML = "Mód trasy: "+"<?php echo $Mods[9]; ?>"; 
              document.getElementById("vytvorene").innerHTML = "Dátum vytvorenia trasy: "+"<?php echo $Vytvorenes[9]; ?>"; 
              directionsDisplay9.setMap(map);
              directionsDisplay10.setOptions({
                  polylineOptions: {
                  strokeColor: 'blue'
                  }
               });
              directionsDisplay10.setMap(map); 
              break; 
              
           case 11:
              
              directionsDisplay10.setOptions({
                  polylineOptions: {
                  strokeColor: 'gray'
                  }
               });
               document.getElementById("nazov").innerHTML = "Názov trasy: "+"<?php echo $Nazovs[10]; ?>"; 
                 document.getElementById("autor").innerHTML = "Autor trasy: "+"<?php echo $Menos[10]; ?> <?php echo $Priezviskos[10]; ?>"; 
              document.getElementById("start").innerHTML = "Súradnice štartu: "+"<?php echo $Starts[10]; ?>"; 
              document.getElementById("ciel").innerHTML = "Súradnice cieľa: "+"<?php echo $Ciels[10]; ?>"; 
              document.getElementById("mod").innerHTML = "Mód trasy: "+"<?php echo $Mods[10]; ?>"; 
              document.getElementById("vytvorene").innerHTML = "Dátum vytvorenia trasy: "+"<?php echo $Vytvorenes[10]; ?>"; 
              directionsDisplay10.setMap(map);
              directionsDisplay11.setOptions({
                  polylineOptions: {
                  strokeColor: 'blue'
                  }
               });
              directionsDisplay11.setMap(map); 
              break;  
          case 12:
              
              directionsDisplay11.setOptions({
                  polylineOptions: {
                  strokeColor: 'gray'
                  }
               });
               document.getElementById("nazov").innerHTML = "Názov trasy: "+"<?php echo $Nazovs[11]; ?>"; 
                       document.getElementById("autor").innerHTML = "Autor trasy: "+"<?php echo $Menos[11]; ?> <?php echo $Priezviskos[11]; ?>"; 
              document.getElementById("start").innerHTML = "Súradnice štartu: "+"<?php echo $Starts[11]; ?>"; 
              document.getElementById("ciel").innerHTML = "Súradnice cieľa: "+"<?php echo $Ciels[11]; ?>"; 
              document.getElementById("mod").innerHTML = "Mód trasy: "+"<?php echo $Mods[11]; ?>"; 
              document.getElementById("vytvorene").innerHTML = "Dátum vytvorenia trasy: "+"<?php echo $Vytvorenes[11]; ?>"; 
              directionsDisplay11.setMap(map);
              directionsDisplay12.setOptions({
                  polylineOptions: {
                  strokeColor: 'blue'
                  }
               });
              directionsDisplay12.setMap(map); 
              break;   
          case 13:
              
              directionsDisplay12.setOptions({
                  polylineOptions: {
                  strokeColor: 'gray'
                  }
               });
               document.getElementById("nazov").innerHTML = "Názov trasy: "+"<?php echo $Nazovs[12]; ?>"; 
                document.getElementById("autor").innerHTML = "Autor trasy: "+"<?php echo $Menos[12]; ?> <?php echo $Priezviskos[12]; ?>"; 
              document.getElementById("start").innerHTML = "Súradnice štartu: "+"<?php echo $Starts[12]; ?>"; 
              document.getElementById("ciel").innerHTML = "Súradnice cieľa: "+"<?php echo $Ciels[12]; ?>";  
              document.getElementById("mod").innerHTML = "Mód trasy: "+"<?php echo $Mods[12]; ?>"; 
              document.getElementById("vytvorene").innerHTML = "Dátum vytvorenia trasy: "+"<?php echo $Vytvorenes[12]; ?>"; 
              directionsDisplay12.setMap(map);
              directionsDisplay13.setOptions({
                  polylineOptions: {
                  strokeColor: 'blue'
                  }
               });
              directionsDisplay13.setMap(map); 
              break;  
          case 14:
             
              directionsDisplay13.setOptions({
                  polylineOptions: {
                  strokeColor: 'gray'
                  }
               });
               document.getElementById("nazov").innerHTML = "Názov trasy: "+"<?php echo $Nazovs[13]; ?>"; 
                       document.getElementById("autor").innerHTML = "Autor trasy: "+"<?php echo $Menos[13]; ?> <?php echo $Priezviskos[13]; ?>"; 
              document.getElementById("start").innerHTML = "Súradnice štartu: "+"<?php echo $Starts[13]; ?>"; 
              document.getElementById("ciel").innerHTML = "Súradnice cieľa: "+"<?php echo $Ciels[13]; ?>";  
              document.getElementById("mod").innerHTML = "Mód trasy: "+"<?php echo $Mods[13]; ?>"; 
              document.getElementById("vytvorene").innerHTML = "Dátum vytvorenia trasy: "+"<?php echo $Vytvorenes[13]; ?>"; 
              directionsDisplay13.setMap(map); 
               directionsDisplay14.setOptions({
                  polylineOptions: {
                  strokeColor: 'blue'
                  }
               });
              directionsDisplay14.setMap(map);
              break;  
        case 15:
              
              directionsDisplay14.setOptions({
                  polylineOptions: {
                  strokeColor: 'gray'
                  }
               });
               document.getElementById("nazov").innerHTML = "Názov trasy: "+"<?php echo $Nazovs[14]; ?>"; 
                       document.getElementById("autor").innerHTML = "Autor trasy: "+"<?php echo $Menos[14]; ?> <?php echo $Priezviskos[14]; ?>"; 
              document.getElementById("start").innerHTML = "Súradnice štartu: "+"<?php echo $Starts[14]; ?>"; 
              document.getElementById("ciel").innerHTML = "Súradnice cieľa: "+"<?php echo $Ciels[14]; ?>"; 
              document.getElementById("mod").innerHTML = "Mód trasy: "+"<?php echo $Mods[14]; ?>"; 
              document.getElementById("vytvorene").innerHTML = "Dátum vytvorenia trasy: "+"<?php echo $Vytvorenes[14]; ?>"; 
              directionsDisplay14.setMap(map);
              directionsDisplay15.setOptions({
                  polylineOptions: {
                  strokeColor: 'blue'
                  }
               });
              directionsDisplay15.setMap(map); 
              break; 
        case 16:
             
              directionsDisplay15.setOptions({
                  polylineOptions: {
                  strokeColor: 'gray'
                  }
               });
               document.getElementById("nazov").innerHTML = "Názov trasy: "+"<?php echo $Nazovs[15]; ?>"; 
                       document.getElementById("autor").innerHTML = "Autor trasy: "+"<?php echo $Menos[15]; ?> <?php echo $Priezviskos[15]; ?>";  
              document.getElementById("start").innerHTML = "Súradnice štartu: "+"<?php echo $Starts[15]; ?>"; 
              document.getElementById("ciel").innerHTML = "Súradnice cieľa: "+"<?php echo $Ciels[15]; ?>"; 
              document.getElementById("mod").innerHTML = "Mód trasy: "+"<?php echo $Mods[15]; ?>"; 
              document.getElementById("vytvorene").innerHTML = "Dátum vytvorenia trasy: "+"<?php echo $Vytvorenes[15]; ?>"; 
              directionsDisplay15.setMap(map); 
               directionsDisplay16.setOptions({
                  polylineOptions: {
                  strokeColor: 'blue'
                  }
               });
              directionsDisplay16.setMap(map);
              break;
        case 17:
              
              directionsDisplay16.setOptions({
                  polylineOptions: {
                  strokeColor: 'gray'
                  }
               });
               document.getElementById("nazov").innerHTML = "Názov trasy: "+"<?php echo $Nazovs[16]; ?>"; 
                       document.getElementById("autor").innerHTML = "Autor trasy: "+"<?php echo $Menos[16]; ?> <?php echo $Priezviskos[16]; ?>"; 
              document.getElementById("start").innerHTML = "Súradnice štartu: "+"<?php echo $Starts[16]; ?>"; 
              document.getElementById("ciel").innerHTML = "Súradnice cieľa: "+"<?php echo $Ciels[16]; ?>"; 
              document.getElementById("mod").innerHTML = "Mód trasy: "+"<?php echo $Mods[16]; ?>"; 
              document.getElementById("vytvorene").innerHTML = "Dátum vytvorenia trasy: "+"<?php echo $Vytvorenes[16]; ?>"; 
              directionsDisplay16.setMap(map); 
              directionsDisplay17.setOptions({
                  polylineOptions: {
                  strokeColor: 'blue'
                  }
               });
              directionsDisplay17.setMap(map);
              break;
          case 18:
              
              directionsDisplay17.setOptions({
                  polylineOptions: {
                  strokeColor: 'gray'
                  }
               });
               document.getElementById("nazov").innerHTML = "Názov trasy: "+"<?php echo $Nazovs[17]; ?>"; 
                     document.getElementById("autor").innerHTML = "Autor trasy: "+"<?php echo $Menos[17]; ?> <?php echo $Priezviskos[17]; ?>"; 
              document.getElementById("start").innerHTML = "Súradnice štartu: "+"<?php echo $Starts[17]; ?>"; 
              document.getElementById("ciel").innerHTML = "Súradnice cieľa: "+"<?php echo $Ciels[17]; ?>"; 
              document.getElementById("mod").innerHTML = "Mód trasy: "+"<?php echo $Mods[17]; ?>"; 
              document.getElementById("vytvorene").innerHTML = "Dátum vytvorenia trasy: "+"<?php echo $Vytvorenes[17]; ?>"; 
              directionsDisplay17.setMap(map);
              directionsDisplay18.setOptions({
                  polylineOptions: {
                  strokeColor: 'blue'
                  }
               });
              directionsDisplay18.setMap(map); 
              break; 
          case 19:
              
              directionsDisplay18.setOptions({
                  polylineOptions: {
                  strokeColor: 'gray'
                  }
               });
               document.getElementById("nazov").innerHTML = "Názov trasy: "+"<?php echo $Nazovs[18]; ?>"; 
                     document.getElementById("autor").innerHTML = "Autor trasy: "+"<?php echo $Menos[18]; ?> <?php echo $Priezviskos[18]; ?>"; 
              document.getElementById("start").innerHTML = "Súradnice štartu: "+"<?php echo $Starts[18]; ?>"; 
              document.getElementById("ciel").innerHTML = "Súradnice cieľa: "+"<?php echo $Ciels[18]; ?>"; 
              document.getElementById("mod").innerHTML = "Mód trasy: "+"<?php echo $Mods[18]; ?>"; 
              document.getElementById("vytvorene").innerHTML = "Dátum vytvorenia trasy: "+"<?php echo $Vytvorenes[18]; ?>"; 
              directionsDisplay18.setMap(map); 
              directionsDisplay19.setOptions({
                  polylineOptions: {
                  strokeColor: 'blue'
                  }
               });
              directionsDisplay19.setMap(map);
              break; 
          case 20:
              
              directionsDisplay19.setOptions({
                  polylineOptions: {
                  strokeColor: 'gray'
                  }
               });
               document.getElementById("nazov").innerHTML = "Názov trasy: "+"<?php echo $Nazovs[19]; ?>"; 
                      document.getElementById("autor").innerHTML = "Autor trasy: "+"<?php echo $Menos[19]; ?> <?php echo $Priezviskos[19]; ?>";  
              document.getElementById("start").innerHTML = "Súradnice štartu: "+"<?php echo $Starts[19]; ?>"; 
              document.getElementById("ciel").innerHTML = "Súradnice cieľa: "+"<?php echo $Ciels[19]; ?>"; 
              document.getElementById("mod").innerHTML = "Mód trasy: "+"<?php echo $Mods[19]; ?>"; 
              document.getElementById("vytvorene").innerHTML = "Dátum vytvorenia trasy: "+"<?php echo $Vytvorenes[19]; ?>"; 
              directionsDisplay19.setMap(map); 
              directionsDisplay20.setOptions({
                  polylineOptions: {
                  strokeColor: 'blue'
                  }
               });
              directionsDisplay20.setMap(map);
              break; 
          //case Count database:  php refresh
          
      }
         console.log(<?php echo $i; ?>);
        if (poc><?php echo $i; ?>){
          poc=0;
          location.reload();
          }
   });        
      
      
     }  
  
   
   
   
      function calculateAndDisplayRoute1(directionsService, directionsDisplay1) {
        directionsService.route({
           origin: "<?php echo $Starts[0]; ?>",
          destination: "<?php echo $Ciels[0]; ?>",
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay1.setDirections(response);
          } 
        });
      }  
      
         function calculateAndDisplayRoute2(directionsService, directionsDisplay2) {
        directionsService.route({
          origin: "<?php echo $Starts[1]; ?>",
          destination: "<?php echo $Ciels[1]; ?>",
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay2.setDirections(response);
          } 
        });
      }
      
               function calculateAndDisplayRoute3(directionsService, directionsDisplay3) {
        directionsService.route({
        origin: "<?php echo $Starts[2]; ?>",
          destination: "<?php echo $Ciels[2]; ?>",
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay3.setDirections(response);
          } 
        });
      }
      
               function calculateAndDisplayRoute4(directionsService, directionsDisplay4) {
        directionsService.route({
          origin: "<?php echo $Starts[3]; ?>",
          destination: "<?php echo $Ciels[3]; ?>",
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay4.setDirections(response);
          } 
        });
      }
      
               function calculateAndDisplayRoute5(directionsService, directionsDisplay5) {
        directionsService.route({
          origin: "<?php echo $Starts[4]; ?>",
          destination: "<?php echo $Ciels[4]; ?>",
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay5.setDirections(response);
          } 
        });
      }
      
               function calculateAndDisplayRoute6(directionsService, directionsDisplay6) {
        directionsService.route({
         origin: "<?php echo $Starts[5]; ?>",
          destination: "<?php echo $Ciels[5]; ?>",
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay6.setDirections(response);
          } 
        });
      }
      
              function calculateAndDisplayRoute7(directionsService, directionsDisplay7) {
        directionsService.route({
        origin: "<?php echo $Starts[6]; ?>",
          destination: "<?php echo $Ciels[6]; ?>",
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay7.setDirections(response);
          } 
        });
      }
      
              function calculateAndDisplayRoute8(directionsService, directionsDisplay8) {
        directionsService.route({
          origin: "<?php echo $Starts[7]; ?>",
          destination: "<?php echo $Ciels[7]; ?>",
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay8.setDirections(response);
          } 
        });
      }
      
              function calculateAndDisplayRoute9(directionsService, directionsDisplay9) {
        directionsService.route({
         origin: "<?php echo $Starts[8]; ?>",
          destination: "<?php echo $Ciels[8]; ?>",
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay9.setDirections(response);
          } 
        });
      }
      
              function calculateAndDisplayRoute10(directionsService, directionsDisplay10) {
        directionsService.route({
         origin: "<?php echo $Starts[9]; ?>",
          destination: "<?php echo $Ciels[9]; ?>",
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay10.setDirections(response);
          } 
        });
      }
      
      
            function calculateAndDisplayRoute11(directionsService, directionsDisplay11) {
        directionsService.route({
          origin: "<?php echo $Starts[10]; ?>",
          destination: "<?php echo $Ciels[10]; ?>",
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay11.setDirections(response);
          } 
        });
      }
      
         function calculateAndDisplayRoute12(directionsService, directionsDisplay12) {
        directionsService.route({
           origin: "<?php echo $Starts[11]; ?>",
          destination: "<?php echo $Ciels[11]; ?>",
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay12.setDirections(response);
          } 
        });
      }
      
               function calculateAndDisplayRoute13(directionsService, directionsDisplay13) {
        directionsService.route({
           origin: "<?php echo $Starts[12]; ?>",
          destination: "<?php echo $Ciels[12]; ?>",
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay13.setDirections(response);
          } 
        });
      }
      
               function calculateAndDisplayRoute14(directionsService, directionsDisplay14) {
        directionsService.route({
           origin: "<?php echo $Starts[13]; ?>",
          destination: "<?php echo $Ciels[13]; ?>",
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay14.setDirections(response);
          } 
        });
      }
      
               function calculateAndDisplayRoute15(directionsService, directionsDisplay15) {
        directionsService.route({
           origin: "<?php echo $Starts[14]; ?>",
          destination: "<?php echo $Ciels[14]; ?>",
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay15.setDirections(response);
          } 
        });
      }
      
               function calculateAndDisplayRoute16(directionsService, directionsDisplay16) {
        directionsService.route({
         origin: "<?php echo $Starts[15]; ?>",
          destination: "<?php echo $Ciels[15]; ?>",
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay16.setDirections(response);
          } 
        });
      }
      
              function calculateAndDisplayRoute17(directionsService, directionsDisplay17) {
        directionsService.route({
           origin: "<?php echo $Starts[16]; ?>",
          destination: "<?php echo $Ciels[16]; ?>",
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay17.setDirections(response);
          } 
        });
      }
      
              function calculateAndDisplayRoute18(directionsService, directionsDisplay18) {
        directionsService.route({
           origin: "<?php echo $Starts[17]; ?>",
          destination: "<?php echo $Ciels[17]; ?>",
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay18.setDirections(response);
          } 
        });
      }
      
              function calculateAndDisplayRoute19(directionsService, directionsDisplay19) {
        directionsService.route({
           origin: "<?php echo $Starts[18]; ?>",
          destination: "<?php echo $Ciels[18]; ?>",
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay19.setDirections(response);
          } 
        });
      }
      
              function calculateAndDisplayRoute20(directionsService, directionsDisplay20) {
        directionsService.route({
            origin: "<?php echo $Starts[19]; ?>",
          destination: "<?php echo $Ciels[19]; ?>",
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay20.setDirections(response);
          } 
        });
      }
    </script>
 <script async defer
 src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBg-sSzElcKO4xdcLqyOXE4A2cLpMAMFSY&callback=initMap">
 
    </script>   
     
   
  </body>
</html>