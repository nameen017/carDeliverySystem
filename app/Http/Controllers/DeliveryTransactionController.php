<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zone;
use App\Models\Customer;
use App\Models\Car;
use App\Models\DeliveryTransaction;

class DeliveryTransactionController extends Controller
{
    public function index()
	{
		$deliveryTransactions = DeliveryTransaction::paginate(10);
		
		return view('backend.deliveryTransaction.index', compact('deliveryTransactions'));
	}

	public function create()
	{
        $zones = Zone::get();
        $customers = Customer::all();
        $cars = Car::all();

		return view('backend.deliveryTransaction.create', compact('zones', 'customers', 'cars'));
	}

	public function store(Request $request)
	{
		$request->validate([
			'zone_id' => 'required',
			'location_id' => 'required',
			'customer_id' => 'required',
			'car_id' => 'required',
			'car_model_id' => 'required',
		]);

		try{
			DeliveryTransaction::create($request->all());
	
		}
		catch (\Exception $e){
			$request->session()->flash('unsuccessMessage', 'Failed to add delivery transaction !!!');
			return redirect()->back();
		}

		$request->session()->flash('successMessage', 'Delivery Transaction created successfully !!!');
		return redirect()->route('delivery-transaction.index');
	}

	public function show($id)
	{
			//
	}

	public function edit($id)
	{
		$deliveryTransaction = DeliveryTransaction::where('id', $id)->first();
        $zones = Zone::get();
        $customers = Customer::all();
        $cars = Car::all();

		return view('backend.deliveryTransaction.edit', compact('deliveryTransaction', 'zones', 'customers', 'cars'));
	}

	public function update(Request $request, $id)
	{
		$request->validate([
			'zone_id' => 'required',
			'location_id' => 'required',
			'customer_id' => 'required',
			'car_id' => 'required',
			'car_model_id' => 'required',
		]);

		try{
			$deliveryTransaction = DeliveryTransaction::where('id', $id)->first();
            $deliveryTransaction->zone_id = $request['zone_id'];
			$deliveryTransaction->location_id = $request['location_id'];
			$deliveryTransaction->customer_id = $request['customer_id'];
			$deliveryTransaction->car_id = $request['car_id'];
			$deliveryTransaction->car_model_id = $request['car_model_id'];
			$deliveryTransaction->update();
		}
		catch (\Exception $e){
			$request->session()->flash('unsuccessMessage', 'Failed to update a delivery transaction !!!');
			return redirect()->back();
		}

		$request->session()->flash('successMessage', 'Delivery Transaction updated successfully !!!');
		return redirect()->route('delivery-transaction.index');
	}

	public function destroy(Request $request, $id)
	{
		try{
			DeliveryTransaction::where('id', $id)->delete();
		}
		catch(\Exception $e){
			$request->session()->flash('unsuccessMessage', 'Failed to delete a delivery transaction !!!');
			return redirect()->back();
		}

		$request->session()->flash('successMessage', 'Delivery Transaction deleted successfully !!!');
		return redirect()->route('delivery-transaction.index');

	}
    
}
