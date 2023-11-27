<?php
$x = new mysqli("localhost", "root", "", "456"); // соед. с сервером БД
?>
<!DOCTYPE html>
<lang="en">
<head>
    <meta charset="UTF-8">
    <title>Супер салон-красоты</title>

</head>

Салон красоты! <br><br> О нас:<br><br>
<?php
$about = $x->query("SELECT * FROM `about`");
$row = $about->fetch_assoc();
    echo $row['about_us'];
    echo "<br><strong> Наш адрес: </strong>";
    echo $row['address']."<br>";
    echo "<strong>Наш телефон:</strong>".$row['contact'];
    echo "<br><br>";
?>


<i>Наши услуги:</i><br><br>

<?php
$uslugi = $x->query("SELECT * FROM `uslugi`"); //отправляем SQL запрос на сервер (получаем выборку)
//из результата выборки получает 1 запись и записывает ее в массив
while($row = $uslugi->fetch_assoc()){
echo "<strong>".$row['name']."</strong>";
echo "<br>";
echo $row['description']."<br>";
echo $row['price'];
echo "<br><br>";
}
?>


Аторизация:
<form action="admin.php" method="get">
    логин: <input type="text" name="login"><br>
    пароль: <input type="password" name="pass"><br>
    <input type="submit">
</form>

</body>
</html>


<?php
$x->close();
?>