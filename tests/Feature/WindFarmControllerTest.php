<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use App\Models\User;

class WindFarmControllerTest extends TestCase
{
    /* Change this ID to whatever your windfarm is in the database */
    private $windfarmId = 1;

    public function test_index_windfarms()
    {
        Sanctum::actingAs(User::factory()->create());
        $response = $this->get('/api/windfarm');
        $response->assertStatus(200);
    }

    public function test_show_windfarm()
    {
        Sanctum::actingAs(User::factory()->create());
        $response = $this->get('/api/windfarm/' . $this->windfarmId . '');

        $response
            ->assertStatus(200)
            ->assertJson([
                'success' => true,
            ]);

        $this->assertIsArray($response['data']);
    }

    public function test_show_windfarm_invalid_id()
    {
        Sanctum::actingAs(User::factory()->create());
        $this->windfarmId = 9354235345;
        $response = $this->get('/api/windfarm/' . $this->windfarmId . '');
        $response
            ->assertStatus(404)
            ->assertJson([
                'success' => false,
                'message' => "Windfarm not found"
            ]);
    }
}
