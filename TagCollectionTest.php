<?php

declare(strict_types=1);

namespace Tests\Unit\Main\CoolWord\Domain\CoolWord;

use CoolWord\Domain\CoolWord\Tag;
use CoolWord\Domain\CoolWord\TagCollection;
use CoolWord\Domain\CoolWord\TagId;
use Tests\TestCase;

class TagCollectionTest extends TestCase
{
    public function testConstruct()
    {
        $tagCollection = new TagCollection();
        $this->assertCount(0, $tagCollection);

        $tags = [
            new Tag(
                id: new TagId(1),
                name: 'foo'
            )
        ];
        $tagCollection = new TagCollection(...$tags);
        $this->assertCount(1, $tagCollection);
    }

    public function testAdd()
    {
        $tagCollection = new TagCollection();
        $this->assertCount(0, $tagCollection);

        $newTagCollection = $tagCollection->add(
            new Tag(
                id: new TagId(1),
                name: 'foo'
            )
        );
        $this->assertNotSame($newTagCollection, $tagCollection);
        $this->assertCount(1, $tagCollection);
    }
}
