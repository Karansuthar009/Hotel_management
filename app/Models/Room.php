<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RoomType;

class Room extends Model
{
    use HasFactory;
    protected $table = 'rooms';
    protected $fillable = [
        'title',
        'room_type_id',
        'created_at',
        'updated_at'
    ];

    public function Roomtype(){
        return $this->belongsTo(RoomType::class,'room_type_id');
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
