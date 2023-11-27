<?php
//получаем заявку в формате json
$json = file_get_contents("php://input");

//сохраняем построчно заявки в файл в формате json
$saveData = fopen("tech_support.dat", "a");
fwrite($saveData, $json);
fwrite($saveData, PHP_EOL);
fclose($saveData);

//декодируем json для обращения к пользователю по имени
$_POST = json_decode($json, true);
$statusOut = "Уважаемый пользователь {$_POST['user_name']}! <br> Ваша заявка принята в работу!";
echo $statusOut;
?>