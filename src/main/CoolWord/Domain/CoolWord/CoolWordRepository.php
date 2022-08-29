<?php

declare(strict_types=1);

namespace CoolWord\Domain\CoolWord;

interface CoolWordRepository
{
    public function findById(CoolWordId $id): ?CoolWord;

    public function findByName(Name $name): ?CoolWord;

    public function store(CoolWord $coolWord): CoolWordId;
}
