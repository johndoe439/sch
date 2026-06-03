<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    //

    protected $casts = [
        'package_images' => 'array',        // Important!
        'dispatch_date' => 'date',
        'delivery_date' => 'date',
        'amount' => 'decimal:2',
    ];



    protected $guarded = [];


    public static function generateTrackingNumber()
    {
        do {
            $number = 'SPR' . strtoupper(substr(uniqid(), -8));
        } while (self::where('tracking_number', $number)->exists());

        return $number;
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
