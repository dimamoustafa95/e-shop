<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'f_name',
        'l_name',
        'email',
        'phone',
        'address_1',
        'address_2',
        'city',
        'state',
        'country',
        'pin_code',
        'status',
        'message',
        'tracking_no',

    ];
}