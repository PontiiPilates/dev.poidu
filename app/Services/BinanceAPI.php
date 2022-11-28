<?php

namespace App\Services;

use App\Contracts\ExchangeAPI;

class BinanceAPI implements ExchangeAPI
{
    private $price;
    private $change;
    private $exchange_name;

    public function __construct()
    {
        $this->price = rand(16000, 17000);
        $this->change = rand(1, 7);
        $this->exchange_name = 'Binance';
    }

    // возвращает цену
    public function getPrice()
    {
        return $this->price;
    }


    // возвращает %-е изменение цены
    public function getChange()
    {
        return $this->change;
    }

    // возвращает название биржы, выступающей в качестве источника данных
    public function getExchange()
    {
        return $this->exchange_name;
    }
}
