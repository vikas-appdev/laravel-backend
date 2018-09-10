<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $fillable = ['order_id', 'order_status', 'car_type', 'car_destination', 'car_no', 'driver_name', 'driver_no', 'remarks'];
}
