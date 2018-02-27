<?php
/**
 * Created by PhpStorm.
 * User: stefa
 * Date: 09/02/2018
 * Time: 17:51
 */

include_once ("sp_start.php");
include_once ("sp_dblogin.php");
global $sp_db_connection;

$query = "
INSERT INTO " . DATABASE . ".comment VALUES (
  null,
  $_SESSION[id],
  $_GET[article],
  '$_POST[insert_comment]'
)  
";

mysqli_query($sp_db_connection,$query);



header("location: ../article.php?article=" . $_GET['article']); //redirect to the page where the comment is made