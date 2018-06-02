<?php
/**
 * Created by PhpStorm.
 * User: Сабзира
 * Date: 02.06.2018
 * Time: 22:09
 */

$name = 'Анна';
$age = '27';
echo nl2br('Меня зовут: ' . $name . PHP_EOL);
echo nl2br('Мне ' . $age . ' лет' . PHP_EOL);
echo nl2br('“!|\/’”\\' . PHP_EOL);
unset($age);

const PICTURES = 80;
const FELT_PEN = 23;
const PENCIL = 40;
$paints = PICTURES - FELT_PEN - PENCIL;
echo nl2br($paints . PHP_EOL);

$age = rand(1, 100);
if (18 <= $age && $age <= 65) {
    echo nl2br('Вам еще работать и работать' . PHP_EOL);
} elseif ($age > 65) {
    echo nl2br('Вам пора на пенсию' . PHP_EOL);
} elseif (1 <= $age && $age <= 17) {
    echo nl2br('Вам ещё рано работать' . PHP_EOL);
} else {
    echo nl2br('Неизвестный возраст”' . PHP_EOL);
}

$day = rand(1, 10);
switch ($day) {
    case (1 <= $day && $day <= 5):
        echo nl2br('Это рабочий день' . PHP_EOL);
        break;
    case ($day == 6 || $day == 7):
        echo nl2br('Это выходной день' . PHP_EOL);
        break;
    case (!(1 <= $day && $day <= 7)):
        echo nl2br('Неизвестный день' . PHP_EOL);
        break;
}

$bmw = array ('model' => 'X5', 'speed' => 120, 'doors' => 5, 'year' => 2015);
$toyota = array ('model' => 'X455', 'speed' => 140, 'doors' => 4, 'year' => 2067);
$opel = array ('model' => 'X7895', 'speed' => 150, 'doors' => 2, 'year' => 2043);
$cars = array ('bmw' => $bmw, 'toyota' => $toyota, 'opel' => $opel);
foreach ($cars as $brand => $carInfo) {
    echo nl2br('CAR ' . $brand . PHP_EOL);
    foreach ($carInfo as $paramValue) {
        echo $paramValue . ' ';
    }
    echo nl2br(PHP_EOL);
}

$table = '<table style="border-collapse:collapse;">';
for ($tr=0; $tr<=9; $tr++) {
    $table .= '<tr>';
    if ($tr == 0) {
        for ($td=0; $td<=9; $td++) {
            if ($td == 0) {
                $table .= '<td style="border:1px solid black;padding:25px;"></td>';
            } else {
                $table .= '<td style="border:1px solid black;padding:25px;">' . $td . '</td>';
            }
        }
    } else {
        for ($td=0; $td<=9; $td++) {
            if ($td == 0) {
                $table .= '<td style="border:1px solid black;padding:25px;">' . $tr . '</td>';
            } else {
                if ($td%2 !=0 && $tr%2 !=0) {
                    $table .= '<td style="border:1px solid black;padding:25px;">[' . $td * $tr . ']</td>';
                } elseif ($td%2 ==0 && $tr%2 ==0) {
                    $table .= '<td style="border:1px solid black;padding:25px;">(' . $td * $tr . ')</td>';
                } else {
                    $table .= '<td style="border:1px solid black;padding:25px;">' . $td * $tr . '</td>';
                }
            }
        }
    }
    $table .= '</tr>';
}
$table .= '</table>';
echo $table;
