<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link type="text/css" rel="stylesheet" href="style.php">

</head>
<body>
<div id="content">
    <div id='content_text'>
    <?php
    require_once("scrypt/sp_dblogin.php");
    global $sp_db_connection;
    //Show all the article in the db
    $max_articoli = mysqli_fetch_array(mysqli_query($sp_db_connection, "SELECT MAX(" . DATABASE . ".article.ID) AS max_a FROM " . DATABASE . ".article"));

    for ($i = 1; $i < $max_articoli['max_a']+1; $i++) {

        $query = "SELECT * FROM " . DATABASE . ".article WHERE " . DATABASE . ".article.ID = $i";
        $row = mysqli_fetch_array(mysqli_query($sp_db_connection,$query));

        if (is_null($row['ID'])) continue;
        $author = mysqli_fetch_array(mysqli_query($sp_db_connection, "SELECT " . DATABASE . ".user.Username AS nome FROM " . DATABASE . ".user WHERE ID='$row[author]'" ));
        $text = substr($row['text'], 0, 400);

        echo "
              <a href='article.php?article=$row[ID]'> <h2> $row[title] </h2></a>
              <p>$text <a href='article.php?article=$row[ID]'>...continue reading</a> </p>
               Written by: $author[nome]  Category: $row[article_category]";

    } echo "<br><br> End of articles!";

    ?>
    </div>
</div>

<br>
</body>
</html>