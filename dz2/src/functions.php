<?php

function task1($array, $bool = false)
{
    if ($bool) {
        return implode('; ', $array);
    }
    foreach ($array as $string) {
        echo '<p>' . $string . '</p>';
    }
}

function task2(string $sign, ...$args)
{
    $arSigns = ['+', '-', '*', '/'];
    if (!in_array($sign, $arSigns)) {
        return "Неверно указан знак арифметического действия!";
    }
    if (empty($args)) {
        return "не переданы числа для выполнения арифметического действия!";
    }
    $result = '';
    foreach ($args as $key => $arg) {
        if (!is_int($arg) && !is_float($arg)) {
            return 'Не все аргументы, переданные в функцию, являются числом или дробным числом!';
        }
        if ($key != count($args) -1) {
            $result .= $arg . $sign;
        } else {
            $result .= $arg . ' = ';
        }
        if ($key === 0) {
            $count = $arg;
        } else {
            switch ($sign) {
                case '+':
                    $count = $count + $arg;
                    break;
                case '-':
                    $count = $count - $arg;
                    break;
                case '*':
                    $count = $count * $arg;
                    break;
                case '/':
                    $count = $count / $arg;
                    break;
                default:
                    break;
            }
        }
    }
    $result .= $count;
    return $result;
}

//function task3(int $a, int $b) - так тоже можно,
//но int вначале преобразует в целое число все, что может ('5' , 5.5 => 5)
function task3($a, $b)
{
    if (!is_int($a) || !is_int($b)) {
        echo nl2br('Оба параметра, переданные в функцию, должны быть целым числом!' . PHP_EOL);
        return false;
    }
    $table = '<table style="border-collapse:collapse;">';
    for ($tr=0; $tr<=$a; $tr++) {
        $table .= '<tr>';
        if ($tr === 0) {
            for ($td=0; $td<=$b; $td++) {
                $table .= '<td style="border:1px solid black;padding:25px;">' . ($td === 0 ? '' : $td) . '</td>';
            }
        } else {
            for ($td=0; $td<=$b; $td++) {
                if ($td === 0) {
                    $table .= '<td style="border:1px solid black;padding:25px;">' . $tr . '</td>';
                } else {
                    $table .= '<td style="border:1px solid black;padding:25px;">' . $td * $tr . '</td>';
                }
            }
        }
        $table .= '</tr>';
    }
    $table .= '</table>';
    echo $table;
}

function task4($format)
{
    echo nl2br(date($format) . PHP_EOL);
}

function task5(string $date)
{
    echo nl2br(strtotime($date) . PHP_EOL);
}

function task6(string $str)
{
    $newStr = str_replace('К', '', $str);
    echo nl2br($newStr . PHP_EOL);
}

function task7(string $str)
{
    $newStr = str_replace('Две', 'Три', $str);
    echo nl2br($newStr . PHP_EOL);
}

function task8(string $str)
{
    $file = fopen("test.txt", "w");
    fwrite($file, $str);
    fclose($file);
}

function task9(string $fileName)
{
    $fileContent = file_get_contents($fileName);
    echo nl2br($fileContent . PHP_EOL);
}
