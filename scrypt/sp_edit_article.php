<?php
/**
 * Created by PhpStorm.
 * User: stefa
 * Date: 12/12/2017
 * Time: 22:08
 */

include_once("sp_dblogin.php");
include_once("sp_start.php");

header("location: ../private.php");


if ($_POST['text_article'] == '' || $_POST['title_article'] == '') {
    if ($_POST['text_article'] == '') {
        echo "Article's content not inserted! <br>";
    }
    if ($_POST['title_article'] == '') {
        echo "Article's title not inserted! <br>";
    }
    return;
}

global $sp_db_connection;
$query = "UPDATE " . DATABASE . ".article SET text = '$_POST[text_article]', title = '$_POST[title_article]' WHERE ID =" . openssl_decrypt(str_replace(" ", "+", $_GET['modifica']), PROTOCOL, PASSWORD_SSL, 0, IV);
mysqli_query($sp_db_connection, $query);