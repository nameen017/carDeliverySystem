<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zone;

class ZoneController extends Controller
{
    public function index(Request $request)
	{
		$zones = Zone::paginate(10);
		
		return view('backend.zone.index', compact('zones'));
	}

	public function create()
	{
		return view('backend.zone.create');
	}

	public function store(Request $request)
	{
		$request->validate([
			'name' => 'required',
		]);

		try{
			Zone::create($request->all());
	
		}
		catch (\Exception $e){
			$request->session()->flash('unsuccessMessage', 'Failed to add new zone !!!');
			return redirect()->back();
		}

		$request->session()->flash('successMessage', 'Zone created successfully !!!');
		return redirect()->route('zone.index');
	}

	public function show($id)
	{
			//
	}

	public function edit($id)
	{
		$zone = Zone::where('id', $id)->first();
		return view('backend.zone.edit', compact('zone'));
	}

	public function update(Request $request, $id)
	{
		$request->validate([
			'name' => 'required',
		]);

		try{
			$zone = Zone::where('id', $id)->first();
			$zone->name = $request['name'];
			$zone->update();
		}
		catch (\Exception $e){
			$request->session()->flash('unsuccessMessage', 'Failed to update a zone !!!');
			return redirect()->back();
		}

		$request->session()->flash('successMessage', 'Zone updated successfully !!!');
		return redirect()->route('zone.index');
	}

	public function destroy(Request $request, $id)
	{
		try{
			Zone::where('id', $id)->delete();
		}
		catch(\Exception $e){
			$request->session()->flash('unsuccessMessage', 'Failed to delete a zone !!!');
			return redirect()->back();
		}

		$request->session()->flash('successMessage', 'Zone deleted successfully !!!');
		return redirect()->route('zone.index');

	}
}
