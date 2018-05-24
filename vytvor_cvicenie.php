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
    <label> start <input type="text" name="start"  required></label>
    <label> ciel <input type="text" name="ciel"  required></label>
<br>
    <label>zaciatok: <input type="datetime-local" name="zaciatok"></label>
    <label>koniec: <input type="datetime-local" name="koniec"></label>
    <br>
    <input type="submit">
</form>
</div>
<script>
    var source;
    var user="email57@gmail.com";
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
    var div = document.getElementById('content');
    console.log("pokus");
</script>
</body>
</html>