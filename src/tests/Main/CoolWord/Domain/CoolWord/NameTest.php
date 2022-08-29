<?php

namespace Tests\Main\CoolWord\Domain\CoolWord;

use CoolWord\Domain\CoolWord\Name;
use Tests\TestCase;

class NameTest extends TestCase
{
    public function testInvalidArgumentWithEmptyValue()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectErrorMessage('name is required.');

        new Name('');
    }

    public function testValue()
    {
        $name = new Name('foo');
        $this->assertSame('foo', $name->value);
    }
}
