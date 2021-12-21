<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Stopoffer;
use Illuminate\Http\Request;

class StopOfferController extends Controller
{
    public function store(Request $request)
    {

        $stop = Stopoffer::create($request->all());

        return [
            'status' => 201,
            'message' => __('messages.Amenity'),
            'data' => $stop,
        ];
    }
}
