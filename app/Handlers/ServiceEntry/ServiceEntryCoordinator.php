<?php

namespace App\ServiceEntry;

use App\DTOs\ServiceEntryData;

class ServiceEntryCoordinator
{
    // protected $phoneHandler;
    // protected $vehicleHandler;
    // protected $serviceHandler;

    // public function __construct(
    //     PhoneHandler $phoneHandler,
    //     VehicleHandler $vehicleHandler,
    //     ServiceHandler $serviceHandler,
    // ) {
    //     $this->phoneHandler = $phoneHandler;
    //     $this->vehicleHandler = $vehicleHandler;
    //     $this->serviceHandler = $serviceHandler;
    // }

    public function handle(ServiceEntryData $data)
    // {
    //     $this->phoneHandler->handle($data);
    //     $vehicle = $this->vehicleHandler->handle($data);
    //     $this->serviceHandler->handle($data, $vehicle);
    // }
    {
        echo 'Handle method called with vehicle number'; 
    }
}
