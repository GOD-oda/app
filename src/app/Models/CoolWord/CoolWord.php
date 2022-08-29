<?php

namespace App\Models\CoolWord;

use Illuminate\Database\Eloquent\Model;

class CoolWord extends Model
{
    protected $connection = 'cool_word';

    protected $fillable = [
        'name'
    ];
}
