<?php
define('EOL', php_sapi_name()=='cli' ? PHP_EOL : '<br/>');
define('SPC', php_sapi_name()=='cli' ? ' ' : '&nbsp;');

interface ProductObserver
{
    public function update();
}

class Notifier implements ProductObserver
{
    private $product;

    public function setProduct(ProductSubject $subject)
    {
        $this->product = $subject;
    }

    public function update()
    {
        $newPrice = $this->product->getPrice();
        echo 'Sending out notifications about price change to: ' . $newPrice . EOL;
    }
}

abstract class ProductSubject
{
    private $observers;

    public function register(ProductObserver $observer)
    {
        $observer->setProduct($this);
        $this->observers[] = $observer;
    }

    public function notify()
    {
        foreach($this->observers as $observer) {
            $observer->update();
        }
    }
}

/**
 * Class - Hard Disk
 *
 * @author: Hazrat Ali
 * @mail: iloveyii@yahoo.com
 * Date: 2016-07-31
 */
class HardDisk extends ProductSubject
{
    private $price;

    public function setPrice($price)
    {
        $this->price = $price;
        $this->notify();
    }

    public function getPrice()
    {
        return $this->price;
    }
}

// TEST DRIVE
$product = new HardDisk();
$product->register(new Notifier());

// now change price to trigger price change
$product->setPrice(50);
