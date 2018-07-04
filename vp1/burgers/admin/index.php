<?php

require '../config.php';
require '../vendor/autoload.php';
require '../lib/View.php';

use Main\View;

$mysqli = new mysqli("localhost", "root", "", "vp1");
$result = $mysqli->query("SELECT * from users");
if ($result->num_rows) {
    $arResult['users'] = $result->fetch_all(MYSQLI_ASSOC);
}
$result = $mysqli->query("SELECT * from orders");
if ($result->num_rows) {
    $arResult['orders'] = $result->fetch_all(MYSQLI_ASSOC);
}
$view = new View();
$view->twigLoad('admin', $arResult);
