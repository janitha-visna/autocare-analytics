<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceEntryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Set to false if you want to add auth logic
    }

    public function rules(): array
    {
        return [
            'phone' => 'required|string',
            'vehicle_number' => 'required|string',
            'vehicle_type' => 'required|string',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'amount' => 'required|numeric|min:0',
            'category_service' => 'required|string',
        ];
    }
}
