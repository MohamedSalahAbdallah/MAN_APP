<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBill extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'bill_amount',
        'bill_date',
        'bill_description',
        'bill_status',

    ];

    public function user() {
        $this->belongsTo(User::class, 'user_id');
    }
}
