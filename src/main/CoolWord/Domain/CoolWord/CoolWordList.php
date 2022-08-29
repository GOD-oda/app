<?php

declare(strict_types=1);

namespace CoolWord\Domain\CoolWord;

use Traversable;

final class CoolWordList implements \IteratorAggregate
{
    public function __construct(private array $list) {}

    public function getIterator(): Traversable
    {
        return new \ArrayIterator($this->list);
    }
}
