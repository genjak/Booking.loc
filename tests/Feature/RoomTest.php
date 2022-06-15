<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoomTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_mainPage()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_RoomsAll()
    {
        $response = $this->get('/rooms/all');

        $response->assertStatus(200);
    }

    public function test_RoomsFilter()
    {
        $response = $this->get('/rooms?dateCheckIn=2022-06-16&dateCheckOut=2022-06-19');

        $response->assertStatus(200);
    }    
}
