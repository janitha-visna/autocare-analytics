<?php

namespace App\Handlers\ServiceEntry;

use App\DTOs\ServiceEntryData;
use App\Handlers\ServiceEntry\ServiceEntryAnalyticsHandler;
use App\Helpers\ResponseFormatter;

class ServiceEntryCoordinator
{
    public function handle(ServiceEntryData $data): array
    {
        try {
            // Initialize the analytics handler
            $analyticsHandler = new ServiceEntryAnalyticsHandler();

            // Call handle with only $data
            $analyticsResult = $analyticsHandler->handle($data);

            // Check for failure
            if (!$analyticsResult['success']) {
                throw new \Exception($analyticsResult['message']);
            }

            // You can include additional logic here if needed

            return ResponseFormatter::success(
                'Service entry processed successfully',
                ['entry_id' => $analyticsResult['entry_id']]
            );
        } catch (\Exception $e) {
            return ResponseFormatter::error(
                'Processing failed: ' . $e->getMessage(),
                'PROCESSING_ERROR'
            );
        }
    }
}
