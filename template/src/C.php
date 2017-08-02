<?php

namespace Temp;

class C extends A
{
    function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    public function compute()
    {
        $result = $this->a * $this->b;
        $this->showResult($result);
    }

}