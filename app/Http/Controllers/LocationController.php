<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Zone;

class LocationController extends Controller
{
    public function index()
	{
		$zones = Zone::with('locations')->get();
		
		return view('backend.zone.location.index', compact('zones'));
	}

	public function create()
	{
        $zones = Zone::all();
		return view('backend.zone.location.create', compact('zones'));
	}

	public function store(Request $request)
	{
        // dd('test');
		$request->validate([
            'zone_id' => 'required',
			'name' => 'required',
		]);

		try{
			Location::create($request->all());
	
		}
		catch (\Exception $e){
			$request->session()->flash('unsuccessMessage', 'Failed to add new location !!!');
			return redirect()->back();
		}

		$request->session()->flash('successMessage', 'Zone created successfully !!!');
		return redirect()->route('location.index');
	}

	public function show($id)
	{
			//
	}

	public function edit($id)
	{
		$location = Location::where('id', $id)->first();
        $zones = Zone::all();

		return view('backend.zone.location.edit', compact('location', 'zones'));
	}

	public function update(Request $request, $id)
	{
		$request->validate([
			'zone_id' => 'required',
			'name' => 'required',
		]);

		try{
			$location = Location::where('id', $id)->first();
            $location->zone_id = $request['zone_id'];
			$location->name = $request['name'];
			$location->update();
		}
		catch (\Exception $e){
			$request->session()->flash('unsuccessMessage', 'Failed to update a location !!!');
			return redirect()->back();
		}

		$request->session()->flash('successMessage', 'Location updated successfully !!!');
		return redirect()->route('location.index');
	}

	public function destroy(Request $request, $id)
	{
		try{
			Location::where('id', $id)->delete();
		}
		catch(\Exception $e){
			$request->session()->flash('unsuccessMessage', 'Failed to delete a location !!!');
			return redirect()->back();
		}

		$request->session()->flash('successMessage', 'Location deleted successfully !!!');
		return redirect()->route('location.index');

	}

	public function getLocation($zoneId, Request $request)
	{
		if ($request->ajax()){
			$locations = Location::where('zone_id', $zoneId)->get();

			return response()->json($locations);
		}
	}
}
