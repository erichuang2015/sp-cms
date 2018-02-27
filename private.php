<head>
    <meta charset="UTF-8">
    <title>Private area!</title>
    <link rel="stylesheet" href="style.php" type="text/css">
    <script type="text/javascript" src="scrypt/hide_show.js"></script>
</head>
<body>

<?php
require_once('scrypt/sp_start.php');
?>

<!-- Button that make a div visible or hidden -->

<div class="private_menu">
    <button onclick="showArticle()" class="but">Articles</button>
    <button onclick="showCategory()" class="but">Categories</button>
    <button onclick="showStyle()" class="but">Style</button>

</div>


<div class="private-zone-box" id="private-zone-category">
    <br>
    <h2>Categories</h2>
    <br>
    Insert new category:
    <form action='scrypt/sp_add_category.php' method="post" title="categorie">
        <input maxlength="15" name="category_title" type="text" title="category_title">
        <input type="submit">

    </form>

    <?php

    require_once('scrypt/sp_dblogin.php');
    global $sp_db_connection;

    $i = 1;
    $contatore = 0;

    //Find the max number category
    $num_categorie = mysqli_fetch_array(mysqli_query($sp_db_connection, "SELECT MAX(" . DATABASE . ".category.ID) AS massimo FROM " . DATABASE . ".category"));


    echo " <br> Categories:<br>";

    //Print all the category
    while ($i < $num_categorie['massimo'] + 1) {

        $row = mysqli_fetch_array(mysqli_query($sp_db_connection, "SELECT * FROM " . DATABASE . ".category WHERE ID = $i"));
        $i++;
        if (is_null($row['ID'])) {
            continue;
        }
        $contatore++;
        echo "&nbsp" . $contatore . " - " . $row['name'] . " <a href='scrypt/sp_del_category.php?del=" . openssl_encrypt((string)$row['ID'], PROTOCOL, PASSWORD_SSL, 0,IV) . "' >Delete</a>" . "<br>";

    }

    ?>
</div>


<div class="private-zone-box" id="private_zone_article">
    <br>
    <h2>Articles</h2>
    <a href="add_article.php">Add article</a>
    <br><br>
    Articles:
    <br>
    <?php
    $i = 0;
    $num_articoli = mysqli_fetch_array(mysqli_query($sp_db_connection, "SELECT MAX(" . DATABASE . ".article.ID) AS massimo FROM " . DATABASE . ".article"));

    while ($i < $num_articoli['massimo'] + 1) {
        $row = mysqli_fetch_array(mysqli_query($sp_db_connection, "SELECT * FROM " . DATABASE . ".article WHERE ID = $i"));
        $i++;
        if (is_null($row['ID'])) continue;
        echo "&nbsp" . $row['title'] . "<a href='edit.php?modifica=" . openssl_encrypt((string)$row['ID'], PROTOCOL, PASSWORD_SSL, 0,IV)
            . "'> Edit</a> <a href='scrypt/sp_del_article.php?del=" . openssl_encrypt((string)$row['ID'], PROTOCOL, PASSWORD_SSL, 0,IV)
            . "'> Delete </a> <br>";
    }

    echo "<br>";

    ?>
</div>

<?php

//read from the db all the color setting
$querycolor = "SELECT * FROM style";
$color = mysqli_fetch_array(mysqli_query($sp_db_connection,$querycolor));

?>

<div class="private-zone-box" id="private-zone-style">
    <br>
    <h2>Style</h2>
    <form action="scrypt/sp_style.php" method="get">
        <p>Set the whole site background color!</p>
        <input type="color" name="background" title="background" value="<?php echo '#' . $color['background']; ?>">
        <p>Set the whole site box color!</p>
        <input type="color" name="box" title="box" value="<?php echo '#' . $color['box']; ?>">
        <p>Set the whole site title color (h1/h2)!</p>
        <input type="color" name="title" title="title" value="<?php echo '#' . $color['title']; ?>">
        <p>Set the whole site link color!</p>
        <input type="color" name="link" title="link" value="<?php echo '#' . $color['link']; ?>">
        <p>Set the whole site link hover color!</p>
        <input type="color" name="link_hover" title="link_hover" value="<?php echo '#' . $color['link_hover']; ?>">
        <br><br>
        <input type="submit">
    </form>

</div>
    <br>


<?php echo "<a href='index.php'>Go to homepage</a> | <a href='scrypt/logout.php'>Logout</a>"; ?>

</body>