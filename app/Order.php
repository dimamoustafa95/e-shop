<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    protected $table = 'orders';
    protected $dates = ['deleted_at'];
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
        'payment_mode',
        'payment_id',
        'total_price',
        'status',
        'message',
        'tracking_no',
    ];

    public function orderItems(){

        return $this->hasMany(OrderItem::class);

    }
}
