<?php

namespace Kopose\LoftSchool\dz4alternative;

require_once('MoveBackward.php');
require_once('TransmissionAuto.php');
require_once('TransmissionManual.php');

require_once('Engine.php');

require_once('Car.php');
require_once('Toyota.php');
require_once('Mercedes.php');
require_once('Bmv.php');

$engineToyota = new Engine(10);
$toyotaCar = new Toyota($engineToyota);
$toyotaCar->move(200, 80, true);
echo "<br><hr>";

$engineBmv = new Engine(10);
$BmvCar = new Bmv($engineBmv);
$BmvCar->move(500, 100, false);
echo "<br><hr>";

$engineMercedes = new Engine(35);
$MercedesCar = new Mercedes($engineMercedes);
$MercedesCar->move(200, 80, true);
echo "<br><hr>";
