<?php

namespace Stra;

class DatabaseLogger implements Logger
{
    public function log(String $msg)
    {
        var_dump('Logging to database: ' . $msg);
    }
}