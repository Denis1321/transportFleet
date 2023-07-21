<?php
declare(strict_types=1);

namespace App\Interface;

interface VehicleInterface
{
    public function getModel();
    public function getPrice();
    public function getSpeed();

    /**
     * method return transport information like {Vehicle}: {Model}, {Speed} km/h, ${Price}
     */
    public function getInfo();
}