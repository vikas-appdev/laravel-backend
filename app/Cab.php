<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cab extends Model
{
    protected $fillable = ['owner', 'cab_type', 'car_type', 'visit', 'avg_speed', 'milage', 'base_price','charges_per_distance', 'fuelcharges_per_ltr'];
}
