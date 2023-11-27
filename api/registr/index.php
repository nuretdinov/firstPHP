<?php
$_POST = json_decode(file_get_contents("php://input"), true);

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$phone = $_POST['phone'];
$document_number = $_POST['document_number'];
$password = $_POST['password'];
$repeat_password = $_POST['repeat_password'];

if ((!empty($first_name)) && (!empty($last_name)) && (!empty($phone)) && (!empty($document_number)) && (!empty($password)) && (!empty($repeat_password))) {
    if ($password == $repeat_password) {
        $x = new mysqli("localhost", "root", "", "api");
        $sql = "INSERT INTO `users` (`id`, `first_name`, `last_name`, `phone`, `document_number`, `password`, `repeat_password`) VALUES (NULL, '$first_name', '$last_name', '$phone', '$document_number', '$password', '$repeat_password');";
        $x->query($sql);
        echo "204";
    } else {
        //создаем json со ошибкой 1
        $error = array("code" => "422", "message" => "Validation error", "errors" => "Password mismatch");
        $json_out = json_encode($error); //преобр. массива в json
        echo $json_out;
    }
} else {
    //создаем json со ошибкой 2
    $error = array("code" => "422", "message" => "Validation error", "errors" => "empty data");
    $json_out = json_encode($error); //преобр. массива в json
    echo $json_out;
}
?>