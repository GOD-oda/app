<?php

declare(strict_types=1);

namespace Tests\Main\CoolWord\Domain\CoolWord;

use CoolWord\Domain\CoolWord\CoolWord;
use CoolWord\Domain\CoolWord\CoolWordId;
use CoolWord\Domain\CoolWord\Name;
use Tests\TestCase;

class CoolWordTest extends TestCase
{
    public function testId()
    {
        $coolWord = new CoolWord(
            id: new CoolWordId(1),
            name: new Name('foo'),
            views: 0
        );

        $this->assertInstanceOf(CoolWordId::class, $coolWord->id());
    }

    public function testName(): void
    {
        $coolWord = new CoolWord(
            id: new CoolWordId(1),
            name: new Name('foo'),
            views: 0
        );

        $this->assertInstanceOf(Name::class, $coolWord->name());
    }

    public function testChangeName(): void
    {
        $beforeName = new Name('foo');
        $coolWord = new CoolWord(
            id: new CoolWordId(1),
            name: $beforeName,
            views: 0
        );

        $newName = new Name('bar');
        $coolWord->changeName($newName);

        $this->assertSame('bar', $coolWord->name()->value);
    }

    public function testCountUpViews()
    {
        $coolWord = new CoolWord(
            id: new CoolWordId(1),
            name: new Name('foo'),
            views: 0
        );
        $this->assertSame(0, $coolWord->views());

        $coolWord->countUpViews(1);

        $this->assertSame(1, $coolWord->views());
    }
}
