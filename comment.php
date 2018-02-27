
<form action="scrypt/sp_add_comment.php?article=<?php echo $_GET['article']; ?>" method="POST" title="comment">

    <textarea id="insert_comment" name="insert_comment" title="insert_comment"></textarea>
    <input type="submit">

</form>

<br>

<?php

include_once ("scrypt/sp_dblogin.php");
global $sp_db_connection;

$max_comment = mysqli_fetch_array(mysqli_query($sp_db_connection, "SELECT MAX(ID) AS massimo FROM " . DATABASE . ".comment WHERE comment.article = $_GET[article]"),MYSQLI_BOTH);

for ($i = 0; $i < $max_comment['massimo']+1; $i++) {
    //read comment content
    $query_comment = "SELECT * FROM " . DATABASE . ".comment WHERE " . DATABASE . ".comment.article = $_GET[article] AND " . DATABASE . ".comment.ID = $i";
    $row = mysqli_fetch_array(mysqli_query($sp_db_connection,$query_comment),MYSQLI_BOTH);

    //read comment writer
    $query_writer = "SELECT " . DATABASE . ".user.Username AS usern FROM " . DATABASE . ".user WHERE " . DATABASE . ".user.ID = $row[author]";
    $username = mysqli_fetch_array(mysqli_query($sp_db_connection,$query_writer),MYSQLI_BOTH);

    //if there isn't comment skip
    if (is_null($row['text'])) continue;
    echo "<br>
        $username[usern] said: <br> $row[text] <br>
        ";

}

?>


