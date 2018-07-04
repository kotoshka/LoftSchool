<?php

require 'config.php';
require 'vendor/autoload.php';
require 'lib/View.php';

use Main\View;

$view = new View();
$view->twigLoad('index', []);
