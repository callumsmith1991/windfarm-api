<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WindFarmTurbineComponent extends Model
{
    use HasFactory;

    protected $table = 'wf_turbine_component';
    protected $fillable = ['name', 'wf_turbine'];
    public $timestamps = false;
}
