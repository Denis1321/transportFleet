<?php
declare(strict_types=1);

namespace App\Vehicle;

use App\Abstract\Vehicle;

class Motorbike extends Vehicle
{
    public function __construct(string $model, int $speed, float $price)
    {
        parent::__construct($model, $speed, $price);
        $this->nameVehicle = 'Motorbike';
    }
    public function getInfo(): string
    {
        return "{$this->nameVehicle}: " . $this->getModel() . ', ' . $this->getSpeed() . ' km/h, $' . (int)$this->getPrice();
    }
}