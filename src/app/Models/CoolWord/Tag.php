<?php

namespace App\Models\CoolWord;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];
}
