<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Queue;
use App\Jobs\SendApiTokenEmail;

class tokenGenerateTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    public function test_token_can_be_generated(): void
    {
        Queue::fake([
            SendApiTokenEmail::class
        ]);

        $user = User::factory()->create();
        $response = $this->actingAs($user)->post('/token-generate');

        $response->assertSessionHasNoErrors();
        $response->assertStatus(200);
        $response->assertViewHas('token');

        Queue::assertPushed(SendApiTokenEmail::class);
    }
}
