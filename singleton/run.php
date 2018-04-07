<?php

require "vendor/autoload.php";

use Patterns\Singleton;
use Patterns\SingletonX;

define('EOL', php_sapi_name()=='cli' ? PHP_EOL : '<br/>');
define('SPC', php_sapi_name()=='cli' ? ' ' : '&nbsp;');

// TEST DRIVE - Singleton

// object way
$translation = new Singleton('sv');
echo $translation->translate('country') . EOL;

// singleton way - neat and one liner
echo Singleton::getInstance('sv')->translate('country') . EOL;
echo Singleton::getInstance('fr')->translate('country') . EOL;



// TEST DRIVE - SingletonX

// singleton way - neat and one liner
echo SingletonX::getInstance('sv')->translate('country') . EOL;
echo SingletonX::getInstance('fr')->translate('country') . EOL;

echo SingletonX::getInstance('sv')->translate('country') . EOL;