<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Support\Facades\Auth;

class Reservation extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;

    protected $fillable = ['user_id', 'room_id', 'date',  'session_number', 'session_name', 'reason'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    // public function transformAudit(array $data): array
    // {
    //     if ($data['event'] === 'updated') {
    //         $data['old_values'] = array_merge($data['old_values'], ['room_id' => $this->getOriginal('room_id')]);
    //         $data['new_values'] = array_merge($data['new_values'], ['room_id' => $this->room_id]);
    //     }

    //     return $data;
    // }


    public function transformAudit(array $data): array
    {
        if ($data['event'] === 'updated') {
            $data['new_values'] = array_merge($data['new_values'], [
                'room_id' => $this->getOriginal('room_id'),
                'date' => $this->getOriginal('date'),
                'session_name' => $this->getOriginal('session_name')
            ]);
            
        }

        return $data;
    }
}
