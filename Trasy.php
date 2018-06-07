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
       #zobraz {
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
         <br><a id="zobraz" href="AdminTabulka.php?sort=id">Späť na tabuľku všetkých trás<a>
       <p id="vytvorene"></p>
   <div id="prepinanie">
      
<img src="next.png"  height="60" width="120">
   </div>
     <div id="myDIV1"></div>
    

     <div id="myDIV3"></div>
    <div id="map"></div>
    
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
      



  $sql2 = "SELECT a.id, a.nazov,  b.start, b.ciel, b.zaciatok, b.koniec, b.pridane from trasa a join cvicenie b on a.id=b.trasa_id";
  $result2 = $conn->query($sql2);
    $IdTrasy=array();
    $NazovTrasy=array();
   //$StartTrasy=array();
   // $CielTrasy=array();
     $StartCvicenia=array();
      $CielCvicenia=array();
        $CasZaciatku=array();
          $CasKonca=array();
        $CasPridania=array();
    $k=0;    
  if ($result2->num_rows > 0) {
    // output data of each row
    while($row2 = $result2->fetch_assoc()) {
        $IdTrasy[$k]=$row2["id"];
      $NazovTrasy[$k]=$row2["nazov"];
   //$StartTrasy[$k]=$row2["start1"];
  // $CielTrasy[$k]=$row2["ciel1"];
     $StartCvicenia[$k]=$row2["start"];
      $CielCvicenia[$k]=$row2["ciel"];
      $CasZaciatku[$k]=$row2["zaciatok"];
          $CasKonca[$k]=$row2["koniec"];
        $CasPridania[$k]=$row2["pridane"];
      
    $k=$k+1;    
    }
} else {
    echo "0 results";
}
 
 for($o=$k;$o<20;$o++){
   
          $IdTrasy[$o]="";
      $NazovTrasy[$o]="";
  // $StartTrasy[$j]="";
   // $CielTrasy[$j]="";
     $StartCvicenia[$o]="";
      $CielCvicenia[$o]="";
      $CasZaciatku[$o]="";
          $CasKonca[$o]="";
        $CasPridania[$o]="";

} 
  
  
 $IDtrasy=$_GET['trasa'];

