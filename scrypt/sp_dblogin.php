<?php

/**
 * Created by PhpStorm.
 * User: stefa
 * Date: 04/12/2017
 * Time: 21:46
 */

//The database credentials used to login into database
DEFINE('HOST', 'eu-cdbr-west-02.cleardb.net');
DEFINE('USER', 'b4560f50e6adf6');
DEFINE('PASSWORD','e4d97578');
DEFINE('PORTA','3306');
DEFINE('DATABASE','heroku_164f22f40abacc6');
//define the ssl password, protocol and iv
DEFINE('PROTOCOL','AES-128-CBC');
DEFINE('PASSWORD_SSL','portalepizze');
DEFINE('IV','ciaociaociaociao');//

//Query to login into database using the given credentials
//$sp_db_connection = mysqli_connect($sp_host, $sp_user, $sp_password, '" . DATABASE . "', $sp_porta);
$sp_db_connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE, PORTA);


//If the connection gone bad the application die R.I.P
if (!$sp_db_connection) die("Can not connect to the database!" . mysqli_connect_error());