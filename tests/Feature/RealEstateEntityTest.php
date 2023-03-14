<?php

namespace Tests\Feature;

use App\Models\RealEstateEntity;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class RealEstateEntityTest extends TestCase
{
    use DatabaseMigrations;

    public function test_get_entities_available(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    public function test_can_create_entity(): void
    {
        $response = $this->post('/api/v1/real-estate-entities', [
            "address" => "address1",
            "price" => 100,
            "latitude" => 44.787197,
            "longitude" => 20.457273,
            "number_of_rooms" => 3,
            "size" => 60.5,
            "type_id" => 1
        ]);

        $response->assertStatus(201);
    }

    public function test_cant_create_entity_when_validation_is_not_passing(): void
    {
        $response = $this->post('/api/v1/real-estate-entities', [
            "price" => "dsada",
            "latitude" => 44.787197,
            "longitude" => 20.457273,
            "number_of_rooms" => 3,
            "size" => 60.5,
            "type_id" => 1
        ], [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json'
        ]);

        $response->assertStatus(422);
    }

    public function test_can_update_entity(): void
    {
        $entity = RealEstateEntity::factory()->create();

        $response = $this->patch("/api/v1/real-estate-entities/{$entity->id}", [
            'address' => "Updated"
        ]);

        $entity->refresh();

        $response->assertStatus(200);

        $this->assertEquals($entity->address, "Updated");
    }
}
