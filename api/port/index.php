<?php
//создаем json со списком портов и возвращаем
$ports = array("name" => "SPb", "code" => "RULED");
$json_port = json_encode( $ports ); //преобр. массива в json
echo $json_port;
?>