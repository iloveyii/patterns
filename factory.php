<?php

define('EOL', php_sapi_name()=='cli' ? PHP_EOL : '<br/>');
define('SPC', php_sapi_name()=='cli' ? ' ' : '&nbsp;');

/**
 * Design pattern - Factory
 *
 * @author: Hazrat Ali
 * @mail: iloveyii@yahoo.com
 * Date: 2016-07-30
 */
interface iShape
{
    public function draw();
}
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

class ShapeFactory
{
    private $types = ['Rectangle', 'Square'];

    public function create($type)
    {
        if( ! in_array($type, $this->types)) {
            die('Invalid type ' . $type . ', valid types are ' . implode(',', $this->types) . EOL);
        }

        if($type == 'Rectangle') {
            return new Rectangle(50, 15);
        }

        if($type == 'Square') {
            return new Square(20);
        }
    }
}

// TEST DRIVE

// normal way of creating and using objects
$rect = new Rectangle(50, 15);
$rect->draw();

$sqr = new Square(20);
$sqr->draw();

// factory way of creating and using objects
$fac = new ShapeFactory();
$fac->create('Rectangle')->draw();

$fac->create('Square')->draw();

$fac->create('Triangle')->draw();