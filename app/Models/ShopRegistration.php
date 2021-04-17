<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopRegistration extends Model
{
    use HasFactory;
    protected $table = 'shop_registrations';
    protected $fillable = [
        'shopname',
        'email',
        'phone_no',
        'password',
        'address',
        'image',
        'category',
        'longitude',
        'latitude',
        'ip_address',
        'status'
    ];
}
