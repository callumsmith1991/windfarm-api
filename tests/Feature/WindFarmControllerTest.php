<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WindFarmControllerTest extends TestCase
{
    /* Change this ID to whatever your windfarm is in the database */
    private $windfarmId = 3;

    public function test_index_windfarms()
    {
        $response = $this->get('/api/windfarm');
        $response->assertStatus(200);
    }

    public function test_show_windfarm()
    {
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
