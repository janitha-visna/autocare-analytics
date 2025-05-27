<?php

namespace App\Http\Controllers\EntryController;

use Illuminate\Http\Request;
use App\DTOs\ServiceEntryData;
use App\Http\Requests\ServiceEntryRequest\StoreServiceEntryRequest;
use App\Handlers\ServiceEntry\ServiceEntryCoordinator;
use App\Http\Controllers\Controller;

class ServiceEntryController extends Controller
{
    public function store(StoreServiceEntryRequest $request, ServiceEntryCoordinator $coordinator)
    {
        try {
            $data = new ServiceEntryData($request->validated());
            $result = $coordinator->handle($data);

            return redirect()->route('service-entry.create')
                ->with('success', 'Service entry created successfully!')
                ->with('entryData', $result);
        } catch (\Exception $e) {
            return redirect()->route('service-entry.create')
                ->with('error', 'Error: ' . $e->getMessage())
                ->withInput();
        }
    }
}