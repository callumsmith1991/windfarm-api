<?php

namespace App\Models;

use Database\Seeders\WindFarmTurbineComponentInspection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class WindFarmTurbineInspection extends Model
{
    use HasFactory;

    protected $table = 'wf_turbine_inspection';

    public function componentsInspections(): HasMany
    {
        return $this->hasMany(WindFarmComponentInspection::class, 'wf_turbine_inspection');
    }


}
