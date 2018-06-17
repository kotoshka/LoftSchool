<?php

namespace Kopose\LoftSchool\dz4;

require_once('TariffInterface.php');

require_once('AdditionalDriver.php');
require_once('Gps.php');

require_once('Tariff.php');

require_once('BasicTariff.php');
require_once('DailyTariff.php');
require_once('HourlyTariff.php');
require_once('StudentTariff.php');

$basicTariff = new BasicTariff(10, 60, 20, ['Gps']);
$basicTariffCost = $basicTariff->countTotalPrice();
echo $basicTariffCost . '<br>';

$hourlyTariff = new HourlyTariff(20, 145, 29, ['Gps', 'AdditionalDriver']);
$hourlyTariffCost = $hourlyTariff->countTotalPrice();
echo $hourlyTariffCost . '<br>';

$dailyTariff = new DailyTariff(20, 1470, 29, ['Gps', 'AdditionalDriver']);
$dailyTariffCost = $dailyTariff->countTotalPrice();
echo $dailyTariffCost . '<br>';

$studentTariff = new StudentTariff(20, 20, 24, ['Gps']);
$studentTariffCost = $studentTariff->countTotalPrice();
echo $studentTariffCost . '<br>';
