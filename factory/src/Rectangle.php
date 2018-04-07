<?php

namespace Patterns;


class Rectangle implements iShape
{
    private $width;
    private $height;

    public function __construct($width, $height)
    {
        echo 'Rectangle:' . EOL;
        list($this->width, $this->height) = [$width, $height];
    }

    private function drawWidth($char)
    {
        for($i=0; $i < $this->width; $i++) {
            echo $char;
        }
    }

    private function drawHeight($char)
    {
        $tmpWidth = $this->width;
        $this->width = $this->width - 2;
        for($i=0; $i < $this->height/2; $i++) {
            echo $char;
            $this->drawWidth(SPC);
            echo $char;
            echo EOL;
        }

        $this->width = $tmpWidth;
    }
    public function draw()
    {
        $this->drawWidth('-');
        echo EOL;
        $this->drawHeight('.');
        $this->drawWidth('-');
        echo EOL;
    }
}