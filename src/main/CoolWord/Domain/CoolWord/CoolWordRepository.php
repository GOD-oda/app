<?php

declare(strict_types=1);

namespace CoolWord\Domain\CoolWord;

use Illuminate\Support\Enumerable;

interface CoolWordRepository
{
    public function forPage(int $page, int $perPage): Enumerable;

    public function findById(CoolWordId $id): ?CoolWord;

    public function findByName(Name $name): ?CoolWord;

    public function store(CoolWord $coolWord): CoolWordId;

    public function count(): int;
}
