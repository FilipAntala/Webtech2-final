<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>vytvor cvicenie</title>
</head>
<body>
<div id="content">
    <form action="cvicenie_add.php" method="post">
        <label> user:<input type="text" name="user" id="user_input" readOnly ></label>
        <label>trasa:<select name="trasa" id="trasa_select" required></select></label>
        <br>
        <label> start <input type="text" name="start" id="startcvicenia"  required></label>
        <label> ciel <input type="text" name="ciel"  required></label>
        <br>
        <label>zaciatok: <input type="datetime-local" name="zaciatok"></label>
        <label>koniec: <input type="datetime-local" name="koniec"></label>
        <br>
        <input type="submit">
    </form>
    <form action="index.php">
        <input type="submit" value="spat">
    </form>
</div>
<script>
    <?php
    session_start();
    if(isset($_SESSION["email"])) {
        echo 'var user="'.$_SESSION["email"].'";';

    }



    else header("Location:index.php");

    include('config.php');
    $servername = DB_HOSTNAME;
    $username = DB_USERNAME;
    $password = DB_PASSWORD;
    $dbname = DB_DATABASE;

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $userMail=$_SESSION["email"];
    $sql = "SELECT b.email, a.id, a.start from trasa a join User b on a.autor=b.id  where b.email=\"$userMail\"";
    $result = $conn->query($sql);

    $ID=array();
    $start=array();
    $Email=array();
    $i=0;
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $ID[$i]=$row["id"];
            $start[$i]= $row["start"];
            $Email[$i]= $row["email"];
            $i=$i+1;
        }
    } else {
        echo "0 results";
    }


    $conn->close();



    ?>
    var source;
    document.getElementById("user_input").value=user;
    var url = "trasa_get.php?user="+user;
    console.log(url);
    if (typeof(EventSource) === "undefined") {
        document.getElementById("content").innerHTML = "Sorry, your browser does not support server-sent events...";
    } else {
        source = new EventSource(url);
        source.onmessage=function listen(e){

            var data = JSON.parse(e.data);
            console.log(data);
            var select=document.getElementById("trasa_select");
            for(var i=0;i<data.length;i++){
                var option=document.createElement("option");
                option.value=data[i]['id'];
                option.text=data[i]['nazov']+" "+data[i]['start']+" - "+data[i]['ciel'];

                select.add(option);

            }




        }



    }

    var x= document.getElementById("trasa_select").value;
    var Retazec="<?php for($l=0;$l<$i;$l++){  echo $start[$l]; echo ';';}?>";
    var parseRet=Retazec.split(';');
    console.log(parseRet);

    var Retazec2="<?php for($l=0;$l<$i;$l++){  echo $ID[$l]; echo ';';}?>";
    var parseRet2=Retazec2.split(';');
    console.log(parseRet2);
    document.getElementById("startcvicenia").value=parseRet[Retazec2.indexOf(x)];



    var div = document.getElementById('content');
    console.log("pokus");
</script>
</body>
</html>