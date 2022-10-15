<?php

declare(strict_types=1);

namespace CoolWord\Domain\CoolWord;

final class TagId
{
    public function __construct(public readonly int $value) {}
}
