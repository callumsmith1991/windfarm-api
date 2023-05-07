<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use App\Models\User;

class WindFarmTurbineControllerTest extends TestCase
{

    /* Change this ID to whatever your turbine is in the database */
    private $turbine = 2;

    public function test_index_turbines()
    {
        Sanctum::actingAs(User::factory()->create());
        $response = $this->get('/api/turbines/');
        $response->assertStatus(200)->assertJson([
            'success' => true,
        ]);
        $this->assertIsArray($response['data']);
    }

    public function test_show_turbine()
    {
        Sanctum::actingAs(User::factory()->create());
        $response = $this->get('/api/turbines/' . $this->turbine . '');
        $response->assertStatus(200)->assertJson([
            'success' => true,
        ]);
        $this->assertIsArray($response['data']);
    }

    public function test_show_turbine_invalid_id()
    {
        Sanctum::actingAs(User::factory()->create());
        $this->turbine = 2342342354;
        $response = $this->get('/api/turbines/' . $this->turbine . '');
        $response
            ->assertStatus(404)
            ->assertJson([
                'success' => false,
                'message' => "Turbine not found"
            ]);
    }

    public function test_getTurbineComponents()
    {
        Sanctum::actingAs(User::factory()->create());
        $response = $this->get('/api/turbines/'.$this->turbine.'/components');
        $response->assertStatus(200)->assertJson([
            'success' => true,
        ]);
        $this->assertIsArray($response['data']);
    }

    public function test_getTurbineComponents_invalid_id()
    {
        Sanctum::actingAs(User::factory()->create());
        $this->turbine = 2342342354;
        $response = $this->get('/api/turbines/' . $this->turbine . '/components');
        $response
            ->assertStatus(404)
            ->assertJson([
                'success' => false,
                'message' => "Turbine not found"
            ]);
    }
}
