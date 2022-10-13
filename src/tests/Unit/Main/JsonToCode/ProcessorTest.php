<?php

declare(strict_types=1);

namespace Tests\Unit\Main\JsonToCode;

use JsonToCode\Processor;
use Tests\TestCase;

class ProcessorTest extends TestCase
{
    private string $input;

    protected function setUp(): void
    {
        parent::setUp();

        $this->input = <<<EOI
{
  "productId": 1,
  "productName": "A green door",
  "price": 12.50,
  "tags": [ "home", "green" ]
}
EOI;
    }

    public function testToPhp(): void
    {
        $output = implode('<br>', [
            '[',
            '  \'productId\' => 1,',
            '  \'productName\' => \'A green door\',',
            '  \'price\' => 12.50,',
            '  \'tags\' => [ \'home\', \'green\' ]',
            ']'
        ]);

        $processor = new Processor($this->input);
        $this->assertSame($output, $processor->toPhp());
    }
}
