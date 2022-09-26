<?php

declare(strict_types=1);

namespace Tests\Main\CoolWord\Domain\CoolWord;

use CoolWord\Domain\CoolWord\CoolWord;
use CoolWord\Domain\CoolWord\CoolWordCollection;
use CoolWord\Domain\CoolWord\CoolWordId;
use CoolWord\Domain\CoolWord\Name;
use Tests\TestCase;

class CoolWordCollectionTest extends TestCase
{
    public function testAdd()
    {
        $collection = new CoolWordCollection();
        $coolWord = new CoolWord(
            id: new CoolWordId(1),
            name: new Name('foo'),
            views: 0
        );
        $collection = $collection->add($coolWord);

        $this->assertCount(1, $collection->all());
    }
}
