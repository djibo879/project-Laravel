<?php

namespace Tests\Feature;

use App\Models\Property;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PropertyTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_not_found_property(): void
    {
        $response = $this->get('/biens/fghjjhjgv');

        $response->assertStatus(404);
    }

     public function test_found_property(): void
    {
        /** @var Property $property */

       //$this->seed(DatabaseSeeder::class);
        $property=Property::factory()->create();
        $response = $this->get('/biens/natus-explicabo-ea-sed-dolorem-et-exercitationem-1'. $property->id);
        $response = $this->get(route('property.show', [
        'property' => $property->id,
        'slug' => $property->getSlug()
    ]));
    
    
         $response->assertSee($property->title);
         $response->assertStatus(200);
          
        }
         public function test_ok_on_contact(): void
{
    /** @var Property $property */
    $property = Property::factory()->create();
    $response = $this->post("/biens/{$property->id}/contact", [
        "firstname" => "ibrahim",
        "lastname" => "DS",
        "phone" => "0000000000",
        "email" => "ib@demo.CA",
        "message" => "Pouvez vous me recontacter"
    ]);
    $response->assertRedirect();
    $response->assertSessionHasNoErrors();
    $response->assertSessionHas('success');
}

    }
