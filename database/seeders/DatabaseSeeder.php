<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Event;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Event::factory(10)->create();
    }
}
