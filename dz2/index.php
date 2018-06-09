<?php
require('src/functions.php');

//task1
$array = ['i am a string', 'i am an another string', 'i am a third string'];
task1($array);
$string = task1($array, true);
echo nl2br($string . PHP_EOL);
echo '<hr><br>';

//task2
$res = task2('+', 2, 4, 5, 6, 7.5);
echo nl2br($res . PHP_EOL);
/* вариации со знаком
$res = task2('-', 2, 4, 5, 6, 7.5);
echo nl2br($res . PHP_EOL);
$res = task2('*', 2, 4, 5, 6, 7.5);
echo nl2br($res . PHP_EOL);
$res = task2('/', 2, 4, 5, 6, 7.5);
echo nl2br($res . PHP_EOL);
$res = task2('not a sign', 2, 4, 5, 6, 7.5);
echo nl2br($res . PHP_EOL);*/
/* вариации с числами
$res = task2('+', '6', 4, 5, 6, 7.5);
echo nl2br($res . PHP_EOL);
*/
echo '<hr><br>';

//task3
task3(4, 7);
//task3('5', 7);
echo '<hr><br>';

//task4
task4('d.m.Y H:i');
task5('24.02.2016 00:00:00');
echo '<hr><br>';

//task5
task6('Карл у Клары украл Кораллы');
task7('Две бутылки лимонада');
echo '<hr><br>';

//task6
task8('Hello again!');
task9('test.txt');
