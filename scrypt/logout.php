<?php
/**
 * Created by PhpStorm.
 * User: stefa
 * Date: 29/01/2018
 * Time: 17:04
 */

session_start();

$_SESSION['id'] = null;

header("location: ../index.php");
