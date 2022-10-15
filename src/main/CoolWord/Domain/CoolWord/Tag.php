<?php

declare(strict_types=1);

namespace CoolWord\Domain\CoolWord;

final class Tag
{
    public function __construct(private readonly string $name)
    {
    }

    public function name(): string
    {
        return $this->name;
    }
}
