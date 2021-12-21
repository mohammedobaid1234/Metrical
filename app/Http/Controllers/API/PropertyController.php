<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{

    public function index()
    {

        $properties = Property::with(['community', 'offer'])->paginate(5);
        return [
            'status' => 200,
            'message' => __('messages.properties'),
            'data' => $properties,
        ];
    }


    public function show($id)
    {
        $properties = Property::with(['community', 'offer'])->where('id', $id)->get();


        return [
            'status' => 200,
            'message' => __('messages.properties'),
            'data' => $properties,
        ];
    }

    public function Status($status)
    {
        $properties = Property::with('community')->where('status', $status)->get();
        return [
            'status' => 200,
            'message' => __('messages.properties'),
            'data' => $properties,
        ];
    }

    public function shortTerm()
    {
        $properties = Property::with('community')->where('is_shortterm', 1)->get();
        if ($properties != null) {
            return [
                'status' => 200,
                'message' => __('messages.properties'),
                'data' => $properties,
            ];
        }
    }
}
