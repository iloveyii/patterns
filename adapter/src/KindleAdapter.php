<?php

namespace Adapt;


class KindleAdapter implements BookInterface
{
    private $kindle;

    public function __construct(KindleInterface $kindle)
    {
        $this->kindle = $kindle;
    }

    public function open()
    {
        $this->kindle->turnOn();
    }

    public function turnPage()
    {
        $this->kindle->pressNext();
    }
}