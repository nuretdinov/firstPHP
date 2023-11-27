<form action="url" method="get|post">
    <input type="text" name="username">
    <input type="radio" name="nationality" value="1">rus
    <input type="radio" name="nationality" value="2">belrus
    <input type="submit" value="ok">
</form>

<?php
if (isset($_POST['username'])) {
    if (empty($_POST['username'])) {
        $username = $_POST['username']; // $_GET
        ...
    }
}

if (file_exists("url")) {
    $file = fopen("URL", "тип"); //r r+ a a+ w w+
// fgets($file) fgetc($file) frwite($file,'content') | fputs()

    while (!feof($file)) {
        $x = fgets($file);
        ...
        //break
        //continue
    }

    fclose($file);

    $mas = file("url");

    unlink('url');
    die('текст');
    echo "1223";
    echo "12 {$x} 23";
    echo '1223';
    echo '1223'.$x;
    echo "1223".$x;
}
// PHP_EOL
trim(строка);
?>


<?php
...
?>
html или текст
<?php
...
?>




