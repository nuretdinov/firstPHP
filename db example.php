<?php
$x = new mysqli("localhost", "root", "", "123");
$result = $x->query("SELECT * FROM `films` WHERE `country`='США'");

while($row = $result->fetch_assoc()){
echo $row['name'].' ';
echo $row['country'].' ';
echo $row['year'].' ';
echo '<br>';
}

$result->free();
$x->close();
?>
