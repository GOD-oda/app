<?php

declare(strict_types=1);

namespace CoolWord\Domain\CoolWord;

final class Tag
{
    public function __construct(
        private readonly TagId $id,
        private readonly string $name
    ) {}

    public function id(): TagId
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }
}
