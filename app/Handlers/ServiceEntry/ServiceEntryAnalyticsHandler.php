<?php

namespace App\Handlers\ServiceEntry;

use Illuminate\Support\Facades\Log;
use App\DTOs\ServiceEntryData;
use App\Models\ServiceEntryAnalytics;
use Illuminate\Support\Str;

class ServiceEntryAnalyticsHandler
{
    public function handle(ServiceEntryData $data): array
    {
        try {
            Log::channel('service_entry')->debug('Custom log test', ['data' => $data]);

            
            $formattedVehicleId = $this->formatVehicleId($data->vehicleNumber);

            // Calculate duration
            $totalDuration = $data->startTime->diffInMinutes($data->endTime);

            // Determine time of day
            $timeOfDay = $this->determineTimeOfDay($data->startTime->hour);

            $entry = ServiceEntryAnalytics::create([
                'vehicle_id' => $formattedVehicleId,
                'date' => $data->date->toDateString(),
                'year' => $data->date->year,
                'month' => $data->date->month,
                'day_of_week' => $data->date->format('l'),
                'total_duration' => $totalDuration,
                'category_service' => $data->categoryService,
                'vehicle_type' => $data->vehicleType,
                'amount' => $data->amount,
                'time_of_day' => $timeOfDay,
            ]);

            Log::channel('service_entry')->debug('Saved Entry', ['entry' => $entry->toArray()]);

            return [
                'success' => true,
                'message' => 'Entry saved successfully',
                'entry_id' => $entry->entry_id,
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => 'Failed to save entry: ' . $e->getMessage(),
            ];
        }
    }

    private function formatVehicleId(string $vehicleId): string
    {
        $words = preg_split('/\s+/', $vehicleId);
        $result = [];

        foreach ($words as $word) {
            $result[] = Str::upper($word);
        }

        return implode(' ', $result);
    }

    private function determineTimeOfDay(int $hour): string
    {
        return $hour < 12 ? 'Morning' : 'Afternoon';
    }
}
