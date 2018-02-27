<html>
<head>
    <link type="text/css" rel="stylesheet" href="style.php">
</head>

<body>

<?php include_once("scrypt/sp_start.php"); ?>


<form action="scrypt/sp_edit_article.php?modifica=<?php echo $_GET['modifica'] ?>" method="post" title="Articoli">
    <div id="box_article_writing">
        Title: <br>
        <?php
        include_once("scrypt/sp_dblogin.php");
        include_once("scrypt/sp_start.php");
        global $sp_db_connection;

        //decrypt the article ID passed whit openssl encrypt
        $query = "SELECT " . DATABASE . ".article.title AS title FROM " . DATABASE . ".article WHERE id=" . openssl_decrypt(str_replace(" ", "+", $_GET['modifica']), PROTOCOL, PASSWORD_SSL, 0, IV);
        $fetch = mysqli_fetch_array(mysqli_query($sp_db_connection, $query));

        echo "<textarea id='edit_title' maxlength='50' name='title_article' title='Articoli'>$fetch[title]</textarea>";
        ?>

        <br>
        Text: <br>

        <?php
        include_once("scrypt/sp_dblogin.php");
        include_once("scrypt/sp_start.php");
        global $sp_db_connection;
        //decrypt the article ID passed whit openssl encrypt
        $query = "SELECT " . DATABASE . ".article.text AS text FROM " . DATABASE . ".article WHERE id=" . openssl_decrypt(str_replace(" ", "+", $_GET['modifica']), PROTOCOL, PASSWORD_SSL, 0, IV);
        $fetch = mysqli_fetch_array(mysqli_query($sp_db_connection, $query));

        echo "<textarea id='edit_text' name='text_article' title='Articoli'>$fetch[text] </textarea>";
        ?>
        <br>
        <input type="submit">
    </div>
</form>


<a href="private.php">Return</a>

</body>

</html>


