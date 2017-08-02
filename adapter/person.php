<?php
use Adapt\Person;
use Adapt\Book;


require "vendor/autoload.php";

$person1 = new Person();

$person1->read(new Book());

$person1->read(new \Adapt\KindleAdapter(new \Adapt\Kindle()));