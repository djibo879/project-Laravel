<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Option;
use App\Models\Property;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       User::factory()->create([
        'email'=>'ib.sidikou@icloud.CA'

       ]);
       $options= Option::factory(9)->create();
       Property::factory(20)
       ->hasAttached($options->random(4))
       ->create();
       
    }
}
