

<?php
if(isset($_GET['getres']))
{
    if(!empty($_GET['a'])&&($_GET['b'])&&($_GET['op'])) {
        $a = $_GET['a'];
        $b = $_GET['b'];
        $operation = $_GET['op'];

        if ($operation == '+') {
            $res = $a + $b;
        } else if ($operation == '-') {
            $res = $a - $b;
        } else if ($operation == '*') {
            $res = $a * $b;
        } else if ($operation == '/') {
            if ($b == 0) {
                $res = "infinity";
            } else {
                $res = $a / $b;
            }
        }

        if (isset($res)) echo 'Результат: ' . $res;
        else echo "знак задан не верно";
    }
    else echo "пустые значения нельзя!";
}
else {

    include('form_calc.dat');

}

?>
