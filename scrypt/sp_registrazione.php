<head>
    <link type="text/css" href="../style.php" rel="stylesheet">
</head>

<?php
/**
 * Created by PhpStorm.
 * User: stefa
 * Date: 05/12/2017
 * Time: 22:06
 */

//import necessary function to login into database and html interface of the script
require ("sp_dblogin.php");
require_once ("../registrazione.php");

//check if a given username already exist into database
function is_existing_username()
{
    global $sp_db_connection; //allow to use var to login into database whitout rewrite it
    //return how many times a given name is written in the database
    $query_check = "
        SELECT COUNT(*) AS num FROM " . DATABASE . ".user
        WHERE Username = '$_POST[nome_registrazione]'
    ";
    //save the result
    $fetch = mysqli_fetch_array(mysqli_query($sp_db_connection, $query_check));
    //if the count is != 0 the name is already written in database
    if ($fetch['num'] != 0) return true;
    return false;
}

//check if a given mail already exist into a database, see the comment of is_existing_username()
function is_existing_mail()
{
    global $sp_db_connection;

    $query_check = "
        SELECT COUNT(*) AS num FROM " . DATABASE . ".user
        WHERE Mail = '$_POST[mail_registrazione]'
    ";

    $fetch = mysqli_fetch_array(mysqli_query($sp_db_connection, $query_check));
    if ($fetch['num'] != 0) return true;
    return false;
}

//insert into database, no comment needed...if you don't understand this.......
function insert()
{
    global $sp_db_connection;

    $query_insert = "
    INSERT INTO " . DATABASE . ".user 
    (Username,Password,Mail,role)
    VALUES ('$_POST[nome_registrazione]','" . md5($_POST['password_registrazione']) . "','$_POST[mail_registrazione]',5)

    ";

    if (!mysqli_query($sp_db_connection, $query_insert)) {

        die("Something went wrong!" . mysqli_error($sp_db_connection));

    }

}

//display error
if (is_existing_username() && is_existing_mail()) echo "An user whit this username and mail is already registered!";
else if (is_existing_username()) echo "An user whit this username is already registered!";
else if (is_existing_mail()) echo "An user whit this email is already registered!";
else {
    insert(); //if username and mail isn't already written in database then write it
    echo "User succesfully added! <a href='../login.php'> Click here to login </a>";
}
