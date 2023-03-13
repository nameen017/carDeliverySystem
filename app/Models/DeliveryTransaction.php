<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryTransaction extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'car_id', 'car_model_id', 'zone_id', 'location_id'];

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'customer_id');
    }

    public function car()
    {
        return $this->belongsTo('App\Models\Car', 'car_id');
    }

    public function carModel()
    {
        return $this->belongsTo('App\Models\CarModel', 'car_model_id');
    }

    public function zone()
    {
        return $this->belongsTo('App\Models\Zone', 'zone_id');
    }

    public function location()
    {
        return $this->belongsTo('App\Models\Location', 'location_id');
    }
}
