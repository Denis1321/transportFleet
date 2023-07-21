<?php
declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

use App\Vehicle\Car;
use App\Vehicle\Helicopter;
use App\Vehicle\Motorbike;
use App\TransportFleet\TransportFleet;

$car1 = new Car(model: 'BMW', speed: 256, price: 12600.00);
$car2 = new Car(model: 'Mercedes', speed: 265, price: 13000.00);

$helicopter = new Helicopter(model: 'B-12', speed: 260, price: 440000.00);
$motorbike = new Motorbike(model: 'Harley-Davidson', speed: 180, price: 33000);

$transportFleet = new TransportFleet(4);

if ($transportFleet->addVehicle($car1)){
    echo 'Car BMW added!' . PHP_EOL;
}
if ($transportFleet->addVehicle($helicopter)){
    echo 'Helicopter B-12 added!' . PHP_EOL;
}
if ($transportFleet->addVehicle($motorbike)){
    echo 'Motorbike Harley-Davidson added!' . PHP_EOL;
}
if ($transportFleet->addVehicle($car2)){
    echo 'Car Mercedes added!' . PHP_EOL;
}
if (!$transportFleet->addVehicle($car2)){
    echo 'Second Car Mercedes not added!' . PHP_EOL;
}

echo 'Full Price Transport Fleet = ' . $transportFleet->getFullPriceTransportFleet() . PHP_EOL;
$maxPriceVehicle = $transportFleet->getMaxPriceVehicle();
echo 'Max Price Transport Fleet is ' . $maxPriceVehicle->getInfo() . PHP_EOL;
echo 'Average Price Transport Fleet = ' . $transportFleet->getAveragePrice() . PHP_EOL;
$cars = $transportFleet->getAllCars();
echo 'Transport Fleet has ' . $cars->count() . 'cars is:' . PHP_EOL;
$cars->each(function (Car $item){
    echo $item->getInfo() . PHP_EOL;
});