<?php

declare(strict_types=1);

namespace CoolWord\Infra\CoolWord;

use CoolWord\Domain\CoolWord\CoolWord;
use CoolWord\Domain\CoolWord\CoolWordId;
use CoolWord\Domain\CoolWord\CoolWordRepository;
use CoolWord\Domain\CoolWord\Name;
use Illuminate\Support\Enumerable;

class EloquentCoolWord implements CoolWordRepository
{
    public function findById(CoolWordId $id): ?CoolWord
    {
        $coolWord = \App\Models\CoolWord\CoolWord::find($id->value);
        if ($coolWord === null) {
            return null;
        }

        return new CoolWord(
            id: new CoolWordId($coolWord->id),
            name: new Name($coolWord->name)
        );
    }

    public function findByName(Name $name): ?CoolWord
    {
        $coolWord = \App\Models\CoolWord\CoolWord::where([
            'name' => $name->value
        ])->first();
        if ($coolWord === null) {
            return null;
        }

        return new CoolWord(
            id: new CoolWordId($coolWord->id),
            name: new Name($coolWord->name)
        );
    }

    public function store(CoolWord $coolWord): CoolWordId
    {
        if ($coolWord->hasId()) {
            $eloquentCoolWord = \App\Models\CoolWord\CoolWord::findOrFail($coolWord->id->value);
        } else {
            $eloquentCoolWord = new \App\Models\CoolWord\CoolWord();
        }

        $eloquentCoolWord->name = $coolWord->name()->value;
        $eloquentCoolWord->save();

        return new CoolWordId($eloquentCoolWord->id);
    }

    public function forPage(int $page, int $perPage): Enumerable
    {
        return \App\Models\CoolWord\CoolWord::forPage($page, $perPage)->get();
    }

    public function count(): int
    {
        return \App\Models\CoolWord\CoolWord::count();
    }
}
