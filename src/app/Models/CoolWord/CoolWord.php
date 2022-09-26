<?php

namespace App\Models\CoolWord;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\CoolWord\CoolWord
 *
 * @method static \Database\Factories\CoolWord\CoolWordFactory factory(...$parameters)
 * @method static Builder|CoolWord newModelQuery()
 * @method static Builder|CoolWord newQuery()
 * @method static Builder|CoolWord query()
 * @mixin \Eloquent
 */
class CoolWord extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'name',
        'views',
    ];

    public function scopeName(Builder $query, string $name): void
    {
        if (!empty($name)) {
            $query->where('name', 'like', "%$name%");
        }
    }
}
