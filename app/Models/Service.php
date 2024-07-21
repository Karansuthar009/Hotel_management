<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';
    protected $fillable = [
        'title',
        'small_detail',
        'full_detail',
        'photo',
        'created_at',
        'updated_at',
    ];
}
