<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roomtypeimage extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'img_src'];

    function roomtypes()
    {
        return $this->belongsTo(RoomType::class);
    }
}

