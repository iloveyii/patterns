<?php

namespace Stra;

class FileLogger implements Logger
{
    public function log(String $msg)
    {
        var_dump('Logging to file: ' . $msg);
    }
}