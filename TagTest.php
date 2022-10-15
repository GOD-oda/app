<?php

declare(strict_types=1);

namespace Tests\Unit\MainCoolWord\Domain\CoolWord;

use CoolWord\Domain\CoolWord\Tag;
use CoolWord\Domain\CoolWord\TagId;
use PHPUnit\Framework\TestCase;

class TagTest extends TestCase
{
    public function testProperties(): void
    {
        $tag = new Tag(
            id: new TagId(1),
            name: 'foo'
        );

        $this->assertSame('foo', $tag->name());
    }
}
