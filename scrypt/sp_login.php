<?php
/**
 * Created by PhpStorm.
 * User: stefa
 * Date: 06/12/2017
 * Time: 18:08
 */

require_once('../login.php');
require_once('sp_dblogin.php');

function login()
{
    session_start();

    global $sp_db_connection;

    //password get encrypted
    $password = md5($_POST['password_login']);

    //check if the username is already in db
    $query_exist = "
    SELECT COUNT(*) AS num FROM " . DATABASE . ".user
    WHERE Username = '$_POST[nome_login]' AND Password = '$password'
    ";

    $exist = mysqli_fetch_array(mysqli_query($sp_db_connection, $query_exist));

    //if exist return 0 the combination of user and psw donsn't exist
    if ($exist['num'] == 0) {

        echo "Cannot found a username whit this combination of username and password!";
        return;

    }

    //if we arrived here, the user and psw exist in db
    $query_login = "
    SELECT " . DATABASE . ".user.ID FROM " . DATABASE . ".user
    WHERE Username = '$_POST[nome_login]' AND Password = '$password'
    ";

    $fetch = mysqli_fetch_array(mysqli_query($sp_db_connection, $query_login));

    //insert into session the id of the user
    $_SESSION['id'] = $fetch['ID'];
    header("location: ../private.php");
    return;
}

login();
