<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
     protected $fillable = [
         'employee_name', 'email', 'vendor', 'car_type', 'request_date', 'request_time', 'location', 'pickup','visit', 'destination', 'accept', 'send_car', 'request_for', 'division', 'complete'
    ];
}
