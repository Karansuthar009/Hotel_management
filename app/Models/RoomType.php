<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Roomtypeimage;

class RoomType extends Model
{
    use HasFactory;
    protected $table = 'room_types';
    protected $fillable = [
        'title',
        'price',
        'detail',
        'created_at',
        'updated_at',
    ];

    public function roomtypeimages()
    {
        return $this->hasMany(Roomtypeimage::class,'room_type_id');
    }
}
