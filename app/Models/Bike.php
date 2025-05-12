<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bike extends Model
{
    protected $fillable = ['model', 'bike_type_id', 'is_available', 'price_per_hour'];

    public function type(): BelongsTo
    {
        return $this->belongsTo(BikeType::class, 'bike_type_id');
    }

    public function rentedByUsers()
    {
        return $this->belongsToMany(User::class, 'rentals')
            ->withPivot(['start_time', 'end_time', 'status']);
    }
}
