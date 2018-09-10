<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calculate extends Model
{
     protected $fillable = ['order_id', 'start_date', 'start_time', 'open_dist','stop_date', 'stop_time', 'end_dist','total_dist', 'total_time', 'charge', 'total_fuel', 'fuel_charge', 'total_charge', 'previous_balance'];
}
