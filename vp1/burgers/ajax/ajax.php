<?php
require_once('../admin/functions.php');

if ($_POST['email']) {
    $mysqli = new mysqli("localhost", "root", "", "vp1");
    $email = $_POST['email'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    // проверка существования пользователя
    $stmt = $mysqli->prepare("SELECT ID from users WHERE EMAIL = (?)");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows) {
        $data = $result->fetch_array(MYSQLI_ASSOC);
        $userId = $data['ID'];
    } else {
        //добавляем покупателя
        $add = $mysqli->prepare("INSERT INTO users (EMAIL, NAME, PHONE) VALUES (?, ?, ?)");
        $add->bind_param('sss', $email, $name, $phone);
        $add->execute();
        $userId = $add->insert_id;
    }
    //добавляем заказ
    $address = $_POST['street'] . ' ' . $_POST['home'] . ' ' . $_POST['part'] . ' ' .
        $_POST['appt'] . ' ' . $_POST['floor'];
    $orderInfo = $_POST['payment'] . ', ' . $_POST['callback'];
    $comment = $_POST['comment'];
    $addOrder = $mysqli->prepare("INSERT INTO orders (USER_ID, ADRESS, ORDER_INFO, COMMENT) VALUES (?, ?, ?, ?)");
    $addOrder->bind_param('isss', $userId, $address, $orderInfo, $comment);
    $addOrder->execute();
    $orderId = $addOrder->insert_id;
    //отправка письма и добавление в файл
    if ($orderId) {
        $count = $mysqli->prepare("SELECT count(*) AS CNT from orders WHERE USER_ID = (?)");
        $count->bind_param('i', $userId);
        $count->execute();
        $result = $count->get_result();
        $ordersCount = 0;
        if ($result->num_rows) {
            $data = $result->fetch_array(MYSQLI_ASSOC);
            $ordersCount = $data['CNT'];
        }
        if ($ordersCount > 1) {
            $thanks = 'Спасибо! Это уже ' . $ordersCount . ' заказ!';
        } else {
            $thanks = 'Спасибо - это ваш первый заказ!';
        }
        $message = '<h2>Заказ № ' . $orderId . '</h2><br>' .
            'Ваш заказ будет доставлен по адресу: ' . $address . '<br>' .
            'Содержимое заказа: DarkBeefBurger за 500 рублей - 1 шт<br>' . $thanks . '<br>';

        /*на хостинге работает (http://prntscr.com/jtrw2t)
        $headers = "Content-type: text/html; charset=utf-8\r\n";
        mail($email, 'Информация о заказе', $message, $headers);*/

        // http://prntscr.com/k14gla - работает!
        swiftMail('Информация о заказе', $email, $message);

        // запишем в файл
        $message = 'Заказ № ' . $orderId . PHP_EOL .
            'Ваш заказ будет доставлен по адресу: ' . $address . PHP_EOL .
            'Содержимое заказа: DarkBeefBurger за 500 рублей - 1 шт' . PHP_EOL . $thanks . PHP_EOL .
            'Дата заказа: ' . date('d.m.Y H:i') . PHP_EOL;
        file_put_contents('orders.txt', $message, FILE_APPEND);
    }
    $data = ['status' => 'ok', 'text' => 'Спасибо за заказ!'];
    echo json_encode($data);
} else {
    $data = ['status' => 'error', 'text' => 'Не заполнен email!'];
    echo json_encode($data);
}
