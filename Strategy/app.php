<?php

use Stra\Logger;
use Stra\DatabaseLogger;
use Stra\FileLogger;

class App
{
    public function log($msg, Logger $logger = null)
    {
        if(is_null($logger)) {
            $logger = new DatabaseLogger();
        }

        $logger->log($msg);
    }
}

require 'vendor/autoload.php';
$app = new App();
$app->log('Some action happened.');