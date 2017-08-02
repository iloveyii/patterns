<?php

namespace Chain;

use Chain\HomeStatus;

abstract class HomeChecker
{
    protected $successor = null;

    protected abstract function check(HomeStatus $home);

    public function setSuccessor($successor)
    {
        $this->successor = $successor;
    }

    protected function next(HomeStatus $home)
    {
        if( ! is_null($this->successor)) {
            $this->successor->check($home);
        }
    }
}