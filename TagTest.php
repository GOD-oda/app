<?php

declare(strict_types=1);

namespace Tests\Unit\MainCoolWord\Domain\CoolWord;

use CoolWord\Domain\CoolWord\Tag;
use PHPUnit\Framework\TestCase;

class TagTest extends TestCase
{
    public function testProperties(): void
    {
        $tag = new Tag(
            name: 'foo'
        );

        $this->assertSame('foo', $tag->name());
    }
}
