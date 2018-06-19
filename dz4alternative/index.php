<?php

namespace Kopose\LoftSchool\dz4alternative;

require_once('Engine.php');
require_once('MoveBackward.php');
require_once('TransmissionAuto.php');
require_once('TransmissionManual.php');

require_once('Car.php');
require_once('Toyota.php');


$engine = new Engine(10);
$toyotaCar = new Toyota($engine);
$toyotaCar->move(200, 80, true);
