<?php
// в задание на бронирование данные приходият через POST, это указано в таблице задания
// притом что посмотри, данные о пассажирах приходят в массиве!
// где элемент from содержит данные о круизе
// а passengers - это json с данными о путешественниках

//проверяем пришли ли вообще какие-либо данные в посте по одному из полей
if (isset($_POST['from']['id'])) {
    //проверяем не является ли пустыми дата отправления, ид круизы и данные о путешествинниках
    if ((!empty($_POST['from']['id'])) && (!empty($_POST['from']['date'])) && (!empty($_POST['passengers']))) {

        //переводим json в массив
        $pass = json_decode($_POST['passengers'], true);
        //считаем количество пассажиров, данные о которых указаны
        $pass_num = count($pass);

        //здесь надо сделать запрос по количеству свободных мест на круизе, но у нас нет БД, поэтому одразумеваю, что в описание круиза есть данные о свободных местах
        $x = new mysqli("localhost", "root", "", "api");
        $sql = "SELECT `free_tickets` FROM `CRUISES` WHERE `id`='" . $_POST['from']['id'] . "'";
        $res = $x->query($sql);
        $res_mas = $res->fetch_assoc();

        //проверяем, если кол-во мест больше или равно кол-ву пассажиров
        if ($res_mas['free_tickets'] >= $pass_num) {
            //делаем бронирование, опять же, нет БД у нас, поэтому не очень понятно как организовано бронирование
            //сделаю отдельную запись в таблице для каждого указанного путешественника
            foreach ($pass as $each_pass) {
                $sql = "INSERT INTO `bookings` (`id`, `from`, `id_cruise`, `first_name`, `last_name`, `document_number`) VALUES ('NULL', '" . $_POST['from']['date'] . "', '" . $_POST['from']['id'] . "', '" . $each_pass['first_name'] . "', '" . $each_pass['last_name'] . "', '" . $each_pass['document_number'] . "')";
                $x->query($sql);
            }
            $error = array("code" => "QSAS");
            $json_out = json_encode($error); //преобр. массива в json
            echo $json_out;
        } else {
            $error = array("code" => "422", "message" => "Validation error", "errors" => "No tickets");
            $json_out = json_encode($error); //преобр. массива в json
            echo $json_out;
        }
    } else {
        $error = array("code" => "422", "message" => "Validation error", "errors" => "Some data is empty");
        $json_out = json_encode($error); //преобр. массива в json
        echo $json_out;
    }
} else {
    $error = array("code" => "422", "message" => "Validation error", "errors" => "No data");
    $json_out = json_encode($error); //преобр. массива в json
    echo $json_out;
}
?>