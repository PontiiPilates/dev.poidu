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

        $title = $this->faker->text();
        $url = $this->faker->url();
        $logo = 'http://placeimg.com/240/240/animals';

        $participation = $this->faker->randomElement(['1200', 'free', 'donate',]);
        $price = null;

        if ($participation == 'free') {
            $participation = 'Бесплатно';
        } elseif ($participation == 'donate') {
            $participation = 'Донат';
        } else {
            $price = $participation;
            $participation = $participation . ' руб.';
        }

        $begin = $this->faker->dateTimeBetween('now', '+1 week');
        $begin_str = (array) $begin;

        // именя для месяцев
        $monts = [
            '01' => 'января',
            '02' => 'февраля',
            '03' => 'марта',
            '04' => 'апреля',
            '05' => 'мая',
            '06' => 'июня',
            '07' => 'июля',
            '08' => 'августа',
            '09' => 'сентября',
            '10' => 'октября',
            '11' => 'ноября',
            '12' => 'декабря',
        ];

        // преобразование даты и времени
        $start = explode(' ', $begin_str['date']);

        $date = $start[0];
        $date = explode('-', $date);
        $date = $date[2] . ' ' . $monts[$date[1]];

        $time = $start[1];
        $time = explode(':', $time);
        $time = $time[0] . ':' . $time[1];

        return array(
            'title' => $title,
            'url' => $url,
            'logo' => $logo,
            'participation' => $participation,
            'price' => $price,
            'begin' => $begin,
            'date' => $date,
            'time' => $time,
            'status' => 1,
        );
    }
}


// SELECT AVG(participation) FROM events WHERE participation > 0
// SELECT * FROM `events` ORDER BY date, time