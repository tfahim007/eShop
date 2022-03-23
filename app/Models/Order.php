<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table= "orders";
    protected $fiilable = [
        'user_id',
        'fname',
        'lname',
        'email',
        'phone',
        'address1',
        'address2',
        'city',
        'division',
        'country',
        'total',
        'pincode',
        'status',
        'message',
        'tracking_no',
    ];

    public function orderitems(){
        return $this->hasMany(OrderItem::class);
    }
}
