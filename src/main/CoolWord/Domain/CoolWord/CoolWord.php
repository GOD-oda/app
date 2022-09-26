<?php

declare(strict_types=1);

namespace CoolWord\Domain\CoolWord;

final class CoolWord
{
    public function __construct(
        private readonly CoolWordId $id,
        private Name $name
    ) {}

    public function id(): CoolWordId
    {
        return $this->id;
    }

    public function name(): Name
    {
        return $this->name;
    }

    public function hasId(): bool
    {
        return $this->id !== null;
    }

    public function changeName(Name $name): void
    {
        $this->name = $name;
    }
}
