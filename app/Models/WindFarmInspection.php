<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WindFarmInspection extends Model
{
    use HasFactory;

    protected $table = 'wf_inspection';

    public function turbineInspections(): HasMany
    {
        return $this->hasMany(WindFarmTurbineInspection::class, 'wf_inspection');
    }

}
