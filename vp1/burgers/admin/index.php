<?php
/**
 * Created by PhpStorm.
 * User: Сабзира
 * Date: 12.06.2018
 * Time: 17:34
 */

$mysqli = new mysqli("localhost", "root", "", "vp1");
// вывод всех пользоветелей
$result = $mysqli->query("SELECT * from users");
if ($result->num_rows) {
    $arUsers = $result->fetch_all(MYSQLI_ASSOC);
    echo '<h2>Список пользователей</h2>';
    echo '<table style="border-collapse: collapse">';
    foreach ($arUsers as $key => $arUser) {
        echo '<tr>';
        if ($key === 0) {
            foreach ($arUser as $prop => $userInfo) {
                echo '<td style="border: 1px solid black">' . $prop . '</td>';
            }
            echo '</tr><tr>';
        }
        foreach ($arUser as $userInfo) {
            echo '<td style="border: 1px solid black">' . $userInfo . '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
}
// вывод всех заказов
$result = $mysqli->query("SELECT * from orders");
if ($result->num_rows) {
    $arUsers = $result->fetch_all(MYSQLI_ASSOC);
    echo '<h2>Список заказов</h2>';
    echo '<table style="border-collapse: collapse">';
    foreach ($arUsers as $key => $arUser) {
        echo '<tr>';
        if ($key === 0) {
            foreach ($arUser as $prop => $userInfo) {
                echo '<td style="border: 1px solid black">' . $prop . '</td>';
            }
            echo '</tr><tr>';
        }
        foreach ($arUser as $userInfo) {
            echo '<td style="border: 1px solid black">' . $userInfo . '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
}
