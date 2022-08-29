<?php

declare(strict_types=1);

namespace CoolWord\Domain\CoolWord;

interface CoolWordRepository
{
    public function index(int $limit, int $offset): CoolWordList;

    public function findById(CoolWordId $id): ?CoolWord;

    public function findByName(Name $name): ?CoolWord;

    public function store(CoolWord $coolWord): CoolWordId;
}