$conn->close();
    ?>
    
    <script>
          var poc=0;
          
           var poc2=0;
           var poc3=0;
           var poc4=0;
           var poc5=0;
           var poc6=0;
           var poc7=0;
           var poc8=0;
           var poc9=0;
           var poc10=0;
           var poc11=0;
           var poc12=0;
           var poc13=0;
           var poc14=0;
           var poc15=0;
           var poc16=0;
           var poc17=0;
           var poc18=0;
           var poc19=0;
           var poc20=0;
           var poc21=0;
           var poc22=0;
           var poc23=0;
           
           if ("<?php echo $IDtrasy; ?>">0){                  
             poc=<?php echo $IDtrasy; ?>-1;
             poc2=<?php echo $IDtrasy; ?>-1;
             }                          
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
          center: {lat: 18, lng: 48}
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

     poc2=poc2+1;
     poc=poc+1; 
     if (poc><?php echo $i; ?>){
          
          window.location.href = 'Trasy.php'; 
          } 
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
               
              var btn1 = document.createElement("button"); 
              btn1.setAttribute('onclick','rob();');
           
              var t = document.createTextNode("Zobraz odjazdeny usek trasy "+"<?php echo $Nazovs[0]; ?>");
              btn1.appendChild(t);
              document.getElementById("myDIV1").appendChild(btn1);
              
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
              if (document.getElementById("myDIV1").hasChildNodes()) {
                             document.getElementById("myDIV1").removeChild(document.getElementById("myDIV1").childNodes[0]);
              }
             
              var btn1 = document.createElement("button");
              btn1.setAttribute('onclick','rob();'); 
              var t = document.createTextNode("Zobraz odjazdeny usek trasy "+"<?php echo $Nazovs[1]; ?>");
              btn1.appendChild(t);
               document.getElementById("myDIV1").appendChild(btn1);
              
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
             if (document.getElementById("myDIV1").hasChildNodes()) {
                             document.getElementById("myDIV1").removeChild(document.getElementById("myDIV1").childNodes[0]);
              }
              var btn1 = document.createElement("button"); 
              btn1.setAttribute('onclick','rob();');
              var t = document.createTextNode("Zobraz odjazdeny usek trasy "+"<?php echo $Nazovs[2]; ?>");
              btn1.appendChild(t);
               document.getElementById("myDIV1").appendChild(btn1);
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
            if (document.getElementById("myDIV1").hasChildNodes()) {
                             document.getElementById("myDIV1").removeChild(document.getElementById("myDIV1").childNodes[0]);
              }
              var btn1 = document.createElement("button"); 
              btn1.setAttribute('onclick','rob();');
              var t = document.createTextNode("Zobraz odjazdeny usek trasy "+"<?php echo $Nazovs[3]; ?>");
              btn1.appendChild(t);
               document.getElementById("myDIV1").appendChild(btn1);
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
              
              if (document.getElementById("myDIV1").hasChildNodes()) {
                             document.getElementById("myDIV1").removeChild(document.getElementById("myDIV1").childNodes[0]);
              }
              var btn1 = document.createElement("button"); 
              btn1.setAttribute('onclick','rob();');
              var t = document.createTextNode("Zobraz odjazdeny usek trasy "+"<?php echo $Nazovs[4]; ?>");
              btn1.appendChild(t);
               document.getElementById("myDIV1").appendChild(btn1);
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
              if (document.getElementById("myDIV1").hasChildNodes()) {
                             document.getElementById("myDIV1").removeChild(document.getElementById("myDIV1").childNodes[0]);
              }
              var btn1 = document.createElement("button"); 
              btn1.setAttribute('onclick','rob();');
              var t = document.createTextNode("Zobraz odjazdeny usek trasy "+"<?php echo $Nazovs[5]; ?>");
              btn1.appendChild(t);
               document.getElementById("myDIV1").appendChild(btn1);
            
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
              if (document.getElementById("myDIV1").hasChildNodes()) {
                             document.getElementById("myDIV1").removeChild(document.getElementById("myDIV1").childNodes[0]);
              }
              var btn1 = document.createElement("button"); 
              btn1.setAttribute('onclick','rob();');
              var t = document.createTextNode("Zobraz odjazdeny usek trasy "+"<?php echo $Nazovs[6]; ?>");
              btn1.appendChild(t);
               document.getElementById("myDIV1").appendChild(btn1);
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
              if (document.getElementById("myDIV1").hasChildNodes()) {
                             document.getElementById("myDIV1").removeChild(document.getElementById("myDIV1").childNodes[0]);
              }
              var btn1 = document.createElement("button"); 
              btn1.setAttribute('onclick','rob();');
              var t = document.createTextNode("Zobraz odjazdeny usek trasy "+"<?php echo $Nazovs[7]; ?>");
              btn1.appendChild(t);
               document.getElementById("myDIV1").appendChild(btn1);
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
              if (document.getElementById("myDIV1").hasChildNodes()) {
                             document.getElementById("myDIV1").removeChild(document.getElementById("myDIV1").childNodes[0]);
              }
              var btn1 = document.createElement("button"); 
              btn1.setAttribute('onclick','rob();');
              var t = document.createTextNode("Zobraz odjazdeny usek trasy "+"<?php echo $Nazovs[8]; ?>");
              btn1.appendChild(t);
               document.getElementById("myDIV1").appendChild(btn1);
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
             if (document.getElementById("myDIV1").hasChildNodes()) {
                             document.getElementById("myDIV1").removeChild(document.getElementById("myDIV1").childNodes[0]);
              }
              var btn1 = document.createElement("button"); 
              btn1.setAttribute('onclick','rob();');
              var t = document.createTextNode("Zobraz odjazdeny usek trasy "+"<?php echo $Nazovs[9]; ?>");
              btn1.appendChild(t);
               document.getElementById("myDIV1").appendChild(btn1);
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
              if (document.getElementById("myDIV1").hasChildNodes()) {
                             document.getElementById("myDIV1").removeChild(document.getElementById("myDIV1").childNodes[0]);
              }
              var btn1 = document.createElement("button"); 
              var t = document.createTextNode("Zobraz odjazdeny usek trasy "+"<?php echo $Nazovs[10]; ?>");
              btn1.appendChild(t);
              btn1.setAttribute('onclick','rob();');
               document.getElementById("myDIV1").appendChild(btn1);
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
               if (document.getElementById("myDIV1").hasChildNodes()) {
                             document.getElementById("myDIV1").removeChild(document.getElementById("myDIV1").childNodes[0]);
              }
              var btn1 = document.createElement("button"); 
              btn1.setAttribute('onclick','rob();');
              var t = document.createTextNode("Zobraz odjazdeny usek trasy "+"<?php echo $Nazovs[11]; ?>");
              btn1.appendChild(t);
               document.getElementById("myDIV1").appendChild(btn1);
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
               if (document.getElementById("myDIV1").hasChildNodes()) {
                             document.getElementById("myDIV1").removeChild(document.getElementById("myDIV1").childNodes[0]);
              }
              var btn1 = document.createElement("button"); 
              btn1.setAttribute('onclick','rob();');
              var t = document.createTextNode("Zobraz odjazdeny usek trasy "+"<?php echo $Nazovs[12]; ?>");
              btn1.appendChild(t);
               document.getElementById("myDIV1").appendChild(btn1);
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
               if (document.getElementById("myDIV1").hasChildNodes()) {
                             document.getElementById("myDIV1").removeChild(document.getElementById("myDIV1").childNodes[0]);
              }
              var btn1 = document.createElement("button"); 
              btn1.setAttribute('onclick','rob();');
              var t = document.createTextNode("Zobraz odjazdeny usek trasy "+"<?php echo $Nazovs[13]; ?>");
              btn1.appendChild(t);
               document.getElementById("myDIV1").appendChild(btn1);
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
               if (document.getElementById("myDIV1").hasChildNodes()) {
                             document.getElementById("myDIV1").removeChild(document.getElementById("myDIV1").childNodes[0]);
              }
              var btn1 = document.createElement("button"); 
              btn1.setAttribute('onclick','rob();');
              var t = document.createTextNode("Zobraz odjazdeny usek trasy "+"<?php echo $Nazovs[14]; ?>");
              btn1.appendChild(t);
               document.getElementById("myDIV1").appendChild(btn1);
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
               if (document.getElementById("myDIV1").hasChildNodes()) {
                             document.getElementById("myDIV1").removeChild(document.getElementById("myDIV1").childNodes[0]);
              }
              var btn1 = document.createElement("button"); 
              btn1.setAttribute('onclick','rob();');
              var t = document.createTextNode("Zobraz odjazdeny usek trasy "+"<?php echo $Nazovs[15]; ?>");
              btn1.appendChild(t);
               document.getElementById("myDIV1").appendChild(btn1);
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
               if (document.getElementById("myDIV1").hasChildNodes()) {
                             document.getElementById("myDIV1").removeChild(document.getElementById("myDIV1").childNodes[0]);
              }
              var btn1 = document.createElement("button");
              btn1.setAttribute('onclick','rob();'); 
              var t = document.createTextNode("Zobraz odjazdeny usek trasy "+"<?php echo $Nazovs[16]; ?>");
              btn1.appendChild(t);
               document.getElementById("myDIV1").appendChild(btn1);
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
               if (document.getElementById("myDIV1").hasChildNodes()) {
                             document.getElementById("myDIV1").removeChild(document.getElementById("myDIV1").childNodes[0]);
              }
              var btn1 = document.createElement("button"); 
              btn1.setAttribute('onclick','rob();');
              var t = document.createTextNode("Zobraz odjazdeny usek trasy "+"<?php echo $Nazovs[17]; ?>");
              btn1.appendChild(t);
               document.getElementById("myDIV1").appendChild(btn1);
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
             if (document.getElementById("myDIV1").hasChildNodes()) {
                             document.getElementById("myDIV1").removeChild(document.getElementById("myDIV1").childNodes[0]);
              }
              var btn1 = document.createElement("button");
              btn1.setAttribute('onclick','rob();'); 
              var t = document.createTextNode("Zobraz odjazdeny usek trasy "+"<?php echo $Nazovs[18]; ?>");
              btn1.appendChild(t);
               document.getElementById("myDIV1").appendChild(btn1);
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
               if (document.getElementById("myDIV1").hasChildNodes()) {
                             document.getElementById("myDIV1").removeChild(document.getElementById("myDIV1").childNodes[0]);
              }
              var btn1 = document.createElement("button"); 
              btn1.setAttribute('onclick','rob();');
              var t = document.createTextNode("Zobraz odjazdeny usek trasy "+"<?php echo $Nazovs[19]; ?>");
              btn1.appendChild(t);
               document.getElementById("myDIV1").appendChild(btn1);
              directionsDisplay19.setMap(map); 
              directionsDisplay20.setOptions({
                  polylineOptions: {
                  strokeColor: 'blue'
                  }
               });
              directionsDisplay20.setMap(map);
              break; 
          
          
      }
         console.log(<?php echo $i; ?>);
        
   });        
      
      
     }  
          
       function rob(){
           
          
          var directionsService = new google.maps.DirectionsService;   
        var directionsDisplay = new google.maps.DirectionsRenderer({
    polylineOptions: {
      strokeColor: "blue"
    }
  });  
  
          var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 6,
          center: {lat: 48, lng: 18}
        });
        switch(poc2){
         case 1:
             directionsDisplay1=  directionsDisplay;
             directionsDisplay1.setOptions({
                  polylineOptions: {
                  strokeColor: 'red',
                  }
               });
            
            
            directionsDisplay1.setMap(map);
            calculateAndDisplayRoute1(directionsService, directionsDisplay1); 
            break;
          case 2:
            directionsDisplay2=  directionsDisplay;
            directionsDisplay2.setOptions({
                  polylineOptions: {
                  strokeColor: 'red',
                  }
               });
            directionsDisplay2.setMap(map);
            calculateAndDisplayRoute2(directionsService, directionsDisplay2);
            break;
        case 3:
            directionsDisplay3=  directionsDisplay;
            directionsDisplay3.setOptions({
                  polylineOptions: {
                  strokeColor: 'red',
                  }
               });
            directionsDisplay3.setMap(map);
            calculateAndDisplayRoute3(directionsService, directionsDisplay3);
            break;
        case 4:
            directionsDisplay4=  directionsDisplay;
            directionsDisplay4.setOptions({
                  polylineOptions: {
                  strokeColor: 'red',
                  }
               });
            directionsDisplay4.setMap(map);
            calculateAndDisplayRoute4(directionsService, directionsDisplay4);
            break; 
         case 5:
            directionsDisplay5=  directionsDisplay;
            directionsDisplay5.setOptions({
                  polylineOptions: {
                  strokeColor: 'red',
                  }
               });
            directionsDisplay5.setMap(map);
            calculateAndDisplayRoute5(directionsService, directionsDisplay5);
            break; 
           case 6:
            directionsDisplay6=  directionsDisplay;
            directionsDisplay6.setOptions({
                  polylineOptions: {
                  strokeColor: 'red',
                  }
               });
            directionsDisplay6.setMap(map);
            calculateAndDisplayRoute6(directionsService, directionsDisplay6);
            break;
          case 7:
            directionsDisplay7=  directionsDisplay;
            directionsDisplay7.setOptions({
                  polylineOptions: {
                  strokeColor: 'red',
                  }
               });
            directionsDisplay7.setMap(map);
            calculateAndDisplayRoute7(directionsService, directionsDisplay7);
            break;
        case 8:
            directionsDisplay8=  directionsDisplay;
            directionsDisplay8.setOptions({
                  polylineOptions: {
                  strokeColor: 'red',
                  }
               });
            directionsDisplay8.setMap(map);
            calculateAndDisplayRoute8(directionsService, directionsDisplay8);
            break;
        case 9:
            directionsDisplay9=  directionsDisplay;
            directionsDisplay9.setOptions({
                  polylineOptions: {
                  strokeColor: 'red',
                  }
               });
            directionsDisplay9.setMap(map);
            calculateAndDisplayRoute9(directionsService, directionsDisplay9);
            break; 
         case 10:
            directionsDisplay10=  directionsDisplay;
            directionsDisplay10.setOptions({
                  polylineOptions: {
                  strokeColor: 'red',
                  }
               });
            directionsDisplay10.setMap(map);
            calculateAndDisplayRoute10(directionsService, directionsDisplay10);
            break; 
          case 11:
            directionsDisplay11=  directionsDisplay;
            directionsDisplay11.setOptions({
                  polylineOptions: {
                  strokeColor: 'red',
                  }
               });
            directionsDisplay11.setMap(map);
            calculateAndDisplayRoute11(directionsService, directionsDisplay11);
            break;
          case 12:
            directionsDisplay12=  directionsDisplay;
            directionsDisplay12.setOptions({
                  polylineOptions: {
                  strokeColor: 'red',
                  }
               });
            directionsDisplay12.setMap(map);
            calculateAndDisplayRoute12(directionsService, directionsDisplay12);
            break;
        case 13:
            directionsDisplay13=  directionsDisplay;
            directionsDisplay13.setOptions({
                  polylineOptions: {
                  strokeColor: 'red',
                  }
               });
            directionsDisplay13.setMap(map);
            calculateAndDisplayRoute13(directionsService, directionsDisplay13);
            break;
        case 14:
            directionsDisplay14=  directionsDisplay;
            directionsDisplay14.setOptions({
                  polylineOptions: {
                  strokeColor: 'red',
                  }
               });
            directionsDisplay14.setMap(map);
            calculateAndDisplayRoute14(directionsService, directionsDisplay14);
            break; 
         case 15:
            directionsDisplay15=  directionsDisplay;
            directionsDisplay15.setOptions({
                  polylineOptions: {
                  strokeColor: 'red',
                  }
               });
            directionsDisplay15.setMap(map);
            calculateAndDisplayRoute15(directionsService, directionsDisplay15);
            break; 
           case 16:
            directionsDisplay16=  directionsDisplay;
            directionsDisplay16.setOptions({
                  polylineOptions: {
                  strokeColor: 'red',
                  }
               });
            directionsDisplay16.setMap(map);
            calculateAndDisplayRoute16(directionsService, directionsDisplay16);
            break;
          case 17:
            directionsDisplay17=  directionsDisplay;
            directionsDisplay17.setOptions({
                  polylineOptions: {
                  strokeColor: 'red',
                  }
               });
            directionsDisplay17.setMap(map);
            calculateAndDisplayRoute17(directionsService, directionsDisplay17);
            break;
        case 18:
            directionsDisplay18=  directionsDisplay;
            directionsDisplay18.setOptions({
                  polylineOptions: {
                  strokeColor: 'red',
                  }
               });
            directionsDisplay18.setMap(map);
            calculateAndDisplayRoute18(directionsService, directionsDisplay18);
            break;
        case 19:
            directionsDisplay19=  directionsDisplay;
            directionsDisplay19.setOptions({
                  polylineOptions: {
                  strokeColor: 'red',
                  }
               });
            directionsDisplay19.setMap(map);
            calculateAndDisplayRoute19(directionsService, directionsDisplay19);
            break; 
         case 20:
            directionsDisplay20=  directionsDisplay;
            directionsDisplay20.setOptions({
                  polylineOptions: {
                  strokeColor: 'red',
                  }
               });
            directionsDisplay20.setMap(map);
            calculateAndDisplayRoute20(directionsService, directionsDisplay20);
            break;      
              }
               
              var btn2 = document.createElement("button"); 
              var t = document.createTextNode("Naspäť na vsetky trasy");
              btn2.setAttribute('onclick','spat();');
              btn2.appendChild(t);
               document.getElementById("myDIV1").appendChild(btn2);
              document.getElementById("myDIV1").removeChild(document.getElementById("myDIV1").childNodes[0]);
              
              
              }
   
      function spat(){
      
      document.getElementById("myDIV1").removeChild(document.getElementById("myDIV1").childNodes[0]);
               poc3=0;
           poc4=0;
           poc5=0;
           poc6=0;
           poc7=0;
           poc8=0;
           poc9=0;
           poc10=0;
           poc11=0;
           poc12=0;
           poc13=0;
           poc14=0;
           poc15=0;
           poc16=0;
           poc17=0;
           poc18=0;
           poc19=0;
           poc20=0;
           poc21=0;
           poc22=0;
           poc23=0;
            poc=0;
             poc2=0; 
               
                  window.location.href = 'Trasy.php';                        
                   
             
             
      }
   
   
      function calculateAndDisplayRoute1(directionsService, directionsDisplay1) {
      poc3=poc3+1;
           if(poc3==1){
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
       
             if(poc3==2){
        directionsService.route({
           origin: "<?php echo $Starts[0]; ?>",
     
           waypoints: [{location: "<?php for ($u=0;$u<$k;$u++){ if ($IdTrasy[$u]==1){ echo $CielCvicenia[$IdTrasy[$u]]; break;}}?>"}],
          destination: "<?php echo $Ciels[0]; ?>",
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay1.setDirections(response);
          } 
        });
       }   
       
       
       
        
      }  
      
         function calculateAndDisplayRoute2(directionsService, directionsDisplay2) {
         poc4=poc4+1;
           if(poc4==1){
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
            if(poc4==2){
        directionsService.route({
          origin: "<?php echo $Starts[1]; ?>",
          waypoints: [{location: "<?php for ($u=0;$u<$k;$u++){ if ($IdTrasy[$u]==2) { echo $CielCvicenia[$IdTrasy[$u]]; break;}}?>"}],
          destination: "<?php echo $Ciels[1]; ?>",
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay2.setDirections(response);
          } 
        });
       } 
       
       
       
      }
      
               function calculateAndDisplayRoute3(directionsService, directionsDisplay3) {
               poc5=poc5+1;
         if(poc5==1){      
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
        if(poc5==2){      
        directionsService.route({
        origin: "<?php echo $Starts[2]; ?>",
          waypoints: [{location: "<?php for ($u=0;$u<$k;$u++){ if ($IdTrasy[$u]==3){ echo $CielCvicenia[$IdTrasy[$u]]; break;} }?>"}],
          destination: "<?php echo $Ciels[2]; ?>",
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay3.setDirections(response);
          } 
        });
       }   
        
      }
      
               function calculateAndDisplayRoute4(directionsService, directionsDisplay4) {
               poc6=poc6+1;
               if(poc6==1){ 
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
        if(poc6==2){ 
        directionsService.route({
          origin: "<?php echo $Starts[3]; ?>",
            waypoints: [{location: "<?php for ($u=0;$u<$k;$u++){ if ($IdTrasy[$u]==4){ echo $CielCvicenia[$IdTrasy[$u]]; break;} }?>"}],
          destination: "<?php echo $Ciels[3]; ?>",
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay4.setDirections(response);
          } 
          
        });
        }
        
        
      }
      
               function calculateAndDisplayRoute5(directionsService, directionsDisplay5) {
               poc7=poc7+1;
               if(poc7==1){ 
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
        
              if(poc7==2){ 
        directionsService.route({
          origin: "<?php echo $Starts[4]; ?>",
           waypoints: [{location: "<?php for ($u=0;$u<$k;$u++){ if ($IdTrasy[$u]==5) { echo $CielCvicenia[$IdTrasy[$u]]; break;} }?>"}],
          destination: "<?php echo $Ciels[4]; ?>",
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay5.setDirections(response);
          } 
        });
        }
      }
      
               function calculateAndDisplayRoute6(directionsService, directionsDisplay6) {
                poc8=poc8+1;
               if(poc8==1){ 
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
        
                if(poc8==2){ 
        directionsService.route({
         origin: "<?php echo $Starts[5]; ?>",
           waypoints: [{location: "<?php for ($u=0;$u<$k;$u++){ if ($IdTrasy[$u]==6) { echo $CielCvicenia[$IdTrasy[$u]]; break;}}?>"}],
          destination: "<?php echo $Ciels[5]; ?>",
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay6.setDirections(response);
          } 
        });
        }
      }
      
              function calculateAndDisplayRoute7(directionsService, directionsDisplay7) {
                poc9=poc9+1;
               if(poc9==1){
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
        
                 if(poc9==2){
        directionsService.route({
        origin: "<?php echo $Starts[6]; ?>",
         waypoints: [{location: "<?php for ($u=0;$u<$k;$u++){ if ($IdTrasy[$u]==7) { echo $CielCvicenia[$IdTrasy[$u]]; break;} }?>"}],
          destination: "<?php echo $Ciels[6]; ?>",
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay7.setDirections(response);
          } 
        });
          }
      }
      
              function calculateAndDisplayRoute8(directionsService, directionsDisplay8) {
              poc10=poc10+1;
               if(poc10==1){
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
        
                  if(poc10==2){
        directionsService.route({
          origin: "<?php echo $Starts[7]; ?>",
           waypoints: [{location: "<?php for ($u=0;$u<$k;$u++){ if ($IdTrasy[$u]==8){ echo $CielCvicenia[$IdTrasy[$u]]; break;}}?>"}],
          destination: "<?php echo $Ciels[7]; ?>",
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay8.setDirections(response);
          } 
        });
        }
      }
      
              function calculateAndDisplayRoute9(directionsService, directionsDisplay9) {
                poc11=poc11+1;
               if(poc11==1){
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
        
                if(poc11==2){
        directionsService.route({
         origin: "<?php echo $Starts[8]; ?>",
          waypoints: [{location: "<?php for ($u=0;$u<$k;$u++){ if ($IdTrasy[$u]==9) { echo $CielCvicenia[$IdTrasy[$u]]; break;}}?>"}],
          destination: "<?php echo $Ciels[8]; ?>",
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay9.setDirections(response);
          } 
        });
        }
      }
      
              function calculateAndDisplayRoute10(directionsService, directionsDisplay10) {
                  poc12=poc12+1;
               if(poc12==1){
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
        
                if(poc12==2){
        directionsService.route({
         origin: "<?php echo $Starts[9]; ?>",
           waypoints: [{location: "<?php for ($u=0;$u<$k;$u++){ if ($IdTrasy[$u]==10){ echo $CielCvicenia[$IdTrasy[$u]]; break;} }?>"}],
          destination: "<?php echo $Ciels[9]; ?>",
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay10.setDirections(response);
          } 
        });
        }
      }
      
      
            function calculateAndDisplayRoute11(directionsService, directionsDisplay11) {
             poc13=poc13+1;
               if(poc13==1){
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
            if(poc13==2){
        directionsService.route({
          origin: "<?php echo $Starts[10]; ?>",
            waypoints: [{location: "<?php for ($u=0;$u<$k;$u++){ if ($IdTrasy[$u]==11){ echo $CielCvicenia[$IdTrasy[$u]]; break;}}?>"}],
          destination: "<?php echo $Ciels[10]; ?>",
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay11.setDirections(response);
          } 
        });
        }    
         
        
      }
      
         function calculateAndDisplayRoute12(directionsService, directionsDisplay12) {
           poc14=poc14+1;
               if(poc14==1){
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
            if(poc14==2){
        directionsService.route({
           origin: "<?php echo $Starts[11]; ?>",
             waypoints: [{location: "<?php for ($u=0;$u<$k;$u++){ if ($IdTrasy[$u]==12){ echo $CielCvicenia[$IdTrasy[$u]]; break;} }?>"}],
          destination: "<?php echo $Ciels[11]; ?>",
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay12.setDirections(response);
          } 
        });
        }  
        
        
      }
      
               function calculateAndDisplayRoute13(directionsService, directionsDisplay13) {
                poc15=poc15+1;
               if(poc15==1){
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
            
               if(poc15==2){
        directionsService.route({
           origin: "<?php echo $Starts[12]; ?>",
            waypoints: [{location: "<?php for ($u=0;$u<$k;$u++){ if ($IdTrasy[$u]==13){ echo $CielCvicenia[$IdTrasy[$u]]; break;}}?>"}],
          destination: "<?php echo $Ciels[12]; ?>",
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay13.setDirections(response);
          } 
        });
        }   
        
        }
        
      
      
               function calculateAndDisplayRoute14(directionsService, directionsDisplay14) {
               poc16=poc16+1;
               if(poc16==1){
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
        
             if(poc16==2){
        directionsService.route({
           origin: "<?php echo $Starts[13]; ?>",
            waypoints: [{location: "<?php for ($u=0;$u<$k;$u++){ if ($IdTrasy[$u]==14) { echo $CielCvicenia[$IdTrasy[$u]]; break;} }?>"}],
          destination: "<?php echo $Ciels[13]; ?>",
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay14.setDirections(response);
          } 
        });
        }
      }
      
               function calculateAndDisplayRoute15(directionsService, directionsDisplay15) {
                poc17=poc17+1;
               if(poc17==1){
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
        
             if(poc17==2){
        directionsService.route({
           origin: "<?php echo $Starts[14]; ?>",
             waypoints: [{location: "<?php for ($u=0;$u<$k;$u++){ if ($IdTrasy[$u]==15) { echo $CielCvicenia[$IdTrasy[$u]]; break;} }?>"}],
          destination: "<?php echo $Ciels[14]; ?>",
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay15.setDirections(response);
          } 
        });
        }
      }
      
               function calculateAndDisplayRoute16(directionsService, directionsDisplay16) {
                 poc18=poc18+1;
               if(poc18==1){
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
        
                if(poc18==2){
        directionsService.route({
         origin: "<?php echo $Starts[15]; ?>",
           waypoints: [{location: "<?php for ($u=0;$u<$k;$u++){ if ($IdTrasy[$u]==16) { echo $CielCvicenia[$IdTrasy[$u]]; break;}}?>"}],
          destination: "<?php echo $Ciels[15]; ?>",
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay16.setDirections(response);
          } 
        });
        }
      }
      
              function calculateAndDisplayRoute17(directionsService, directionsDisplay17) {
               poc19=poc19+1;
               if(poc19==1){
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
        
               if(poc19==2){
        directionsService.route({
           origin: "<?php echo $Starts[16]; ?>",
             waypoints: [{location: "<?php for ($u=0;$u<$k;$u++){ if ($IdTrasy[$u]==17){ echo $CielCvicenia[$IdTrasy[$u]]; break;} }?>"}],
          destination: "<?php echo $Ciels[16]; ?>",
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay17.setDirections(response);
          } 
        });
        }
      }
      
              function calculateAndDisplayRoute18(directionsService, directionsDisplay18) {
                poc20=poc20+1;
               if(poc20==1){
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
        
                 if(poc20==2){
        directionsService.route({
           origin: "<?php echo $Starts[17]; ?>",
            waypoints: [{location: "<?php for ($u=0;$u<$k;$u++){ if ($IdTrasy[$u]==18){ echo $CielCvicenia[$IdTrasy[$u]]; break;}}?>"}],
          destination: "<?php echo $Ciels[17]; ?>",
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay18.setDirections(response);
          } 
        });
        }
      }
      
              function calculateAndDisplayRoute19(directionsService, directionsDisplay19) {
                poc21=poc21+1;
               if(poc21==1){
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
        
                if(poc21==2){
        directionsService.route({
           origin: "<?php echo $Starts[18]; ?>",
            waypoints: [{location: "<?php for ($u=0;$u<$k;$u++){ if ($IdTrasy[$u]==19){ echo $CielCvicenia[$IdTrasy[$u]]; break;}}?>"}],
          destination: "<?php echo $Ciels[18]; ?>",
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay19.setDirections(response);
          } 
        });
        }
      }
      
              function calculateAndDisplayRoute20(directionsService, directionsDisplay20) {
               poc22=poc22+1;
               if(poc22==1){
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
                 if(poc22==2){
        directionsService.route({
            origin: "<?php echo $Starts[19]; ?>",
            waypoints: [{location: "<?php for ($u=0;$u<$k;$u++){ if ($IdTrasy[$u]==20){ echo $CielCvicenia[$IdTrasy[$u]]; break;} }?>"}],
          destination: "<?php echo $Ciels[19]; ?>",
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            directionsDisplay20.setDirections(response);
          } 
        });
        }
      }
      
   
    </script>
 <script async defer
 src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBg-sSzElcKO4xdcLqyOXE4A2cLpMAMFSY&callback=initMap">
      
    </script>   
     
  
  </body>
</html>