<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Zone;

class CustomerController extends Controller
{
    public function index()
	{
		$customers = Customer::paginate(10);
		
		return view('backend.customer.index', compact('customers'));
	}

	public function create()
	{
        $zones = Zone::get();

		return view('backend.customer.create', compact('zones'));
	}

	public function store(Request $request)
	{
		$request->validate([
            'zone_id' => 'required',
			'location_id' => 'required',
			'name' => 'required',
		]);

		try{
			Customer::create($request->all());
	
		}
		catch (\Exception $e){
			$request->session()->flash('unsuccessMessage', 'Failed to add new customer !!!');
			return redirect()->back();
		}

		$request->session()->flash('successMessage', 'Customer created successfully !!!');
		return redirect()->route('customer.index');
	}

	public function show($id)
	{
			//
	}

	public function edit($id)
	{
		$customer = Customer::where('id', $id)->first();
        $zones = Zone::get();
        // $cars = Car::all();

		return view('backend.customer.edit', compact('customer', 'zones'));
	}

	public function update(Request $request, $id)
	{
		$request->validate([
			'zone_id' => 'required',
			'location_id' => 'required',
			'name' => 'required',
		]);

		try{
			$customer = Customer::where('id', $id)->first();
            $customer->zone_id = $request['zone_id'];
			$customer->location_id = $request['location_id'];
			$customer->name = $request['name'];
			$customer->update();
		}
		catch (\Exception $e){
			$request->session()->flash('unsuccessMessage', 'Failed to update a customer !!!');
			return redirect()->back();
		}

		$request->session()->flash('successMessage', 'Customer updated successfully !!!');
		return redirect()->route('customer.index');
	}

	public function destroy(Request $request, $id)
	{
		try{
			Customer::where('id', $id)->delete();
		}
		catch(\Exception $e){
			$request->session()->flash('unsuccessMessage', 'Failed to delete a customer !!!');
			return redirect()->back();
		}

		$request->session()->flash('successMessage', 'Customer deleted successfully !!!');
		return redirect()->route('customer.index');

	}
}
