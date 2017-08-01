<?php

require "vendor/autoload.php";

use Deco\BasicInspection;
use Deco\OilChange;

echo ( new OilChange(new BasicInspection()))->getCost();
echo PHP_EOL;