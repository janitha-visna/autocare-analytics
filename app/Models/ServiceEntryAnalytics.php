<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceEntryAnalytics extends Model
{
    use HasFactory;

    //set the primary key name
    protected $primaryKey = 'entry_id';

    // Ensure the key is auto-incrementing and of type integer
    public $incrementing = true;
    protected $keyType = 'int';

    // Specify the table name
    protected $table = 'service_entry_analytics';

    // Mass assignable fields
    protected $fillable = [
        'vehicle_id',
        'date',
        'year',
        'month',
        'day_of_week',
        'total_duration',
        'category_service',
        'vehicle_type',
        'amount',
        'time_of_day',
    ];
}
