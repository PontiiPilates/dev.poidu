<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return array(

            'url' => $this->faker->url(),

            'title' => $this->faker->text(),

            'tags' => $this->faker->randomElement([
                '{"1":1,"2":2}',
                '{"1":3,"2":7}',
                '{"1":4}',
                '{}',
            ]),

            'payment' => $this->faker->randomElement([
                '1200',
                'free',
                'donate',
            ]),

            'logo' => 'http://placeimg.com/240/240/animals',
        );
    }
}
