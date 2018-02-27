<?php
/**
 * Created by PhpStorm.
 * User: stefa
 * Date: 12/12/2017
 * Time: 22:08
 */

include_once("sp_dblogin.php"); //where database credentials is stored
include_once("sp_start.php"); //start session
include_once("../private.php");


global $sp_db_connection;

echo "<br>";

//check if there is a null value

if ($_POST['category_select'] == '' || $_POST['text_article'] == '' || $_POST['title_article'] == '') {
    echo "entrato";
    if ($_POST['category_select'] == '') {
        echo "Category not inserted! <br>";
    }
    if ($_POST['text_article'] == '') {
        echo "Content not inserted! <br>";
    }
    if ($_POST['title_article'] == '') {
        echo "Title not inserted! <br>";
    }
    return;
}

//insert into databases all the value specified in "../add_article.html"

$query = "  
    INSERT INTO " . DATABASE . ".article VALUES (NULL , (SELECT " . DATABASE . ".user.ID FROM " . DATABASE . ".user WHERE " . DATABASE . ".user.ID = '$_SESSION[id]'),
      '$_POST[text_article]' , (SELECT " . DATABASE . ".category.name FROM " . DATABASE . ".category WHERE " . DATABASE . ".category.name = '$_POST[category_select]'),
      '$_POST[title_article]');
    ";


mysqli_query($sp_db_connection, $query); //run the scrypt
header("location: ../private.php"); //redirect to dashborad