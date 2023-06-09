<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theater extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'city',
        'location',
        'status'
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class, 'theater_id', 'id');
    }

    public function schedulesByDateAndMovie($date, $movie)
    {
        return $this->rooms()->select('schedules.*')
            ->join('schedules', 'schedules.room_id', '=', 'rooms.id')
            ->where('date', $date)
            ->where('schedules.movie_id', $movie)->get();
    }
}
