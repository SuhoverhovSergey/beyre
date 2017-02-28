<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Pet
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property int $species
 * @property int $breed
 * @property int $gender
 * @property int $weight
 * @property string $color
 * @property string $birth_date
 * @property bool $neutered
 * @property bool $microchipped
 * @property string $clinic_name
 * @property string $special_notes
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $avatar_path
 * @method static \Illuminate\Database\Query\Builder|\App\Pet whereAvatarPath($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Pet whereBirthDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Pet whereBreed($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Pet whereClinicName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Pet whereColor($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Pet whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Pet whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Pet whereGender($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Pet whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Pet whereMicrochipped($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Pet whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Pet whereNeutered($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Pet whereSpecialNotes($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Pet whereSpecies($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Pet whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Pet whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Pet whereWeight($value)
 * @mixin \Eloquent
 */
class Pet extends Model
{
    protected $table = 'pet';

    protected $fillable = [
        'name', 'species', 'breed', 'gender', 'weight', 'birth_date', 'neutered', 'microchipped',
        'clinic_name', 'special_notes', 'description', 'avatar_path',
    ];
}
