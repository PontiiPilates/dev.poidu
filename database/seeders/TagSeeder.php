<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            'name' => 'поход',
            'alias' => 'hike',
        ]);
        DB::table('tags')->insert([
            'name' => 'экскурсия',
            'alias' => 'excursion',
        ]);
        DB::table('tags')->insert([
            'name' => 'ярмарка',
            'alias' => 'fair',
        ]);
        DB::table('tags')->insert([
            'name' => 'фестиваль',
            'alias' => 'festival',
        ]);
        DB::table('tags')->insert([
            'name' => 'сплав',
            'alias' => 'rafting',
        ]);
        DB::table('tags')->insert([
            'name' => 'сдетьми',
            'alias' => 'child',
        ]);
    }
}
