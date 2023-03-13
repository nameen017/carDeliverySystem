<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
  public function index(Request $request)
	{
		$cars = Car::paginate(10);
		
		return view('backend.car.index', compact('cars'));
	}

	public function create()
	{
		return view('backend.car.create');
	}

	public function store(Request $request)
	{
		$request->validate([
			'name' => 'required',
			'display_name' => 'required',
		]);

		try{
			Car::create($request->all());
	
		}
		catch (\Exception $e){
			$request->session()->flash('unsuccessMessage', 'Failed to add new car !!!');
			return redirect()->back();
		}

		$request->session()->flash('successMessage', 'Car created successfully !!!');
		return redirect()->route('car.index');
	}

	public function show($id)
	{
			//
	}

	public function edit($id)
	{
		$car = Car::where('id', $id)->first();
		return view('backend.car.edit', compact('car'));
	}

	public function update(Request $request, $id)
	{
		$request->validate([
			'name' => 'required',
			'display_name' => 'required',
		]);

		try{
			$car = Car::where('id', $id)->first();
			$car->name = $request['name'];
			$car->display_name = $request['display_name'];
			$car->update();
		}
		catch (\Exception $e){
			$request->session()->flash('unsuccessMessage', 'Failed to update a car !!!');
			return redirect()->back();
		}

		$request->session()->flash('successMessage', 'Car updated successfully !!!');
		return redirect()->route('car.index');
	}

	public function destroy(Request $request, $id)
	{
		try{
			Car::where('id', $id)->delete();
		}
		catch(\Exception $e){
			$request->session()->flash('unsuccessMessage', 'Failed to delete a car !!!');
			return redirect()->back();
		}

		$request->session()->flash('successMessage', 'Car deleted successfully !!!');
		return redirect()->route('car.index');

	}
}
