<?php
declare(strict_types=1);

namespace App\Abstract;

use App\Interface\VehicleInterface;

abstract class Vehicle implements VehicleInterface
{
    protected string $nameVehicle;
    protected string $model;
    protected int $speed;
    protected float $price;

    public function __construct(string $model, int $speed, float $price)
    {
        $this->model = $model;
        $this->speed = $speed;
        $this->price = $price;
    }

    public function getModel(): string
    {
        return $this->model;
    }
    public function getSpeed(): int
    {
        return $this->speed;
    }
    public function getPrice(): float
    {
        return $this->price;
    }
}