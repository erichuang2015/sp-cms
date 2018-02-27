<html>

<head>
    <link type="text/css" rel="stylesheet" href="style.php">
</head>

<body>
<?php include_once ("header.html");?>

<div id="content">
    <div id='content_text'>

    <?php

/**
 * Created by PhpStorm.
 * User: stefa
 * Date: 03/02/2018
 * Time: 16:42
 */

session_start();
include_once ("scrypt/sp_dblogin.php");
global $sp_db_connection;

//access to the databases data about article
$query = "SELECT * FROM " . DATABASE . ".article WHERE ID = '$_GET[article]'";
$row = mysqli_fetch_array(mysqli_query($sp_db_connection,$query));

//access to the databases data about user
$query_writer = "SELECT " . DATABASE . ".user.Username FROM " . DATABASE . ".user WHERE ID = '$row[1]'";
$writer = mysqli_fetch_array(mysqli_query($sp_db_connection,$query_writer));

//print the article
echo "<h1>$row[title]</h1> 
      $row[text] <br> <br>
      Category: $row[article_category] <br> 
      Writer: $writer[Username] <br> <br>
      ";

    echo "Scrivi un commento: <br>";
    //set the id of the page where the comment will be associed
    $id_comment = $_GET['article'];

    include ("comment.php");

?>
    </div>
</div>
<br>

<?php include_once ("footer.html");?>

</body>

</html>

