<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add article</title>
    <link type="text/css" rel="stylesheet" href="style.php">
</head>
<body>
<div id="box_article_writing">
    <?php
    //check if the user is autenticated
    require_once ("scrypt/sp_start.php");
    ?>
    <form action="scrypt/sp_add_article.php" method="POST" title="article">
        <!-- Insert the value of title, text and category of the article! -->
        Title:<br> <textarea id="edit_title" maxlength="50" name="title_article" title="title_article"></textarea> <br>
        Text: <br> <textarea id="edit_text" name="text_article" title="text_article"></textarea> <br>
        Category: <br>

        <?php
        require_once ('scrypt/sp_dblogin.php');
        global $sp_db_connection;

        //select the maximum number of category
        $num_max = mysqli_fetch_array(mysqli_query($sp_db_connection, "SELECT MAX(" . DATABASE . ".category.ID) AS max_article FROM " . DATABASE . ".category"));

        echo "<select name='category_select' title='category_select'>";

        //show into list the category
        for ($i=1; $i < $num_max['max_article'] + 1; $i++ ) {
            $row = mysqli_fetch_array(mysqli_query($sp_db_connection, "SELECT * FROM " . DATABASE . ".category WHERE ID = $i"));
            if (is_null($row['ID'])) continue;
            echo "<option value='$row[name]' name='category_select' title='category_select'> $row[name] </option>";
        }

        echo "</select> <br>";
        ?>

        <input type="submit">

    </form>
</div>

</body>
</html>