<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use App\Models\Property;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $properties = Property::withCount(['community', 'owner', 'rent'])->get();
        $percentage = Property::Percentage() ?? 0;
        
        //dd($properties[0]->rent()->get());
        // $startTime = strtotime($properties[0]->rent[0]->from);
        // $finisTime = strtotime($properties[0]->rent[0]->to);
        // dd(($finisTime - $startTime) / 86400);
        // dd($properties[0]->rent[0]->from);
        return view('admin.properties.index', [
            'properties' => $properties,
            'percentage' => $percentage,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create New Property';
        $property = new Property();
        $amenities = Amenity::all();
        return view('admin.properties.create', [
            'title' => $title,
            'property' => $property,
            'amenities' => $amenities
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->merge([
            'date_added' => Carbon::now(),
            'community_id' => 1,
            ''
        ]);
        $isSaved = Property::create($request->all());
        if ($isSaved) {
            return redirect()->route('properties.index');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $property = Property::findOrfail($id);
        $isUpdated = $property->update($request->all());
        if ($isUpdated) {
            return redirect()->route('properties.index');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
