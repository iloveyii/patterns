<?php

require "vendor/autoload.php";

use Patterns\Rectangle;
use Patterns\Square;
use Patterns\ShapeFactory;

define('EOL', php_sapi_name()=='cli' ? PHP_EOL : '<br/>');
define('SPC', php_sapi_name()=='cli' ? ' ' : '&nbsp;');

// TEST DRIVE

// normal way of creating and using objects
$rect = new Rectangle(50, 15);
$rect->draw();

$sqr = new Square(20);
$sqr->draw();

// factory way of creating and using objects
$fac = new ShapeFactory();
ShapeFactory::create('Rectangle')->draw();
ShapeFactory::create('Square')->draw();

ShapeFactory::create('Triangle')->draw();