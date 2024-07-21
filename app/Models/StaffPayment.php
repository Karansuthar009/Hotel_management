<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffPayment extends Model
{
    use HasFactory;

    protected $table = 'staff_payments';
    protected $fillable = [
        'staff_id',
        'amount',
        'payment_date',
        'created_at',
        'updated_at'
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
