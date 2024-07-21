<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staff';

    public function department(){
        return $this->belongsTo(Department::class);
    }
}
