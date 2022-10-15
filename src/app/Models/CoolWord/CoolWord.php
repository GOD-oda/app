<?php

namespace App\Models\CoolWord;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
        'description'
    ];

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function scopeName(Builder $query, string $name): void
    {
        if (!empty($name)) {
            $query->where('name', 'like', "%$name%");
        }
    }
}
