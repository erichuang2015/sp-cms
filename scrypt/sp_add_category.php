<?php
/**
 * Created by PhpStorm.
 * User: stefa
 * Date: 08/12/2017
 * Time: 20:09
 */

require_once('sp_dblogin.php');
require_once ('sp_start.php');
global $sp_db_connection;

if (!($_POST['category_title'] == "")) { //check if the field is not empty

    $query = "
    INSERT INTO " . DATABASE . ".category VALUES (null, '$_POST[category_title]');
    ";
    mysqli_query($sp_db_connection, $query);

}

header("location: ../private.php");