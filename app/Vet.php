<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Vet
 *
 * @property int $id
 * @property string $full_name
 * @property string $title
 * @property float $price
 * @property string $bio
 * @property string $avatar_path
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Vet whereAvatarPath($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Vet whereBio($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Vet whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Vet whereFullName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Vet whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Vet wherePrice($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Vet whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Vet whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Vet extends Model
{
    protected $table = 'vet';

    protected $fillable = [
        'full_name', 'title', 'price', 'bio',
    ];
}
