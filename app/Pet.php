<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $table = 'pet';

    protected $fillable = [
        'name', 'species', 'breed', 'gender', 'weight', 'birth_date', 'neutered', 'microchipped',
        'clinic_name', 'special_notes', 'description', 'avatar_path',
    ];
}
