<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>vytvor trasu</title>
</head>
<body>
<form action="trasa_add.php" method="post">
    <?php
    session_start();
    if(isset($_SESSION["email"])) {
        echo '<label> user:<input type="text" name="user" value="'.$_SESSION["email"].'"></label>';
    }
    else header("Location:index.php");
    ?>

    <label>nazov:<input type="text" name="nazov" required></label>
    <label> start <input type="text" name="start"  required></label>
    <label> ciel <input type="text" name="ciel"  required></label>

    <label>mod: <select name="mod">
        <option value=1>private</option>
        <option value=2>public</option>
        <option value=3>stafeta</option>
    </select> </label>
    <input type="submit">
</form>
<form action="index.php">
    <input type="submit" value="spat">
</form>
</body>
</html>