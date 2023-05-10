<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Database\Factories\WindFarmFactory;

class WindFarm extends Model
{
    use HasFactory;

    protected $table = 'wf_farm';
    public $timestamps = false;

    public function turbines(): HasMany
    {
        return $this->hasMany(WindFarmTurbine::class, 'wf_farm');
    }

    /**
     * Create a new factory instance for the model.
     */
    protected static function newFactory(): WindFarmFactory
    {
        return WindfarmFactory::new();
    }
}
