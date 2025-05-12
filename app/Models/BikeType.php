<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BikeType extends Model
{
    protected $fillable = ['name', 'description'];

    public function bikes(): HasMany
    {
        return $this->hasMany(Bike::class);
    }
}
