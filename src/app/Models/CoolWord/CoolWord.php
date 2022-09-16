<?php

namespace App\Models\CoolWord;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class CoolWord extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];
}
