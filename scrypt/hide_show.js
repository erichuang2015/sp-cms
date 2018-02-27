function showArticle() {
    var article = document.getElementById("private_zone_article");
    article.style.display = "block";

    var category = document.getElementById("private-zone-category");
    category.style.display = "none";

    var style = document.getElementById("private-zone-style");
    style.style.display = "none";
}

function showCategory() {
    var category = document.getElementById("private-zone-category");
    category.style.display = "block";

    var article = document.getElementById("private_zone_article");
    article.style.display = "none";

    var style = document.getElementById("private-zone-style");
    style.style.display = "none";
}

function showStyle() {

    var category = document.getElementById("private-zone-category");
    category.style.display = "none";

    var article = document.getElementById("private_zone_article");
    article.style.display = "none";

    var style = document.getElementById("private-zone-style");
    style.style.display = "block";

}