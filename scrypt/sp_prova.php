<html>
<head>
    <link rel="stylesheet" href="../style.php" type="text/css">
</head>

<body>
    <form action="" method="get">

        <input type="color" name="colore" title="colore">
        <input type="submit">

    </form>

</body>

<?php

include_once ("sp_dblogin.php");
global $sp_db_connection;

$c = $_GET['colore'];

if ( strlen($c)>6 || strpos($c, "#") != 0) {
    $c = trim($c,"# %");
    if (strlen($c)>6){
        $c = strtr($c,0,6);
    }

}

if (!is_null($c)){

    $querybg = "UPDATE " . DATABASE . ".style SET background = '$c'";
    $bgcolor = mysqli_query($sp_db_connection, $querybg);

}




