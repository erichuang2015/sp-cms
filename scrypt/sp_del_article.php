<?php
/**
 * Created by PhpStorm.
 * User: stefa
 * Date: 02/01/2018
 * Time: 12:16
 */

include_once ("sp_start.php");
include_once("sp_dblogin.php");
global $sp_db_connection;

$query_del_article = "DELETE FROM " . DATABASE . ".article WHERE article.ID =" . openssl_decrypt(str_replace(" ", "+", $_GET['del']), PROTOCOL, PASSWORD_SSL, 0,IV);
mysqli_query($sp_db_connection, $query_del_article);
header("location: ../private.php");