<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
    'name',
    'description',
    'location',
    'time',
    'image',
    'category',
    'status',
    'date',
    'ticket_price',
    'free_guests',
    'paid_guests',
    ];


    public function userBills() {
        $this->hasMany(UserBill::class);
    }
}
