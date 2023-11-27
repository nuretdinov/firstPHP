<?php
//открываем файл с заявками
$saveData = fopen("tech_support.dat", "r");
echo "<ol>";
//с помощью цикла считываем все сохраненные заявки из файла построчно
while (!feof($saveData)) {
    $json = trim(fgets($saveData));
    if (!empty($json)) {
        //полученную заявку преобразуем из json в массив и далее выводим
        $userTickets = json_decode($json, true);
        echo "<li>имя: {$userTickets['user_name']}, email: {$userTickets['user_email']}, проблема: {$userTickets['user_problem']}</li>";
    }
}
echo "</ol>";
?>
