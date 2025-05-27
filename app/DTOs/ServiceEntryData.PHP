<?php

namespace App\DTOs;

use Carbon\Carbon;

class ServiceEntryData
{
    public string $phone;
    public string $vehicleNumber;
    public string $vehicleType;
    public Carbon $date;
    public Carbon $startTime;
    public Carbon $endTime;
    public float $amount;
    public string $categoryService;


    public function __construct(array $data)
    {
        $this->phone = $data['phone'];
        $this->vehicleNumber = $data['vehicle_number'];
        $this->vehicleType = $data['vehicle_type'];
        $this->date = Carbon::parse($data['date']);
        $this->startTime = Carbon::parse($data['start_time']);
        $this->endTime = Carbon::parse($data['end_time']);
        $this->amount = $data['amount'];
        $this->categoryService = $data['category_service'];
    }
}
