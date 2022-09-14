<?php

declare(strict_types=1);

namespace App\Models\CoolWord;

use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model
{
    protected $connection = 'cool_word';
}
