<?php

require 'vendor/autoload.php';

use Stra\Strategy;
use Stra\FileLogger;
use Stra\DatabaseLogger;

$app = new Strategy();
$app->log('Some action happened.', new FileLogger());