<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBill extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'number_of_tickets',
        'bill_amount',
        'bill_status',
        'event_id',
    ];

    //belongs to one user
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function event() {
        return $this->belongsTo(Event::class, 'event_id');
    }
}
