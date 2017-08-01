<?php
namespace Deco;

class OilChange
{
    protected $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }


    public function getCost()
    {
        return 25 + $this->carService->getCost();
    }
}