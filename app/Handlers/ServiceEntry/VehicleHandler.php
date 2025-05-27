<?php

namespace App\Handlers\ServiceEntry;

use App\DTOs\ServiceEntryData;

class VehicleHandler
{
    public function handle(ServiceEntryData $data): array
    {
        try {
            // Example business logic validation
            if ($data->vehicleType === 'TRUCK' && $data->amount < 100) {
                return [
                    'success' => false,
                    'message' => 'Truck service amount must be at least 100',
                    'error_code' => 'INVALID_TRUCK_AMOUNT'
                ];
            }

            return [
                'success' => true,
                'message' => 'Vehicle processed successfully',
                'data' => [
                    'vehicle_id' => uniqid(), // Replace with actual ID
                    'service_type' => $data->categoryService
                ]
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Vehicle processing failed: ' . $e->getMessage(),
                'error_code' => 'VEHICLE_ERROR'
            ];
        }
    }
}
