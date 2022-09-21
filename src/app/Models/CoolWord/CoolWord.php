<?php

namespace App\Models\CoolWord;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\CoolWord\CoolWord
 *
 * @method static \Database\Factories\CoolWord\CoolWordFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|CoolWord newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CoolWord newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CoolWord query()
 * @mixin \Eloquent
 */
class CoolWord extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];
}
