<?php

use Temp\B;
use Temp\C;

require "vendor/autoload.php";

$b = new B(2,3);
$b->compute();

$c = new C(2, 3);
$c->compute();