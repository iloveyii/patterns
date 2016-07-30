<?php
/**
 * Design pattern - Factory
 * The extended version contains an array of instances
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
            $this->drawWidth(' ');
            echo $char;
            echo PHP_EOL;
        }

        $this->width = $tmpWidth;
    }
    public function draw()
    {
        $this->drawWidth('-');
        echo PHP_EOL;
        $this->drawHeight('.');
        $this->drawWidth('-');
        echo PHP_EOL;

    }
}

class Square implements iShape
{
    private $width;
    private $height;

    public function __construct($length)
    {
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
            $this->drawWidth(' ');
            echo $char;
            echo PHP_EOL;
        }

        $this->width = $tmpWidth;
    }
    public function draw()
    {
        $this->drawWidth('-');
        echo PHP_EOL;
        $this->drawHeight('.');
        $this->drawWidth('-');
        echo PHP_EOL;
    }


}


// TEST DRIVE

$rect = new Rectangle(50, 15);
$rect->draw();


$sqr = new Square(20);
$sqr->draw();