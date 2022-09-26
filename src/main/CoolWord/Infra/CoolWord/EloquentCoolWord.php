<?php

declare(strict_types=1);

namespace CoolWord\Infra\CoolWord;

use CoolWord\Domain\CoolWord\CoolWord;
use CoolWord\Domain\CoolWord\CoolWordCollection;
use CoolWord\Domain\CoolWord\CoolWordId;
use CoolWord\Domain\CoolWord\CoolWordRepository;
use CoolWord\Domain\CoolWord\Name;

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
            name: new Name($coolWord->name),
            views: $coolWord->views
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
            name: new Name($coolWord->name),
            views: $coolWord->views
        );
    }

    public function store(CoolWord $coolWord): CoolWordId
    {
        if ($coolWord->hasId()) {
            $eloquentCoolWord = \App\Models\CoolWord\CoolWord::findOrFail($coolWord->id()->value);
        } else {
            $eloquentCoolWord = new \App\Models\CoolWord\CoolWord();
        }

        $eloquentCoolWord->name = $coolWord->name()->value;
        $eloquentCoolWord->views = $coolWord->views();
        $eloquentCoolWord->save();

        return new CoolWordId($eloquentCoolWord->id);
    }

    public function index(int $page, int $perPage, array $where = []): CoolWordCollection
    {
        $eloquentCoolWords = \App\Models\CoolWord\CoolWord::query()
            ->name($where['name'] ?? '')
            ->forPage($page, $perPage)
            ->get();

        $collection = $eloquentCoolWords->map(function (\App\Models\CoolWord\CoolWord $coolWord) {
            return new CoolWord(
                id: new CoolWordId($coolWord->id),
                name: new Name($coolWord->name),
                views: $coolWord->views
            );
        });

        return new CoolWordCollection(...$collection);
    }

    public function count(array $where = []): int
    {
        return \App\Models\CoolWord\CoolWord::query()
            ->name($where['name'] ?? '')
            ->count();
    }

    public function countUpViews(CoolWordId $id, int $increments): void
    {
        $coolWord = $this->findById($id);

        $coolWord->countUpViews($increments);

        $this->store($coolWord);
    }
}
