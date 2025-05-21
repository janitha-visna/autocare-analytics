<?php

namespace App\Http\Controllers\EntryController;

use Illuminate\Http\Request;
use App\DTOs\ServiceEntryData;
use App\Http\Requests\StoreServiceEntryRequest;
use App\ServiceEntry\ServiceEntryCoordinator;
use App\Http\Controllers\Controller;

class ServiceEntryController extends Controller
{

    public function store(StoreServiceEntryRequest $request, ServiceEntryCoordinator $coordinator)
    {
        $data = new ServiceEntryData($request->validated());
        $result = $coordinator->handle($data); // capture return value
        return response()->json(['status' => $result]);
    }
}
