<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrafficLight extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "traffic_lights";
    protected $fillable = ['id', 'light_a', 'light_b', 'light_c', 'light_d', 'green_light_time', 'yellow_light_time'];
}
