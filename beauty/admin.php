<?php
$x = new mysqli("localhost", "root", "", "beauty"); // соед. с сервером БД
?>
<!DOCTYPE html>
<lang="en">
<head>
    <meta charset="UTF-8">
    <title>Админка</title>
</head>
<body>

<?php
session_start();

if(isset($_GET['out'])){
    $_SESSION['auth']=0;
    echo "Вы успешно вышли из админки";
}


if (isset($_GET['name'])) {
    if ($_SESSION['auth'] == 1) {
        $name = $_GET['name'];
        $description = $_GET['description'];
        $price = $_GET['price'];
        $sql = "INSERT INTO `uslugi` (`id`, `name`, `description`, `price`) VALUES (NULL, '".$name."', '".$description."', '".$price."');";
        $add = $x->query($sql);
        echo 'Услуга добавлена';
    }
}

if (isset($_GET['login'])) {
    $login_user = $_GET['login'];
    $password_user = $_GET['pass'];

    $auth = $x->query("SELECT * FROM `admin`");
    $row = $auth->fetch_assoc();

    if (($row['login'] === $login_user) && ($row['password'] === $password_user)) {
        echo 'Авторизация успешна!';
        $_SESSION['auth'] = 1;
    } else {
        $_SESSION['auth'] = 0;
        echo 'Авторизация не прошла успешно!';
    }
}


if($_SESSION['auth']==1){
   echo '<form>
Название услуги: <input type="text" name="name"><br>
Описание услуги: <textarea name="description"></textarea><br>
Цена: <input type="text" name="price"><br>
<input type="submit">
</form>';

   echo "<form>
<input type='submit' name='out' value='выход'>
    </form>";
}

?>

</body>
</html>