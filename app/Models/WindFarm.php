<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WindFarm extends Model
{
    use HasFactory;
    
    protected $table = 'wf_farm';

    public function turbines(): HasMany
    {
        return $this->hasMany(WindFarmTurbine::class, 'wf_farm');
    }
}
