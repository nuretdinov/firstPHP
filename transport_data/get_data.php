<?php
$userName=$_GET['user_name'];
$userEmail=$_GET['user_email'];
echo "Привет, данные получены: {$userName}, {$userEmail}";
?>

<?php
/*
$_POST = json_decode(file_get_contents("php://input"), true);
$userName=$_POST['user_name'];
$userEmail=$_POST['user_email'];
    $data_out = array("user_name" => $userName, "user_email" => $userEmail);
    $json_out = json_encode($data_out);
echo $json_out;
*/
?>

<?php
/*
$userSearch=$_GET['search'];
    if($userSearch=="yes"){
        $userPage=$_GET['page'];
        echo "Страница поиска: {$userPage}";
    }
*/
?>





