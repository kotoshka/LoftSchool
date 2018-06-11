<?php
/**
 * Created by PhpStorm.
 * User: Сабзира
 * Date: 10.06.2018
 * Time: 12:47
 */
function pre($smth)
{
    echo '<pre>';
    print_r($smth);
    echo '</pre>';
}

function task1($src)
{
    $report = '';
    $file = file_get_contents($src);
    $xml = new SimpleXMLElement($file);
    $report .= '<b>Order № ' . $xml->attributes()->PurchaseOrderNumber->__toString();
    $report .= ' from ' . $xml->attributes()->OrderDate->__toString() . '</b><br><br>';
    foreach ($xml as $xmlItem) {
        switch ($xmlItem->getName()) {
            case 'Address':
                $report .= '<b>' . $xmlItem->attributes()->Type . ' adress</b><br>';
                $report .= 'Name: ' . $xmlItem->Name->__toString() . ' <br>';
                $report .= 'Adress: ' . $xmlItem->Zip->__toString() . ' ';
                $report .= $xmlItem->Country->__toString() . ' ';
                $report .= $xmlItem->State->__toString() . ' ';
                $report .= $xmlItem->City->__toString() . ' ';
                $report .= $xmlItem->Street->__toString() . ' <br><br>';
                break;
            case 'DeliveryNotes':
                $report .= '<b>' . $xmlItem->getName() . ':</b> ' . $xmlItem . ' <br><br>';
                break;
            case 'Items':
                $report .= '<b>' . $xmlItem->getName() . ': ' . '</b><br>';
                foreach ($xmlItem as $product) {
                    $report .= 'PartNumber: ' . $product["PartNumber"] . '<br>';
                    foreach ($product as $prodParam) {
                        $report .= $prodParam->getName() . ' - ' . $prodParam . '<br>';
                    }
                    $report .= '<br>';
                }
                break;
        }
    }
    return $report;
}

function task2(array $array)
{
    $json = json_encode($array);
    $file = fopen('output.json', 'w');
    file_put_contents('output.json', $json);
    fclose($file);

    $triggerChange = rand(0, 1);

    if ($triggerChange === 1) {
        $array['first'] = [
            '1' => rand(1, 5),
            '2' => 2,
        ];
        $json = json_encode($array);
        $file = fopen('output2.json', 'w');
        file_put_contents('output2.json', $json);
        fclose($file);
    }

    $file1 = file_get_contents('output.json');
    $file2 = file_get_contents('output2.json');

    $array1 = json_decode($file1, true);
    $array2 = json_decode($file2, true);

    $result = array_diff($array1, $array2);
    return $result;
}

function task3()
{
    $array = [];
    for ($i = 0; $i <= 55; $i++) {
        $array[] = rand(1, 999);
    }
    $file = fopen('file.csv', 'w');
    fputcsv($file, $array);
    fclose($file);
    $csv = fopen('file.csv', 'r');
    $arCsv = fgetcsv($csv);
    $total = 0;
    foreach ($arCsv as $item) {
        if ($item % 2 === 0) {
            $total += $item;
        }
    }
    return $total;
}

function task4($url)
{
    $json = file_get_contents($url);
    if (empty($json)) {
        return 'некорректный адрес файла';
    }
    $array = json_decode($json, true);
    foreach ($array['query']['pages'] as $page) {
        foreach ($page as $key => $value) {
            switch ($key) {
                case title:
                    $title = $value;
                    break;
                case pageid:
                    $pageId = $value;
                    break;
            }
        }
    }
    return 'title: ' . $title . ', page_id: ' . $pageId;
}
