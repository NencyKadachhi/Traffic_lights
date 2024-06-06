<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TrafficLight;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrafficLightsController extends Controller
{
    public function store(Request $request)
    {
        try {
            $request_data = $request->all();
            if (isset($request_data) && count($request_data) > 0) {
                $store = new TrafficLight();
                $store->light_a = $request_data['first_inp'];
                $store->light_b = $request_data['sec_inp'];
                $store->light_c = $request_data['third_inp'];
                $store->light_d = $request_data['four_inp'];
                $store->green_light_time = $request_data['green_l_i'];
                $store->yellow_light_time = $request_data['yellow_l_i'];
                if ($store->save()) {
                    return true;
                } else {
                    return false;
                }
            }
        } catch (Exception $e) {
            logger($e);
            return false;
        }
    }
    public function get()
    {
        try {
            $data = DB::table('traffic_lights')->latest()->first();
            if (isset($data) && !empty($data)) {
                return json_encode($data);
            }else {
                return false;
            }
        } catch (Exception $e) {
            logger($e);
            return false;
        }
    }
}
