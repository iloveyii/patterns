<?php

namespace Patterns;


class Square implements iShape
{
    private $width;
    private $height;

    public function __construct($length)
    {
        echo 'Square:' . EOL;
        list($this->width, $this->height) = [$length, $length];
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
        for($i=0; $i < $this->height/3; $i++) {
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