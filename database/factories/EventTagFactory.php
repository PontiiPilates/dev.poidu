<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EventTagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'event_id' => $this->faker->numberBetween(1, 10),
            // поскольку таблица тегов заполняется из сидера, то здесь максимальное значение должно быть ограничено значением максимального идентификатора тегов
            'tag_id' => $this->faker->numberBetween(1, 6),
        ];
    }
}
