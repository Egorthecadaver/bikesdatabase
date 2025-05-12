<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    protected $fillable = [
        'user_id',
        'bike_id',
        'start_time',
        'end_time',
        'status'
        // 'total_price' НЕ добавляем сюда (он считается автоматически)
    ];

    protected $dates = ['start_time', 'end_time'];

    // Связь с велосипедом
    public function bike()
    {
        return $this->belongsTo(Bike::class);
    }

    // Связь с пользователем
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    protected static function boot()
    {
        parent::boot();

        static::saving(function ($rental) {
            if ($rental->end_time) {
                $hours = $rental->end_time->diffInHours($rental->start_time);
                $rental->total_price = $hours * $rental->bike->price_per_hour;
            }
        });
    }
}
