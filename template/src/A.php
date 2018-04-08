<?php

namespace Temp;

abstract class A
{
    protected $a, $b;

    /*
     * This is common between B & C
     */
    protected function showResult($result)
    {
        echo $result . PHP_EOL;
    }

    /**
     * This is abstract method
     * @return mixed
     */
    public abstract function compute();
}