<?php
require "vendor/autoload.php";

use Chain\HomeStatus;
use Chain\Lock;
use Chain\Lights;
use Chain\Alarm;


$lock = new Lock();
$lights = new Lights();
$alarm = new Alarm();

$lock->setSuccessor($lights);
$lights->setSuccessor($alarm);

$homeStatus = new HomeStatus();
$lock->check($homeStatus);
echo PHP_EOL;

