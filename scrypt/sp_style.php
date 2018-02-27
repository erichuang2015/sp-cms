<?php
/**
 * Created by PhpStorm.
 * User: stefa
 * Date: 25/02/2018
 * Time: 19:08
 */

include_once ("sp_dblogin.php");
include_once ("sp_start.php");
global $sp_db_connection;

$bg = $_GET['background']; $box = $_GET['box']; $t = $_GET['title'];
$l = $_GET['link']; $l_h = $_GET['link_hover'];

$bg = trim($bg,"# %"); $box = trim($box,"# %");
$t = trim($t,"# %"); $l = trim($l,"# %");
$l_h = trim($l_h,"# %");

$querycolor = "
UPDATE " . DATABASE . ".style 
  SET background = '$bg', box = '$box', title = '$t' , link = '$l', link_hover = '$l_h';
";

mysqli_query($sp_db_connection, $querycolor);

header("location: ../private.php");

