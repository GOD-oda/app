<?php

declare(strict_types=1);

namespace Tests\Feature\Controllers\Web\CoolWord\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreate()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->from(route('cool_word.admin.cool_words.show', ['id' => $user->id]))
            ->post(route('cool_word.admin.cool_words.create'), [
                'name' => 'foo'
            ]);

        $response->assertStatus(302)
            ->assertRedirect(route('cool_word.admin.cool_words.show', ['id' => $user->id]));
    }
}
