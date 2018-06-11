<?php
/**
 * Created by PhpStorm.
 * User: Сабзира
 * Date: 10.06.2018
 * Time: 12:47
 */
require_once('src/functions.php');

//task1
echo task1('data.xml');
echo '<hr><br>';

//task2
$array = [
    'first' => 1,
    'second' => 2,
    'third' => 'Третий',
    'fourth' => 444,
    'fifth' => [
        '51' => 'something',
        '52' => 555,
    ],
];
pre(task2($array));
echo '<hr><br>';

//task3
echo task3();
echo '<hr><br>';

//task4
echo task4('https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json');
