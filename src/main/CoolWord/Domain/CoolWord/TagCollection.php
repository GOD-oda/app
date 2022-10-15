<?php

declare(strict_types=1);

namespace CoolWord\Domain\CoolWord;

use Traversable;

final class TagCollection implements \IteratorAggregate
{
    private readonly array $items;

    public function __construct(Tag ...$items)
    {
        $this->items = $items;
    }

    /**
     * @return Tag[]
     */
    public function all(): array
    {
        return $this->items;
    }

    public function getIterator(): Traversable
    {
        return new \ArrayIterator($this->items);
    }
}
