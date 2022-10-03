<?php

declare(strict_types=1);

namespace Tests\Main\CoolWord\Domain\CoolWord;

use CoolWord\Domain\CoolWord\CoolWord;
use CoolWord\Domain\CoolWord\CoolWordId;
use CoolWord\Domain\CoolWord\Name;
use Tests\TestCase;

class CoolWordTest extends TestCase
{
    public function testId(): void
    {
        $coolWord = new CoolWord(
            id: new CoolWordId(1),
            name: new Name('foo'),
            views: 0,
            description: ''
        );

        $this->assertInstanceOf(CoolWordId::class, $coolWord->id());
    }

    public function testName(): void
    {
        $coolWord = new CoolWord(
            id: new CoolWordId(1),
            name: new Name('foo'),
            views: 0,
            description: ''
        );

        $this->assertInstanceOf(Name::class, $coolWord->name());
    }

    public function testChangeName(): void
    {
        $beforeName = new Name('foo');
        $coolWord = new CoolWord(
            id: new CoolWordId(1),
            name: $beforeName,
            views: 0,
            description: ''
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
            description: ''
        );
        $this->assertSame(0, $coolWord->views());

        $coolWord->countUpViews(1);

        $this->assertSame(1, $coolWord->views());
    }

    public function testDescription(): void
    {
        $coolWord = new CoolWord(
            id: new CoolWordId(1),
            name: new Name('foo'),
            views: 0,
            description: 'foo'
        );
        $this->assertSame('foo', $coolWord->description());
    }

    public function testNew()
    {
        $name = new Name('foo');
        $coolWord = CoolWord::new(
            name: $name,
            description: 'foo'
        );

        $this->assertNull($coolWord->id());
        $this->assertSame('foo', $coolWord->name()->value);
        $this->assertSame(0, $coolWord->views());
        $this->assertSame('foo', $coolWord->description());
    }
}
