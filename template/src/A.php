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
        var_dump($result);
    }

    /**
     * This is abstract method
     * @return mixed
     */
    public abstract function compute();
}