<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'order_number',
        'product_id',
        'payment_method',
        'payment_status',
        'delivery_status',
        'sub_total',
        'total_amount',
        'quantity',
        'delivery_charge',
        'coupon',
        'first_name',
        'last_name',
        'email',
        'address',
        'phone',
        'country',
        'state',
        'postcode',
        'city',

        'sfirst_name',
        'slast_name',
        'semail',
        'saddress',
        'sphone',
        'scountry',
        'sstate',
        'spostcode',
        'scity',
        'note'
    ];
}
