<?php
/**
 * Created by PhpStorm.
 * User: stefa
 * Date: 06/12/2017
 * Time: 22:06
 */

//Start the session to load the $_SESSION
session_start();


function start()
{
    //check if a session id already set
    if (!is_null($_SESSION['id'])) {
        //if ID is already set, print it
        //echo 'Your session id is:' . $_SESSION['id'];

    } else {
        //else the application die
        die('You are not logged-in!');

    }
}

//the function is performed
start();