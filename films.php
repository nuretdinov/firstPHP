<?php
$conn = new mysqli('localhost', 'root', '', '123');


//добавление информации о фильме
if (isset($_GET['name'])&&!isset($_GET['edit_btn'])) {
    if(!empty($_GET['name'])&&!empty($_GET['country'])&&!empty($_GET['year'])&&!empty($_GET['info'])) {
        $sql = "INSERT INTO `films` (`id`, `name`, `country`, `year`, `info`) VALUES (NULL, '" . $_GET['name'] . "', '" . $_GET['country'] . "', '" . $_GET['year'] . "', '" . $_GET['info'] . "');";
        $result = $conn->query($sql);
        echo 'Запись добавлена';
    }
}

//редактирование данныех
if (isset($_GET['edit_id'])) {
    if(!empty($_GET['name'])&&!empty($_GET['country'])&&!empty($_GET['year'])&&!empty($_GET['info'])) {

        $sql = "UPDATE `films` SET `name` = '" . $_GET['name'] . "', `country` = '" . $_GET['country'] . "', `year` = '" . $_GET['year'] . "', `info` = '" . $_GET['info'] . "' WHERE `films`.`id` = " . $_GET['edit_id'] . ";";
        $result = $conn->query($sql);
        echo 'Запись отредактирована';
    }
}


//вывод всего + сортировка
$sql = "SELECT * FROM films";
if (isset($_GET['sort'])) {
    switch ($_GET['sort']) {
        case 'asc':
            $sql = "SELECT * FROM films ORDER BY year ASC;";
            break;
        case 'desc':
            $sql = "SELECT * FROM films ORDER BY year DESC;";
            break;
    }
}
$result = $conn->query($sql);
$movies = $result->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information about movie</title>
</head>

<body>


Дабавить новый фильм:
<form>
    <input type="text" name="name">
    <input type="text" name="country">
    <input type="number" name="year" min="1900" max="2022">
    <textarea name="info"></textarea>
    <input type="submit">
</form>


<table>
    <tr>
        <th>Название</th>
        <th>Страна</th>
        <th>Год</th>
    </tr>
    <?php foreach ($movies as $movie) : ?>
        <tr>
            <td><?php echo $movie['name']; ?></td>
            <td><?php echo $movie['country']; ?></td>
            <td><?php echo $movie['year']; ?></td>
            <td><a href="films.php?id=<?php echo $movie['id']; ?>">Подробнее</a></td>
            <td><a href="films.php?edit=&id=<?php echo $movie['id']; ?>">Редактировать</a></td>
        </tr>
    <?php endforeach ?>
</table>

<h4>Сортировка</h4>
<ul>
    <li><a href="?sort=asc">От старого к новому</a></li>
    <li><a href="?sort=desc">От нового к старому</a></li>
</ul>

<?php
//вывод подробной информации о фильме
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM films WHERE id=$id";
    $result = $conn->query($sql);
    $movies = $result->fetch_all(MYSQLI_ASSOC);
    $movie = $movies[0];


    if (!isset($_GET['edit'])) {
        echo $movie['name'];
        echo "<ul>
    <li>" . $movie['country'] . "</li>
    <li> " . $movie['year'] . "</li>
    <li>" . $movie['info'] . "</li>
</ul>";
    } else {
        echo '
   <form>
    <input type="text" name="name" value="'.$movie['name'].'">
    <input type="text" name="country" value="'.$movie['country'].'">
    <input type="number" name="year" min="1900" max="2022" value="'.$movie['year'].'">
    <textarea name="info">'.$movie['info'].'</textarea>
    <input type="submit" name="edit_id" value='.$movie['id'].'>
</form>
    ';
    }
}


?>

</body>
</html>