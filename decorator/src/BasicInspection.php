<?php
namespace Deco;

class BasicInspection implements  CarService
{
    public function getCost()
    {
        return 20;
    }
}