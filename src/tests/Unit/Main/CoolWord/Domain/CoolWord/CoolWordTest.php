<?php

declare(strict_types=1);

namespace Tests\Main\CoolWord\Domain\CoolWord;

use CoolWord\Domain\CoolWord\CoolWord;
use CoolWord\Domain\CoolWord\CoolWordId;
use CoolWord\Domain\CoolWord\Name;
use CoolWord\Domain\CoolWord\TagCollection;
use Tests\TestCase;

class CoolWordTest extends TestCase
{
    public function testProperties(): void
    {
        $coolWord = new CoolWord(
            id: new CoolWordId(1),
            name: new Name('foo'),
            views: 0,
            description: 'description',
            tags: new TagCollection()
        );

        $this->assertInstanceOf(CoolWordId::class, $coolWord->id());
        $this->assertSame(1, $coolWord->id()->value);
        $this->assertInstanceOf(Name::class, $coolWord->name());
        $this->assertSame('foo', $coolWord->name()->value);
        $this->assertIsInt($coolWord->views());
        $this->assertSame(0, $coolWord->views());
        $this->assertIsString($coolWord->description());
        $this->assertSame('description', $coolWord->description());
    }

    public function testHasId()
    {
        $coolWord = new CoolWord(
            id: new CoolWordId(1),
            name: new Name('foo'),
            views: 0,
            description: '',
            tags: new TagCollection()
        );
        $this->assertTrue($coolWord->hasId());

        $coolWord = new CoolWord(
            id: null,
            name: new Name('foo'),
            views: 0,
            description: '',
            tags: new TagCollection()
        );
        $this->assertFalse($coolWord->hasId());
    }

    public function testChangeName(): void
    {
        $beforeName = new Name('foo');
        $coolWord = new CoolWord(
            id: new CoolWordId(1),
            name: $beforeName,
            views: 0,
            description: '',
            tags: new TagCollection()
        );

        $newName = new Name('bar');
        $coolWord->changeName($newName);

        $this->assertSame('bar', $coolWord->name()->value);
    }

    public function testCountUpViews(): void
    {
        $coolWord = new CoolWord(
            id: new CoolWordId(1),
            name: new Name('foo'),
            views: 0,
            description: '',
            tags: new TagCollection()
        );
        $this->assertSame(0, $coolWord->views());

        $coolWord->countUpViews(1);

        $this->assertSame(1, $coolWord->views());
    }

    public function testChangeDescription(): void
    {
        $coolWord = new CoolWord(
            id: new CoolWordId(1),
            name: new Name('foo'),
            views: 0,
            description: 'foo',
            tags: new TagCollection()
        );
        $coolWord->changeDescription('bar');

        $this->assertSame('bar', $coolWord->description());
    }

    public function testNew()
    {
        $coolWord = CoolWord::new(
            name: new Name('foo'),
            description: 'foo'
        );

        $this->assertNull($coolWord->id());
        $this->assertSame('foo', $coolWord->name()->value);
        $this->assertSame(0, $coolWord->views());
        $this->assertSame('foo', $coolWord->description());
    }
}
