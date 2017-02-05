<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditCard extends Model
{
    protected $table = 'credit_card';

    protected $fillable = [
        'number', 'card_holder', 'expiration', 'c_security_code',
    ];
}
