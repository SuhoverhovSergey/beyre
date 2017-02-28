<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Address
 *
 * @property int $id
 * @property int $user_id
 * @property string $address1
 * @property string $address2
 * @property string $state
 * @property string $city
 * @property string $zip_code
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Address whereAddress1($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Address whereAddress2($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Address whereCity($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Address whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Address whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Address whereState($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Address whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Address whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Address whereZipCode($value)
 * @mixin \Eloquent
 */
class Address extends Model
{
    protected $table = 'address';

    protected $fillable = [
        'user_id', 'address1', 'address2', 'state', 'city', 'zip_code',
    ];
}
