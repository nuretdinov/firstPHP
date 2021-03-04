<?php
$json_user = '{"nick":"admin", "email":"admin@yandex.ru", "tel":"8-800-555-0000"}';

//преобразуем json в ассоциативный массив и выводим
$rez1 = json_decode($json_user, true); //true – для преобразования в ассоц.массив
foreach($rez1 as $rez) echo $rez;

//преобразуем json в класс и вывобдим
$rez2 = json_decode($json_user);
echo $rez2->nick . $rez2->email . $rez2->tel;

//массив преобразуем в json
$new_array = array("admin", "admin@yandex.ru", "8-800-555-0000"); //индексный
$new_array = array("nick"=>"admin", "email"=>"admin@yandex.ru", "tel"=>"8-800-555-0000"); //ассоциативный
$rez3 = json_encode($new_array);
print_r($rez3);
?>
