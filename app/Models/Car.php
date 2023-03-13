<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'display_name'];

    public function carModels()
    {
        return $this->hasMany('\App\Models\CarModel', 'car_id');
    }
}
