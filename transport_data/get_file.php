<?php
if (is_uploaded_file($_FILES["user_file"]["tmp_name"])) {
    move_uploaded_file($_FILES["user_file"]["tmp_name"], $_FILES["user_file"]["name"]);
    echo "файл успешно загружен";
}
?>

