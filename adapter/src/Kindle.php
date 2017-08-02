<?php

namespace Adapt;

class Kindle implements KindleInterface
{
    public function turnOn()
    {
        var_dump("Turning on kindle device");
    }

    public function pressNext()
    {
        var_dump("Pressing next button on kindle device");
    }
}