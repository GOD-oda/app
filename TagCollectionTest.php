<?php

declare(strict_types=1);

namespace Tests\Unit\Main\CoolWord\Domain\CoolWord;

use CoolWord\Domain\CoolWord\Tag;
use CoolWord\Domain\CoolWord\TagCollection;
use Tests\TestCase;

class TagCollectionTest extends TestCase
{
    public function testConstruct()
    {
        $tagCollection = new TagCollection();
        $this->assertCount(0, $tagCollection);

        $tags = [
            new Tag(
                name: 'foo'
            )
        ];
        $tagCollection = new TagCollection(...$tags);
        $this->assertCount(1, $tagCollection);
    }
}
