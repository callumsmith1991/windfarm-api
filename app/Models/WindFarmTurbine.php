<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WindFarmTurbine extends Model
{
    use HasFactory;
    protected $table = 'wf_turbine';

    public function components(): HasMany
    {
        return $this->hasMany(WindFarmTurbineComponent::class, 'wf_turbine');
    }
}
