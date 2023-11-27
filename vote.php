<form>
    Выберете самую красивую уточку: <br>
	<img height=200px	src="https://cs11.pikabu.ru/post_img/2018/12/17/8/1545050494117988750.jpg">
	<input type="radio" name="vote" value="1"> 1 <br>
	<img height=200px	src="https://cdn1.ozone.ru/s3/multimedia-z/c1200/6033739523.jpg">
	<input type="radio" name="vote" value="2"> 2 <br>
	<img height=200px	src="https://img.freepik.com/free-vector/cute-baby-duck-holding-knife-illustration_482416-156.jpg">
	<input type="radio" name="vote" value="3"> 3 <br>
    <input type="submit" value="Проголосовать">
</form>

<?php
$res = array(0, 0, 0);

if (file_exists("res.txt")) {
    $file = fopen("res.txt", "r");
	for ($i = 0; $i <= 2; $i++) {
		$res[$i] = (int)fgets($file);
	}
    fclose($file);
}

if (isset($_GET['vote'])) {
    $file = fopen("res.txt", "w");
	for ($i = 0; $i <= 2; $i++) {
		if ($_GET['vote'] == $i+1)
			$res[$i]++;
		fputs($file, $res[$i]);
		fputs($file, PHP_EOL);
	}
    fclose($file);
	echo "Ваш голос учтен! <br><br>";
}


echo "Результаты: <br>";
for ($i = 0; $i <= 2; $i++) {
echo $i . " уточка: " . $res[$i] . "<br>";
}
?>