<?php
/**
 * How to get the type of a parameter in class method
 * For dependency injection
 */
require "../chain/vendor/autoload.php";

//Target our class
$reflector = new ReflectionClass('Chain\Lock');

//Get the parameters of a method
$parameters = $reflector->getMethod('check')->getParameters();

//Loop through each parameter and get the type
foreach($parameters as $param)
{
    //Before you call getClass() that class must be defined!
    echo $param->getClass()->name;
    $param->
    echo PHP_EOL;
}