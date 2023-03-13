<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarModel;
use App\Models\Car;

class CarModelController extends Controller
{
    public function index()
	{
		$cars = Car::with('carModels')->get();
		
		return view('backend.car.model.index', compact('cars'));
	}

	public function create()
	{
        $cars = Car::all();
		return view('backend.car.model.create', compact('cars'));
	}

	public function store(Request $request)
	{
		$request->validate([
            'car_id' => 'required',
			'model_name' => 'required',
			'display_model_name' => 'required',
		]);

		try{
			CarModel::create($request->all());
	
		}
		catch (\Exception $e){
			$request->session()->flash('unsuccessMessage', 'Failed to add new car model !!!');
			return redirect()->back();
		}

		$request->session()->flash('successMessage', 'Car model created successfully !!!');
		return redirect()->route('car-model.index');
	}

	public function show($id)
	{
			//
	}

	public function edit($id)
	{
		$carModel = CarModel::where('id', $id)->first();
        $cars = Car::all();

		return view('backend.car.model.edit', compact('carModel', 'cars'));
	}

	public function update(Request $request, $id)
	{
		$request->validate([
			'car_id' => 'required',
			'model_name' => 'required',
			'display_model_name' => 'required',
		]);

		try{
			$car = CarModel::where('id', $id)->first();
            $car->car_id = $request['car_id'];
			$car->model_name = $request['model_name'];
			$car->display_model_name = $request['display_model_name'];
			$car->update();
		}
		catch (\Exception $e){
			$request->session()->flash('unsuccessMessage', 'Failed to update a car model !!!');
			return redirect()->back();
		}

		$request->session()->flash('successMessage', 'Car model updated successfully !!!');
		return redirect()->route('car-model.index');
	}

	public function destroy(Request $request, $id)
	{
		try{
			CarModel::where('id', $id)->delete();
		}
		catch(\Exception $e){
			$request->session()->flash('unsuccessMessage', 'Failed to delete a car model !!!');
			return redirect()->back();
		}

		$request->session()->flash('successMessage', 'Car model deleted successfully !!!');
		return redirect()->route('car-model.index');

	}

	public function getCarModel($carId, Request $request)
	{
		if ($request->ajax()){
			$carModels = CarModel::where('car_id', $carId)->get();

			return response()->json($carModels);
		}
	}
}
