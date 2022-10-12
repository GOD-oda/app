<?php

declare(strict_types=1);

namespace Tests\Feature\Controllers\Api\JsonToCode;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * @covers \App\Http\Controllers\Api\JsonToCode\RunController
 */
class RunControllerTest extends TestCase
{
    public function testRun(): void
    {
        $input = <<<EOI
{
  "productId": 1,
  "productName": "A green door",
  "price": 12.50,
  "tags": [ "home", "green" ]
}
EOI;
        $output = implode('\n', [
            '[',
            '  \\\'productId\\\' => 1,',
            '  \\\'productName\\\' => \\\'A green door\\\',',
            '  \\\'price\\\' => 12.50,',
            '  \\\'tags\\\' => [ \\\'home\\\', \\\'green\\\' ]',
            ']'
        ]);

        $response = $this->post('/api/json_to_code/run', ['json' => $input]);

        $response->assertOk()
            ->assertJsonFragment([
                'php' => $output
            ]);
    }
}
