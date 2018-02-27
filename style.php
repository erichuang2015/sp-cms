<?php
include_once ("scrypt/sp_dblogin.php");
global $sp_db_connection;

//read from the db all the color setting
$querycolor = "SELECT * FROM style";
$color = mysqli_fetch_array(mysqli_query($sp_db_connection,$querycolor));


echo "
body {

    background-color: $color[background];

}

a{

    color: $color[link];

}

a:hover{

    color: $color[link_hover];

}

a:visited {
    
    color: $color[link];

}

h1 {

    color: $color[title];
    text-align: center;

}

h2 {
    color: $color[title];
    text-align: center;

}

#edit_title{

    width: 95%;
    height: 30px;
    background-color: whitesmoke;
    resize: none;

}

#edit_text {

    width: 95%;
    height: 600px;
    padding: 12px 20px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    background-color: whitesmoke;
    resize: vertical;

}

#insert_comment {

    width: 99%;
    resize: vertical;


}

#menu {

    margin: auto;
    background-color: $color[box];
    width: 900px;
    height: 50px;

}

.menu_text {

    margin: 0px;
    padding: 0px;
    text-align: center;
    vertical-align: middle;
    line-height: 50px;
    font-size: 25px;
    height: 100%;
    width: 33.2%;
    float: left;

}

#content {

    margin: auto;
    background-color: white;
    width: 900px;
    height: auto;

}


#content_text {

    width: 95%;
    margin: auto;
    text-align: justify;

}

#footer {

    margin: auto;
    background-color: $color[box];
    width: 900px;
    height: 200px;

}

#box {

    margin: auto;
    height: 150px;
    width: 300px;
    background-color: $color[box];
    text-align: center;

}

#box_article_writing {
    margin: auto;
    height: auto;
    width: 900px;
    background-color: $color[box];
    text-align: center;
}



.footer_1 {

    margin: 0px;
    padding: 0px;
    text-align: center;
    line-height: 10px;
    vertical-align: top;
    height: 100%;
    width: 33.3%;
    float: left;

}

.private_menu{

    height: 98%;
    width: 15%;
    left: 84%;
    position: absolute;
    border:2px solid gray;


}

.private-zone-box {

    border: dashed red;
    height: auto;
    width: 83%;
    background-color: $color[box];

}

#private-zone-category{
    display: none;
}

#private-zone-style {
    display: none;
}

#private_zone_article {
    display: block;
}



.but{

    width: 100%;
    background-color: $color[box];
    border: none;
    color: black;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
}
";