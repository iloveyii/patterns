<?php

namespace Stra;

use Stra\Logger;
use Stra\DatabaseLogger;
use Stra\FileLogger;

class Strategy
{
    public function log($msg, Logger $logger = null)
    {
        if(is_null($logger)) {
            $logger = new DatabaseLogger();
        }

        $logger->log($msg);
    }
}