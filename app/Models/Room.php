<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['room_name', 'capacity'];

    // public function sessions()
    // {
    //     return $this->hasMany(Session::class);
    // }
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
