<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bike extends Model
{
    const TYPE_BMX = 2;
    const MIN_ADMIN_PRICE = 500;
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

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }


}
