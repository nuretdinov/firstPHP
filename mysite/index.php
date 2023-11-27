<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Лягуха</title>
</head>
<body>

<nav>
    <a href="?razdel=about"> О нас </a><br>
    <a href="?razdel=contacts"> Контакты </a><br>
</nav>

<?php

$content_text = "content.txt";
$content_pic = "pic.jpg";

if (!isset($_GET['razdel'])) {
    include("index/$content_text");
    echo "<img src='index/$content_pic'>";
} else {
    if ($_GET['razdel'] == 'about') {
        include("about/$content_text");
        echo "<img src='about/$content_pic'>";
    } else {
        include("contacts/$content_text");
        echo "<img src='contacts/$content_pic'>";
    }
}

?>
<br>
<a href="http://localhost/ПИ3_PHP/mysite"> на главную </a>

</body>
</html>

