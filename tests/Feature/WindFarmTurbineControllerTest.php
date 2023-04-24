<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WindFarmTurbineControllerTest extends TestCase
{

    /* Change this ID to whatever your turbine is in the database */
    private $turbine = 2;

    public function test_index_turbines()
    {
        $response = $this->get('/api/turbines/');
        $response->assertStatus(200)->assertJson([
            'success' => true,
        ]);
        $this->assertIsArray($response['data']);
    }

    public function test_show_turbine()
    {
        $response = $this->get('/api/turbines/' . $this->turbine . '');
        $response->assertStatus(200)->assertJson([
            'success' => true,
        ]);
        $this->assertIsArray($response['data']);
    }

    public function test_show_turbine_invalid_id()
    {
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
        $response = $this->get('/api/turbines/'.$this->turbine.'/components');
        $response->assertStatus(200)->assertJson([
            'success' => true,
        ]);
        $this->assertIsArray($response['data']);
    }

    public function test_getTurbineComponents_invalid_id()
    {
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
