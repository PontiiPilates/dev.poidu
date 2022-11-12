<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Event;
use App\Models\EventTag;
use App\Models\Relation;
use App\Models\Tag;

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

        $this->call([TagSeeder::class]);

        EventTag::factory(20)->create();
    }
}
