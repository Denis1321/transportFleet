<?php
declare(strict_types=1);

namespace App\TransportFleet;

use App\Interface\VehicleInterface;
use App\Vehicle\Car;
use Illuminate\Support\Collection;

class TransportFleet
{
    private Collection $transports;
    private int $max_num_of_vehicles;
    public function __construct(int $max_num_of_vehicles)
    {
        $this->max_num_of_vehicles = $max_num_of_vehicles;
        $this->transports = collect([]);
    }
    public function addVehicle(VehicleInterface $vehicle):bool
    {
        if ($this->transports->count() === $this->max_num_of_vehicles){
            return false;
        }
        $this->transports->add($vehicle);
        return true;
    }
    public function getMaxPriceVehicle(): VehicleInterface
    {
        return $this->transports->sort(function (VehicleInterface $item){
            return $item->getPrice();
        })->first();
    }
    public function getFullPriceTransportFleet(): float
    {
        $fullPrice = 0.0;
        $this->transports->each(function (VehicleInterface $item) use (&$fullPrice){
            if (!empty($item->getPrice())){
                $fullPrice += $item->getPrice();
            }
        });
        return $fullPrice;
    }

    public function getAllCars(): Collection
    {
        return $this->transports->filter(function (VehicleInterface $item){
            if ($item instanceof Car){
                return $item;
            }
            return false;
        });
    }
    public function getAveragePrice(): float
    {
        return $this->getFullPriceTransportFleet() / $this->transports->count();
    }
}