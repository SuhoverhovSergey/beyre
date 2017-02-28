<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\CreditCard
 *
 * @property int $id
 * @property int $user_id
 * @property string $number
 * @property string $card_holder
 * @property string $expiration
 * @property string $c_security_code
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\CreditCard whereCSecurityCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\CreditCard whereCardHolder($value)
 * @method static \Illuminate\Database\Query\Builder|\App\CreditCard whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\CreditCard whereExpiration($value)
 * @method static \Illuminate\Database\Query\Builder|\App\CreditCard whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\CreditCard whereNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\CreditCard whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\CreditCard whereUserId($value)
 * @mixin \Eloquent
 */
class CreditCard extends Model
{
    protected $table = 'credit_card';

    protected $fillable = [
        'user_id', 'number', 'card_holder', 'expiration', 'c_security_code',
    ];
}
